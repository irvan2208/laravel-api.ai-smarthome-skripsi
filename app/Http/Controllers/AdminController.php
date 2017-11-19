<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\RestaurantCategory;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends MasterController
{
    public function index()
    {
        dd('asdf');
        $users = User::orderBy('created_at','desc')->get();
    	return view('pages.admin.index')->with('users',$users);
    }

    public function login()
    {
    	return view('pages.admin.login');
    }

    public function loadPopup($id, $action)
    {
    	$getUserById = User::whereId($id)->first();
    	if ($action=='suspendUser') {
            return view('pages.admin.user.suspend_popup')->with('user',$getUserById);
        }

        $getCategoryById = RestaurantCategory::whereId($id)->first();
        if ($action=='editCategory') {
            return view('pages.admin.vendor.category.editPopup')->with('category',$getCategoryById);
        }

        if ($action=='deleteCategory') {
            return view('pages.admin.vendor.category.deletePopup')->with('category',$getCategoryById);
        }


        if ($action=='editMenu') {
            $getMenuById = Menu::whereId($id)->first();
            $resid = Vendor::whereId($getMenuById->restaurant_id)->first();
            $categories = $resid->vendorable->categories()->pluck('name', 'id');
            return view('pages.admin.vendor.menu.editPopup')->with('menu',$getMenuById)->with('categories',$categories);
        }

        if ($action=='deleteMenu') {
            $getMenuById = Menu::whereId($id)->first();
            return view('pages.admin.vendor.menu.deletePopup')->with('menu',$getMenuById);
        }
        if ($action=='deleteplace') {
            $getMedias = Media::whereId($id)->first();
            return view('pages.admin.vendor.deletePlacePopup')->with('place',$getMedias);
        }      
    }

    public function actionPopup($id, $action, Request $request)
    {
        if ($action=='suspendUserAction') {
            $dates = explode(" - ",$request->daterange);
            $suspend_on = $dates[0];
            $suspend_till = $dates[1];
            $getUserById = User::whereId($id)->first();
            $getUserById->suspended_on = Carbon::parse($suspend_on);
            $getUserById->suspended_till = Carbon::parse($suspend_till);
            $getUserById->status = 1;
            $getUserById->suspended_reasons = json_encode($request->suspension_reason);
            $getUserById->save();

            return redirect(route('user.index'));
        }elseif ($action=='cancelSuspendUserAction') {
            $getUserById = User::whereId($id)->first();
            $getUserById->suspended_on = null;
            $getUserById->suspended_till = null;
            $getUserById->status = 0;
            $getUserById->suspended_reasons = null;
            $getUserById->save();

            return redirect(route('user.index'));
        }elseif($action == 'deletecategoryaction'){
            $deleteCategory = RestaurantCategory::destroy($id);

            if (!$deleteCategory) {
                return $this->sendErrorResponseWeb($deleteCategory->errors);
            }

            return $this->sendSuccessResponseWeb();
        }elseif($action == 'deletemenuaction'){
            $deleteMenu = Menu::destroy($id);

            if (!$deleteMenu) {
                return $this->sendErrorResponseWeb($deleteMenu->errors);
            }

            return $this->sendSuccessResponseWeb();
        }elseif($action == 'deleteplaceaction'){
            $deleteMedias = Media::destroy($id);

            if (!$deleteMedias) {
                return $this->sendErrorResponseWeb($deleteMedias->errors);
            }

            return $this->sendSuccessResponseWeb();
        }elseif ($action == 'updatecategoryaction'){
            $getcategory = RestaurantCategory::find($id);
            // dd($getcategory);
            $getcategory->name = $request->name;
            if($request->cover){
                $getcategory->cover = $this->uploadFiles($request->cover, 'category');
            }

            if (!$getcategory->save()) {
                return $this->sendErrorResponseWeb($getcategory->errors);
            }
        }elseif ($action == 'updatemenuaction'){
            $getcategory = Menu::find($id);
            $getcategory->name = $request->name;
            $getcategory->description = $request->description;
            $getcategory->currency = $request->currency;
            $getcategory->price = $request->price;
            $getcategory->is_featured = $request->is_featured;
            $getcategory->restaurant_category_id = $request->restaurant_category_id;
            if($request->image){
                $getcategory->image = $this->uploadFiles($request->image,'menu');
            }

            if (!$getcategory->save()) {
                return $this->sendErrorResponseWeb($getcategory->errors);
            }
        }
    }

    public function uploadFiles($file, $type, $model = null)
    {
        switch ($type) {
            case 'wallpaper':
                if ($model) {
                    if ($model->home_wallpaper != '' || $model->home_wallpaper) {
                        Storage::delete(Storage_path().'/app/vendor/'.$type.'/'.$model->home_wallpaper);
                    }
                }
                break;
            case 'logo':
                if ($model) {
                    if ($model->logo != '' || $model->logo) {
                        Storage::delete(Storage_path().'/app/vendor/'.$type.'/'.$model->logo);
                    }
                }
                break;
            case 'category':
                if ($model) {
                    if ($model->cover != '' || $model->cover) {
                        Storage::delete(Storage_path().'/app/vendor/'.$type.'/'.$model->cover);
                    }
                }
                break;
            case 'menu':
                if ($model) {
                    if ($model->cover != '' || $model->cover) {
                        Storage::delete(Storage_path().'/app/restaurant/'.$type.'/'.$model->image);
                    }
                }
                break;
            default:
                break;
        }

        return $this->uploadHandler($file, $type);
    }

    public function uploadHandler($file, $type)
    {
        $path = 'vendor/'.$type;
        if($type=='menu'){
            $path = 'restaurant/'.$type;
        }

        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        $fileName = time().'.'.$file->getClientOriginalExtension();

        $file->move(Storage_path().'/app/'.$path, $fileName);

        return $fileName;
    }
}
