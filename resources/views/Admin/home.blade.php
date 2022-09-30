@extends('Admin.header-footer')
@section('contenct')

    <style>
        .col-xl-20 {
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%;
        }

    </style>

    <main class="main">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="main__title">
                        <h2>Dashboard</h2>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-20">
                    <div class="stats">
                        <span>Today Revenue</span>
                        <p>$ {{ $todaysum }}</p>
                        <div style="width: 100%; margin: 10px 0px;">
                            <div style="height: 7px; background-color: #e1e6f1;border-radius: 10px;">
                                <div style="height: 7px; background-color: #8760fb; width: 70%;border-radius: 10px;">
                                </div>
                            </div>
                        </div>

                        <div class="expansion-label d-flex text-muted">
                            <span class="text-muted">Today</span>
                            <span class="ml-auto" style="position: absolute;right: 15px;">
                                <i class="fas fa-caret-up mr-1 text-success"></i>{{ round($todayavg, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-20">
                    <div class="stats">
                        <span>Yesterday Revenue</span>
                        <p>$ {{ $yesterdaysum }}</p>
                        <div style="width: 100%; margin: 10px 0px;">
                            <div style="height: 7px; background-color: #e1e6f1;border-radius: 10px;">
                                <div style="height: 7px; background-color: #eb6f33 ; width: 60%;border-radius: 10px;">
                                </div>
                            </div>
                        </div>

                        <div class="expansion-label d-flex text-muted">
                            <span class="text-muted">Yesterday</span>
                            <span class="ml-auto" style="position: absolute;right: 15px;"><i
                                    class="fas fa-caret-up mr-1 text-success"></i>{{ round($yesterdayavg, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-20">
                    <div class="stats">
                        <span>Last 7 Days</span>
                        <p>$ {{ $last7daysum }}</p>
                        <div style="width: 100%; margin: 10px 0px;">
                            <div style="height: 7px; background-color: #e1e6f1;border-radius: 10px;">
                                <div style="height: 7px; background-color: #03c895 ; width: 50%;border-radius: 10px;">
                                </div>
                            </div>
                        </div>


                        <div class="expansion-label d-flex text-muted">
                            <span class="text-muted">Last 7 Days</span>
                            <span class="ml-auto" style="position: absolute;right: 15px;"><i
                                    class="fas fa-caret-up mr-1 text-success"></i>{{ round($last7dayavg, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-20">
                    <div class="stats">
                        <span>This Month</span>
                        <p>$ {{ $thismonthsum }}</p>
                        <div style="width: 100%; margin: 10px 0px;">
                            <div style="height: 7px; background-color: #e1e6f1;border-radius: 10px;">
                                <div style="height: 7px; background-color: #01b8ff; width: 90%;border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="expansion-label d-flex text-muted">
                            <span class="text-muted">This Month</span>
                            <span class="ml-auto" style="position: absolute;right: 15px;"><i
                                    class="fas fa-caret-up mr-1 text-success"></i>{{ round($thismonthavg, 2) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-20">
                    <div class="stats">
                        <span>Last Month</span>
                        <p>$ {{ $lastmonthsum }}</p>
                        <div style="width: 100%; margin: 10px 0px;">
                            <div style="height: 7px; background-color: #e1e6f1;border-radius: 10px;">
                                <div style="height: 7px; background-color: #be1ec4; width: 45%;border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="expansion-label d-flex text-muted">
                            <span class="text-muted">Last Month</span>
                            <span class="ml-auto" style="position: absolute;right: 15px;"><i
                                    class="fas fa-caret-up mr-1 text-success"></i>{{ round($lastmonthavg, 2) }}%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="dashbox">
                        <div class="dashbox__title">
                            <img src="{{ URL::asset('assets/admin/img/dashboard3.png') }}" alt="" width="1500px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop
