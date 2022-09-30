@extends('Client.header-footer')
@section('contant')
    <div class="main-content pt-0">
        <div class="container">

            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Welcome To User Dashboard</h2>
                    <ol class="breadcrumb">
                    </ol>
                </div>

            </div>


            <div class="row row-sm">
                <div class="col-sm-6 col-xl-20 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">Today Revenue</p>
                                <div class="ml-auto">
                                    <i class="fas fa-chart-line fs-20 text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">$ {{ $todaysum }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $todayavg }}"
                                    class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                            </div>
                            <div class="expansion-label d-flex">
                                <span class="text-muted">Todays</span>
                                <span class="ml-auto"><i
                                        class="fas fa-caret-up mr-1 text-success"></i>{{ round($todayavg, 2) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-20 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">Yesterday Revenue</p>
                                <div class="ml-auto">
                                    <i class="fab fa-rev fs-20 text-secondary"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">$ {{ $yesterdaysum }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $yesterdayavg }}"
                                    class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar">
                                </div>
                            </div>
                            <div class="expansion-label d-flex">
                                <span class="text-muted">Yesterday</span>
                                <span class="ml-auto"><i
                                        class="fas fa-caret-down mr-1 text-danger"></i>{{ round($yesterdayavg, 2) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-20 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">Last 7 Days Revenue</p>
                                <div class="ml-auto">
                                    <i class="fas fa-dollar-sign fs-20 text-success"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">$ {{ $last7daysum }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                    class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
                            </div>
                            <div class="expansion-label d-flex text-muted">
                                <span class="text-muted">Last 7 Days</span>
                                <span class="ml-auto"><i
                                        class="fas fa-caret-down mr-1 text-danger"></i>{{ round($last7dayavg, 2) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-20 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">This Month Revenue</p>
                                <div class="ml-auto">
                                    <i class="fas fa-signal fs-20 text-info"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">$ {{ $thismonthsum }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                    class="progress-bar progress-bar-xs wd-40p bg-info" role="progressbar"></div>
                            </div>
                            <div class="expansion-label d-flex text-muted">
                                <span class="text-muted">This Month</span>
                                <span class="ml-auto"><i
                                        class="fas fa-caret-up mr-1 text-success"></i>{{ round($thismonthavg, 2) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-20 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">Last Month Revenue</p>
                                <div class="ml-auto">
                                    <i class="fas fa-signal fs-20 text-info"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">$ {{ $lastmonthsum }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                    class="progress-bar progress-bar-xs wd-40p bg-info" role="progressbar"></div>
                            </div>
                            <div class="expansion-label d-flex text-muted">
                                <span class="text-muted">Last Month</span>
                                <span class="ml-auto"><i
                                        class="fas fa-caret-up mr-1 text-success"></i>{{ round($lastmonthavg, 2) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-sm">
                <div class="col-sm-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">
                            <img src="{{ URL::asset('assets/admin/img/dashboard3.png') }}" alt="" width="1500px;">

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="sidebar sidebar-right sidebar-animate">
        <div class="sidebar-icon">
            <a href="#" class="text-right float-right text-dark fs-20" data-toggle="sidebar-right"
                data-target=".sidebar-right"><i class="fe fe-x"></i></a>
        </div>
        <div class="sidebar-body">
            <h5>Todo</h5>
            <div class="d-flex p-2">
                <label class="ckbox"><input checked type="checkbox"><span>Hangout With friends</span></label>
                <span class="ml-auto">
                    <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Edit"></i>
                    <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Delete"></i>
                </span>
            </div>
            <div class="d-flex p-2 border-top">
                <label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
                <span class="ml-auto">
                    <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Edit"></i>
                    <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Delete"></i>
                </span>
            </div>
            <div class="d-flex p-2 border-top">
                <label class="ckbox"><input type="checkbox"><span>Prepare for presentation</span></label>
                <span class="ml-auto">
                    <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Edit"></i>
                    <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Delete"></i>
                </span>
            </div>
            <div class="d-flex p-2 border-top">
                <label class="ckbox"><input checked type="checkbox"><span>System Updated</span></label>
                <span class="ml-auto">
                    <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Edit"></i>
                    <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Delete"></i>
                </span>
            </div>
            <div class="d-flex p-2 border-top">
                <label class="ckbox"><input type="checkbox"><span>Do something more</span></label>
                <span class="ml-auto">
                    <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Edit"></i>
                    <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Delete"></i>
                </span>
            </div>
            <div class="d-flex p-2 border-top">
                <label class="ckbox"><input type="checkbox"><span>System Updated</span></label>
                <span class="ml-auto">
                    <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Edit"></i>
                    <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Delete"></i>
                </span>
            </div>
            <div class="d-flex p-2 border-top">
                <label class="ckbox"><input type="checkbox"><span>Find an Idea</span></label>
                <span class="ml-auto">
                    <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Edit"></i>
                    <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Delete"></i>
                </span>
            </div>
            <div class="d-flex p-2 border-top mb-4 border-bottom">
                <label class="ckbox"><input type="checkbox"><span>Project review</span></label>
                <span class="ml-auto">
                    <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Edit"></i>
                    <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title="" data-placement="top"
                        data-original-title="Delete"></i>
                </span>
            </div>
            <h5>Overview</h5>
            <div class="p-2">
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Founder &amp; CEO</span> <span>24</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="20"
                            class="progress-bar progress-bar-xs wd-20p" role="progressbar"></div>
                    </div>
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>UX Designer</span> <span>1</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="15"
                            class="progress-bar progress-bar-xs bg-secondary wd-15p" role="progressbar"></div>
                    </div>
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Recruitment</span> <span>87</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="45"
                            class="progress-bar progress-bar-xs bg-success wd-45p" role="progressbar"></div>
                    </div>
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Software Engineer</span> <span>32</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25"
                            class="progress-bar progress-bar-xs bg-info wd-25p" role="progressbar"></div>
                    </div>
                </div>
                <div class="main-traffic-detail-item">
                    <div>
                        <span>Project Manager</span> <span>32</span>
                    </div>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25"
                            class="progress-bar progress-bar-xs bg-danger wd-25p" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@stop
