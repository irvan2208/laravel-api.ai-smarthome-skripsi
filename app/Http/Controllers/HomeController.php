<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends MasterController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $index_view = 'pages.admin.home.index';
    protected $create_view = 'pages.admin.home.form';
    protected $edit_view = 'pages.admin.home.form';
    protected $route_bind_model = 'home'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'home.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Home::class);
        return $this->dataTableMaker($builder);
    }

    public function dataTableMaker($builder)
    {
        return $builder
            ->addColumn("action", function ($model) {
                return $this->makeActionButtonsForDataTable($model);
            })
            ->editColumn('user_id', function ($model) {
                return $model->user->name;
            })
            ->rawColumns(['action', 'user_id'])
            ->make(true);
    }

    public function save($model = null)
    {
        if (!$model) {
            $model = new Home();
        }
        return $this->saveHandler($model);
    }
}
