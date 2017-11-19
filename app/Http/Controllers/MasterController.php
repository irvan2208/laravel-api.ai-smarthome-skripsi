<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Helpers\SessionHelper;
use Route;
use Yajra\DataTables\Facades\Datatables;

class MasterController extends Controller
{
    protected $request;

    protected $attributes = [
        'title' => 'TITLE',
        'route' => '',
        'method' => 'POST'
    ];

    //Default restful method.
    protected $restful = [
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'update',
        'destroy' => 'destroy',
    ];

    //View Name or blade name
    protected $form_view;
    protected $index_view;

    //Registered route name under RouteServiceProvider
    protected $route_bind_model;

    //Buttons for dataTable.
    // There are 4 types: show, edit, delete & other
    protected $datatable_buttons = [
        'show',
        'edit',
        'delete'
    ];

    //Model's name in class, expected ModelName::class
    protected $model_name;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return $this->render(view($this->index_view));
    }

    public function create()
    {
        $view = property_exists($this, 'create_view') ? $this->create_view : $this->form_view;
        $this->attributes['route'] = $this->getFormRoute();

        return $this->render(view($view));
    }

    public function show($model)
    {
        $view = property_exists($this, 'show_view') ? $this->show_view : $this->form_view;

        return $this->render(view($view), $model);
    }

    public function edit($model)
    {
        $view = property_exists($this, 'edit_view') ? $this->edit_view : $this->form_view;
        $this->attributes['method'] = 'PUT';
        $this->attributes['route'] = $this->getFormRoute($model);
        return $this->render(view($view), $model);
    }

    public function update($model)
    {
        return $this->save($model);
    }

    public function store()
    {
        return $this->save();
    }

    public function destroy($model)
    {
        if (!$model->delete()) {
            return $this->sendErrorResponse($model->errors());
        }

        return $this->sendSuccessResponse();
    }

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable($model);
        return $this->dataTableMaker($builder);
    }

    public function prepareDataTable($model)
    {
        return Datatables::of($model::query());
    }

    public function dataTableMaker($builder)
    {
        //dd($builder);
        return $builder
            ->addColumn('action', function ($model) {
                return $this->makeActionButtonsForDataTable($model);
            })
            ->make(true);
    }

    public function makeActionButtonsForDataTable($model)
    {
        $routeParameter = [$this->route_bind_model => $model->id];
        $routeShow = property_exists($this, 'route_for_show') ?
            $this->route_for_show :
            $this->routeMaker($this->restful['show']);
        if (Route::has($routeShow)) {
            $result['show'] = method_exists($this, 'dataTableShowButton') ?
                $this->dataTableShowButton($model) :
                '<a href="'.route($routeShow, $routeParameter).'"
                    class="btn btn-primary show">
                    <span class="fa fa-eye"></span> Show
                </a>';
        }
        $routeEdit = property_exists($this, 'route_for_edit') ?
            $this->route_for_edit :
            $this->routeMaker($this->restful['edit']);
        if (Route::has($routeEdit)) {
            $result['edit'] = method_exists($this, 'dataTableEditButton') ?
                $this->dataTableEditButton($model) :
                '<a href="'.route($routeEdit, $routeParameter).'"
                    class="btn btn-warning edit">
                    <span class="fa fa-pencil"></span> Edit
                </a>';
        }
        $routeDestroy = property_exists($this, 'route_for_destroy') ?
            $this->route_for_destroy :
            $this->routeMaker($this->restful['destroy']);
        if (Route::has($routeDestroy)) {
            $result['delete'] = method_exists($this, 'dataTableDeleteButton') ?
                $this->dataTableDeleteButton($model) :
                '<a href="#delete_modal" onclick="deleteConfirmation(\''.route($routeDestroy, $routeParameter).'\')"
                    data-toggle="modal" class="btn btn-danger delete">
                    <span class="fa fa-trash"></span> Delete
                </a>';
        }
        $result['other'] = method_exists($this, 'dataTableOtherButton') ?
            $this->dataTableOtherButton($model) : '';
        $final = [];
        foreach ($this->datatable_buttons as $button) {
            $final[] = $result[$button];
        }
        return implode('', $final);
    }

    public function render(View $view, $model = null)
    {
        return $view->with($this->attributes)->with(compact('model'));
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function save($model = null)
    {
        return $this->saveHandler($model);
    }

    public function saveHandler($model)
    {
        $model->fill($this->getRequest()->all());
        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }

        return $this->sendSuccessResponse();
    }

    public function getFormRoute($model = null)
    {
        if ($model) {
            $route = property_exists($this, 'route_for_update') ?
                $this->route_for_update : $this->routeMaker($this->restful['update']);

            return route($route, [$this->route_bind_model => $model]);
        }
        $route = property_exists($this, 'route_for_save') ?
            $this->route_for_save : $this->routeMaker($this->restful['store']);

        return route($route);
    }

    public function sendErrorResponse($errors)
    {
        if ($this->getRequest()->ajax() || $this->getRequest()->wantsJson()) {
            return response($errors, 400);
        }

        // SessionHelper::setMessage($errors, 'danger');
        if (property_exists($this, 'redirect_when_error')) {
            return redirect()->route($this->redirect_when_error);
        }
        return redirect()->back()->withInput()->withErrors($errors);
    }

    public function sendSuccessResponse()
    {
        if ($this->getRequest()->ajax() || $this->getRequest()->wantsJson()) {
            return response('success', 200);
        }
        SessionHelper::setMessage(SessionHelper::GLOBAL_SUCCESS_MSG);
        if (property_exists($this, 'redirect_when_success')) {
            return redirect()->route($this->redirect_when_success);
        }
        return back();
    }

    public function sendSuccessResponseWeb()
    {
        SessionHelper::setMessage(SessionHelper::GLOBAL_SUCCESS_MSG);
        return back();
    }

    public function sendErrorResponseWeb($errors)
    {
        return redirect()->back()->withInput()->withErrors($errors);
    }

    public function routeMaker($action)
    {
        return $this->route_bind_model . '.' . $action;
    }

    public function limitString($string, $limit = 100) {
        // Return early if the string is already shorter than the limit
        if(strlen($string) < $limit) {return $string;}

        $regex = "/(.{1,$limit})\b/";
        preg_match($regex, $string, $matches);
        return $matches[1];
    }
}
