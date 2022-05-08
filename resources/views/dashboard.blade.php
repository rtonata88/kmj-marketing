@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item active">Dashboard</li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-primary p-3 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-education')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-primary">3</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Registered Learners</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="/student/reports"><span class="small font-weight-bold">View More</span>
                    <svg class="c-icon">
                        <use xlink:href="#cil-chevron-right"></use>
                    </svg></a>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-info p-3 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-money')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-info">N$0</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Invoices & Debits</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="/accounting/reports"><span class="small font-weight-bold">View More</span>
                    <svg class="c-icon">
                        <use xlink:href="#cil-chevron-right"></use>
                    </svg></a></div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-warning p-3 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-bank')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-info">N$0</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Payments & Credits</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="/accounting/reports"><span class="small font-weight-bold">View More</span>
                    <svg class="c-icon">
                        <use xlink:href="#cil-chevron-right"></use>
                    </svg></a></div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-danger p-3 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-dollar')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-info">N$0</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Outstanding Amount</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="/accounting/reports"><span class="small font-weight-bold">View More</span>
                <svg class="c-icon">
                    <use xlink:href="#cil-chevron-right"></use>
                </svg></a></div>
        </div>
    </div>
    <!-- /.col-->
</div>

@push('highcharts-css')
<script src="{{asset('css/charts.css')}}"></script>
@endpush
@push('highcharts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="{{asset('js/charts.js')}}"></script>
@endpush
@endsection