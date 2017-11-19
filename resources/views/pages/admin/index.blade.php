@extends('layouts.adminLayouts')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Loqato Dashboard</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}">Loqato</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!--row -->
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats"> <i class="ti-user bg-megna"></i>
                <div class="bodystate">
                    <h4>{{Users::count()}}</h4> <span class="text-muted">Registered User</span> </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats"> <i class="ti-user bg-info"></i>
                <div class="bodystate">
                    <h4>{{Vendors::count()}}</h4> <span class="text-muted">Registered Restaurant</span> </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats"> <i class="ti-wallet bg-success"></i>
                <div class="bodystate">
                    <h4>13</h4> <span class="text-muted">Today's Ops.</span> </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats"> <i class="ti-wallet bg-inverse"></i>
                <div class="bodystate">
                    <h4>$34650</h4> <span class="text-muted">Earning</span> </div>
            </div>
        </div>
    </div>
</div>
<!-- .row -->
{{-- <div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title"><small class="pull-right m-t-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small> New Patient</h3>
            <div class="stats-row">
                <div class="stat-item">
                    <h6>Overall</h6> <b>80.40%</b></div>
                <div class="stat-item">
                    <h6>Montly</h6> <b>15.40%</b></div>
                <div class="stat-item">
                    <h6>Day</h6> <b>5.50%</b></div>
            </div>
            <div id="sparkline8" class="minus-mar"></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title"><small class="pull-right m-t-10 text-danger"><i class="fa fa-sort-desc"></i> 18% less then last month</small>OPD Patients</h3>
            <div class="stats-row">
                <div class="stat-item">
                    <h6>Overall</h6> <b>80.40%</b></div>
                <div class="stat-item">
                    <h6>Montly</h6> <b>15.40%</b></div>
                <div class="stat-item">
                    <h6>Day</h6> <b>5.50%</b></div>
            </div>
            <div id="sparkline9" class="minus-mar"></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title"><small class="pull-right m-t-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small>Treatment</h3>
            <div class="stats-row">
                <div class="stat-item">
                    <h6>Overall Growth</h6> <b>80.40%</b></div>
                <div class="stat-item">
                    <h6>Montly</h6> <b>15.40%</b></div>
                <div class="stat-item">
                    <h6>Day</h6> <b>5.50%</b></div>
            </div>
            <div id="sparkline10" class="minus-mar"></div>
        </div>
    </div>
</div>
<!-- /.row -->
<!--row -->
<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Patients In</h3>
            <ul class="list-inline text-center">
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>OPD</h5> </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>ICU</h5> </li>
            </ul>
            <div id="morris-area-chart1" style="height: 370px;"></div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Hospital Earning</h3>
            <ul class="list-inline text-center">
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>OPD</h5> </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>ICU</h5> </li>
            </ul>
            <div id="morris-area-chart2" style="height: 370px;"></div>
        </div>
    </div>
</div> --}}
<!-- row -->
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">New User List</h3>
            <p class="text-muted">this is the registered user</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Register Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection