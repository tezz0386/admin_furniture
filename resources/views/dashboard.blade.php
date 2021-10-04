@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="container"><label>Others Content must be go here</label></div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('Users Behavior') }}</h4>
                        <p class="card-category">{{ __('24 Hours performance') }}</p>
                    </div>
                    <div class="card-body ">
                        <canvas id="myAreaChart" height="235px"></canvas>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> {{ __('Open') }}
                            <i class="fa fa-circle text-danger"></i> {{ __('Click') }}
                            <i class="fa fa-circle text-warning"></i> {{ __('Click Second Time') }}
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> {{ __('Updated 3 minutes ago') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('Email Statistics') }}</h4>
                        <p class="card-category">{{ __('Last Campaign Performance') }}</p>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart" height="260px;"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
