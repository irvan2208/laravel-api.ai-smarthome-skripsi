<?php

namespace App\Http\Controllers;

use App\Helpers\Enums\MediaType;
use App\Helpers\Enums\UserStatus;
use App\Http\Controllers\MasterController;
use App\Models\Role;
use App\Models\User;
use App\Traits\GeneralUserRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends MasterController
{

    Use GeneralUserRules;

    protected $index_view = 'pages.admin.user.index';
    protected $create_view = 'pages.admin.user.form';
    protected $edit_view = 'pages.admin.user.form';
    protected $route_bind_model = 'user'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'user.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function save($model = null)
    {
        if (!$model) {
            $model = new User();
        }
        return $this->saveHandler($model);
    }

    public function store() {
        $request = $this->getRequest();

        $this->validateUserData($request)->validate();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($request->role) {
            $role = Role::find($request->role);
            $user->attachRole($role);
        }

        return $this->sendSuccessResponse();
    }

    public function update($model)
    {
        $request = $this->getRequest();

        $this->validateUserDataOnUpdate($request, $model)->validate();

        $model->name = $request->name;
        $model->email = $request->email;
        if ($request->password) {
            $model->password = bcrypt($request->password);
        }
        $model->save();

        $model->roles()->sync([$request->role]);

        return $this->sendSuccessResponse();
    }

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(User::class);
        return $this->dataTableMaker($builder);
    }

    public function dataTableMaker($builder)
    {
        return $builder
            ->addColumn("action", function ($model) {
                return $this->makeActionButtonsForDataTable($model);
            })
            ->addColumn('current_status', function ($model) {
                if ($model->status == UserStatus::ACTIVE) {
                    return '<span class="label label-success">'.UserStatus::getString($model->status).'</span>';
                }

                if ($model->status == UserStatus::SUSPENDED) {
                    return '<span class="label label-danger">'.UserStatus::getString($model->status).'</span>';
                }

                return '<span class="label label-default">'.UserStatus::getString($model->status).'</span>';
            })
            ->editColumn('role', function ($model) {
                if ($model->roles->count()) {
                    return $model->roles->first()->display_name;
                }

                return 'User';
            })
            ->rawColumns(['action', 'status', 'current_status'])
            ->make(true);
    }

    public function listIndex()
    {
        return view('pages.web.home.index');
    }

    public function register(Request $request)
    {
        $this->validateUserData($request)->validate();

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email_token = base64_encode($request->email);
        $user->status = UserStatus::ACTIVE;

        if (!$user->save()) {
            return redirect()->back()->withErrors($model->errors);
        }

        dispatch(new SendVerificationEmail($user));

        if (!$request->ajax()) {
            return redirect()->route('login')->with('regSuccess', true);
        }

        return response(['success' => 'Register Success! Please login to continue']);
    }

    public function profile(User $user)
    {
        return view('pages.web.user.detail')->with('user', $user);
    }

    public function userDashboard($view)
    {
        $this->attributes['bodyClass'] = 'lqt-dashboard';
        $user = Auth::user();
        return $this->render(view($view)->with('user', $user));
    }

    public function privacySetting()
    {
        return $this->userDashboard('pages.web.user.privacy');
    }

    public function generalInformation()
    {
        return $this->userDashboard('pages.web.user.general');
    }

    public function updateProfile(User $user, Request $request)
    {

        Validator::make($request->all(), ['new_password'=>'required|min:8','new_password_confirmation'=>'required_with:new_password|same:new_password'])->validate();

        $user->name = $request->name;
        $user->email  = $request->email;

        if ($request->old_password) {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->new_password && $request->new_password_confirmation) {
                    if ($request->new_password == $request->new_password_confirmation) {
                        $user->password = bcrypt($request->new_password);
                    } else {
                        return $this->sendErrorResponseWeb(['pwdConfirmation' => 'Password confirmation not correct']);
                    }
                }
            } else {
                return $this->sendErrorResponseWeb(['oldPassword' => 'Old password is not the same']);
            }
        }

        if (!$user->save()) {
            return $this->sendErrorResponseWeb($user->errors);
        }

        return $this->sendSuccessResponseWeb();
    }

    public function updatePrivacy(User $user, Request $request)
    {
        $user->visible_on_vendor = $request->visible;
        $user->searchable = $request->searchable;
        $user->media_shareable = $request->media_shareable;

        if (!$user->save()) {
            return $this->sendErrorResponseWeb($user->errors);
        }

        return $this->sendSuccessResponseWeb();
    }

    public function listPost(Request $request, User $user)
    {
        return response($user->posts()->orderBy('posts.created_at', 'DESC')->with('user.profile', 'medias', 'comments.user.profile', 'location')->get());
    }

    public function listPostAPI(User $user)
    {
        $posts = $user->posts()->orderBy('posts.created_at', 'DESC')->with('user.profile', 'medias', 'comments.user.profile', 'location')->get();

        return response()->json($posts);
    }

    public function listMyPostAPI()
    {
        $posts = null;

        if (Auth::check()) {
            $posts = Auth::user()->posts()->orderBy('posts.created_at', 'DESC')->with('user.profile', 'medias', 'comments.user.profile', 'location')->get();
        }

        return response()->json($posts);
    }

    public function storePost(Request $request)
    {

        $location = Vendor::find($request->location_id);

        $post = new Post();
        $post->body = $request->post;
        $post->user_id = Auth::user()->id;
        $post->location_id = $location ? $location->id : null;
        if ($post->save()) {
            foreach ($request->files as $files) {
                foreach ($files as $key => $file) {
                    $media = new Media();
                    $media->type = MediaType::IMAGE;
                    $media->mediable_type = Post::class;
                    $media->mediable_id = $post->id;
                    $media->name = $this->uploadHandler($file, 'post/media', $key);
                    $media->save();
                }
            }

            if ($request->isJson()) {
                return response()->json($post->load('medias'));
            }

            return response(['message' => true]);
        }

        return ($post->errors());
    }

    public function storePostComment(Request $request, Post $post = null)
    {

        $comment = new Comment();
        $comment->commentable_type = Post::class;
        $comment->commentable_id = $post->id ? $post->id : $request->post_id;
        $comment->user_id = Auth::user()->id;
        $comment->message = $request->message;

        if ($comment->save()) {
            if ($request->isJson()) {
                return response()->json($comment);
            }

            return response(['message' => 'success']);
        }
    }

    public function uploadHandler($file, $path, $prefix = null)
    {
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        $fileName = time().'.'.$file->getClientOriginalExtension();

        if ($prefix) {
            $fileName = $prefix.$fileName;
        }

        $file->move(Storage_path().'/app/'.$path, $fileName);

        return $fileName;
    }

    public function getFileByName($type, $fileName)
    {
        switch ($type) {
            case 'post':
                $directory = 'post/media';
                break;
            case 'profile':
                $directory = 'user/avatar';
                break;
            case 'restaurant':
                $directory = 'vendor/restaurant/place';
                break;
        }

        $path = Storage_path().'/app/'.$directory.'/'.$fileName;
        return response()->file($path);
    }

    public function likePost(Request $request, Post $post)
    {

        $liked = Like::where('likeable_type', Post::class)
                     ->where('likeable_id', $post->id)
                     ->first();

        if ($liked) {
            if ($liked->delete()) {

                if ($request->isJson()) {
                    return response()->json($post->like_count);
                }

                return response(-1);
            }
        }

        $like = new Like();
        $like->likeable_type = Post::class;
        $like->likeable_id = $post->id;
        $like->user_id = Auth::user()->id;

        if ($like->save()) {
            if ($request->isJson()) {
                return response()->json($post->like_count);
            }

            return response(1);
        }
    }

    public function unsuspendUser(User $user)
    {
        $user->status = UserStatus::ACTIVE;

        if ($user->save()) {
            return $this->sendSuccessResponse();
        }
    }

    public function getReview(Review $review)
    {
        return $review->load('user.profile', 'reviewable');
    }

    public function review(Vendor $vendor, Request $request)
    {
        $review = Review::where('user_id', Auth::user()->id)->first();

        if (!$review) {
            $review = new Review();
        }

        $review->rating = $request->rating;
        $review->message = $request->message;
        $review->user_id = Auth::user()->id;
        $vendor->reviews()->save($review);

        return response()->json($vendor);

    }
}
