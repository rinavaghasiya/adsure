@extends('Client.header-footer')
@section('contant')

    <div class="main-content pt-0">
        <div class="container">
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Welcome To User Repot</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ 'dashboad' }}">Dashboard</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Sales Repot</li> --}}
                    </ol>
                </div>
                <div class="d-flex">

                    <div class="mr-2">
                        <a class="btn ripple btn-outline-primary dropdown-toggle mb-0" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                            <i class="fe fe-external-link"></i> Export <i class="fas fa-caret-down ml-1"></i>
                        </a>
                        <div class="dropdown-menu tx-13">

                            <a class="dropdown-item" href="{{ url('export') }}"><i class="far fa-file-excel mr-2"></i>Export as
                                Excel</a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="example">
                            <div class="input-group">
                                <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                <input type="text" name="datefilter" class="form-control" placeholder="Account Created Date" />
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="responsive-background">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="advanced-search">
                        <div class="row align-items-center">
                            <div class="" style=" display: flex;align-items: flex-end;">
                                <div class="row">
                                    {{-- <form action=" {{ url('today') }}" method="get"
                                        style=" display: flex; align-items: flex-end;">
                                        <div class="" style=" padding: 0 15px;padding-left:20px;">
                                            <button type="submit" class="btn-50">Today</button>
                                        </div>
                                    </form>

                                    <form action=" {{ url('yesterday') }}" method="get"
                                        style=" display: flex; align-items: flex-end;">
                                        <div class="" style=" padding: 0 15px;padding-left:20px;">
                                            <button type="submit" class="btn-50">Yesterday</button>
                                        </div>
                                    </form>

                                    <form action=" {{ url('last7days') }}" method="get"
                                        style=" display: flex; align-items: flex-end; ">
                                        <div class="" style=" padding: 0 15px;padding-left:20px;">
                                            <button type="submit" class="btn-50">Last 7 Days</button>
                                        </div>
                                    </form>

                                    <form action=" {{ url('thismonth') }}" method="get"
                                        style=" display: flex; align-items: flex-end;">
                                        <div class="" style=" padding: 0 15px;padding-left:20px;">
                                            <button type="submit" class="btn-50">ThisMonth</button>
                                        </div>
                                    </form> --}}

                                    {{-- <div class="" style=" padding: 0 15px;">
                                    <button type="button" class="btn-50" onclick="yesterday()">Yesterday</button>
                                </div>
                                <div class="" style=" padding: 0 15px;">
                                    <button type="button" class="btn-50" onclick="lastseven()">Last 7
                                        Days</button>
                                </div>
                                <div class="" style=" padding: 0 15px;">
                                    <button type="button" class="btn-50" onclick="thisMonth()">This
                                        Month</button>
                                </div> --}}
                                    {{-- <div class="" style=" padding: 0 15px;">
                                        <button type="button" class="btn-50" onclick="lastMonth()">Last
                                            Month</button>
                                    </div> --}}
                                </div>


                                <form action=" {{ url('datewise') }}" method="get"
                                    style=" display: flex; align-items: flex-end;">
                                    <div class="row" style="padding-left: 30px;" id="cstomrange">
                                        <div class="col-md-6">
                                            <div class="form-group mb-lg-0">
                                                <label class="___class_+?31___">From :</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-calendar lh--9 op-6"></i>
                                                        </div>
                                                    </div><input class="form-control" type="date" name="fromdate"
                                                        id="from">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-lg-0">
                                                <label class="___class_+?39___">To :</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-calendar lh--9 op-6"></i>
                                                        </div>
                                                    </div><input class="form-control" type="date" name="todate"
                                                        id="to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="" style=" padding: 0 15px;padding-left:30px;">
                                            <button type="submit" class="btn-50">Apply</button>
                                        </div>
                                    </div>
                                </form>

                                {{-- <form action="{{ url('report') }}" method="get"> --}}

                                    <div class="row" style="padding-left: 30px;" id="cstomrange">
                                        <div class="input-group">
                                            <select name="date_search" id="date_search" class="form-control">
                                                <option value="" selected>Search DateWise Data</option>
                                                <option value="todays">Todays</option>
                                                <option value="yesterdays">Yesterdays</option>
                                                <option value="thismonth">Thismonth</option>
                                                <option value="thisweek">Thisweek</option>
                                                <option value="cutomrange">cutomrange</option>
                                            </select>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-sm">
                {{-- <div class="col-sm-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">
                            <div class="card-option d-flex">
                                <div>
                                    <h6 class="card-title mb-1">Overview of Sales Win/Lost</h6>
                                    <p class="text-muted card-sub-title">Comapred to last month sales.</p>
                                </div>
                                <div class="card-option-title ml-auto">
                                    <div class="btn-group p-0">
                                        <button class="btn btn-light btn-sm" type="button">Month</button>
                                        <button class="btn btn-outline-light btn-sm" type="button">Year</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <canvas id="sales"></canvas>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
            <div class="row">
                <div class="col-sm-12 col-xl-12 col-lg-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div style="float: left;">
                                <form action="" class="main__title-form">
                                    {{-- <a href="{{ url('report') }}"
                                        style="position: relative; display: block; padding: .5rem .75rem;margin-left: -10px;  line-height: 1.25;"><?php echo '<u> All Records </u>'; ?></a> --}}
                                    <div style="float: left;">
                                        Showing&nbsp;<select id="pagination">
                                            {{-- <option value="1" @if ($items == 1) selected @endif>1</option> --}}
                                            <option value="5" @if ($items == 5) selected @endif>5
                                            </option>
                                            <option value="10" @if ($items == 10) selected @endif>10
                                            </option>
                                            <option value="20" @if ($items == 20) selected @endif>20
                                            </option>
                                            <option value="30" @if ($items == 30) selected @endif>30
                                            </option>
                                            <option value="40" @if ($items == 40) selected @endif>40
                                            </option>
                                        </select>&nbsp;Entries
                                    </div>
                                </form>
                                <br>
                                <a href="{{ url('searchdata') }}"
                                    style="position: relative; display: block; padding: .5rem .75rem;margin-left: -10px;  line-height: 1.25;"><?php echo '<u> All Records </u>'; ?></a>
                            </div>
                            <form id="myform">
                            <div style="float: right;">
                       
                                AdUnit: <select id="mylist" name="mylist">
                                    <option selected disabled>Select AdRequests</option>
                                    <?php  $adunit = DB::table('report')->select('adrequests')->distinct()->get();?>
                                    @foreach($adunit as $unit)
                                    <option value="{{$unit->adrequests}}" onchange="form.submit()" > {{$unit->adrequests}} </option>
                                    @endforeach
                                    {{-- <option value="21939239661 ? apl ? adsure ? Adsure_banner_app">XVP2021_banner --}}
                                    {{-- </option>
                                    <option value="21939239661 ? apl ? adsure ? Adsure_interstitial_app">
                                        XVP20211_Interstitial</option>
                                    <option value="21939239661 ? apl ? adsure ? Adsure_openad_app">XVP2021_Openads
                                    </option> --}}
                                </select>

                                <label>Search:</label> &nbsp;
                                <input type="text" name="search" class="searchtext" id="search" 
                                    placeholder="Search Item">
                                {{-- <button type="submit" id="ajaxSubmit">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="8.25998" cy="8.25995" r="7.48191" stroke="#2F80ED"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        </circle>
                                        <path d="M13.4637 13.8523L16.3971 16.778" stroke="#2F80ED" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </button> --}}
                                <button id="ajaxSubmit">Filter Result</button>
                               
                            </div>
                        </form>
                            <br><br>
                            <div class="table-responsive">

                                @if (count($data) <= 0)
                                @else
                                    <table class="table table-bordered text-nowrap mb-0" id="myTable">
                                        <thead>
                                            <tr>
                                                <th><strong>Dyas</strong></th>
                                                <th><strong>Mobile App ID</strong></th>
                                                <th><strong>DFP Ad Units</strong></th>
                                                <th><strong>Ad requests </strong></th>
                                                <th><strong>Matched requests</strong></th>
                                                <th><strong>Clicks</strong></th>
                                                <th><strong>CTR</strong></th>
                                                <th><strong>Estimated revenue ($)</strong></th>
                                                <th><strong>Ad impressions</strong></th>
                                                <th><strong>Ad eCPM ($)</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tdata">
                                            <?php
                                            $i = 0;
                                            $impression = 0;
                                            $clicks = 0;
                                            $ctr = 0;
                                            $ad = 0;
                                            $match = 0;
                                            $revenue = 0;
                                            $aecpm = 0;
                                            ?>

                                            @foreach ($data as $user)
                                                <?php
                                                $impression += str_replace(',', '', $user->adimpressions);
                                                $clicks += str_replace(',', '', $user->clicks);
                                                $ctr += str_replace('%', '', $user->ctr);
                                                $ad += str_replace(',', '', $user->adrequests);
                                                $match += str_replace(',', '', $user->matchedrequests);
                                                
                                                $revenue += str_replace(',', '', $user->estimatedrevenue);
                                                $aecpm += $user->adecpm;
                                                ?>
                                                <tr>
                                                    <td>{{ $user->days }}</td>
                                                    <td>{{ $user->mobileappid }}</td>
                                                    <td>{{ $user->dfpadunits }}</td>
                                                    <td>{{ $user->adrequests }}</td>
                                                    <td>{{ $user->matchedrequests }}</td>
                                                    <td>{{ $user->clicks }}</td>
                                                    <td>{{ $user->ctr }}</td>
                                                    <td>{{ $user->estimatedrevenue }}</td>
                                                    <td>{{ $user->adimpressions }}</td>
                                                    <td>{{ $user->adecpm }}</td>

                                                </tr>
                                                <?php $i++; ?>
                                            @endforeach

                                            <tr>
                                                <td colspan="3"><strong>Total:</strong></td>
                                                <td><?php echo $ad; ?></td>
                                                <td><?php echo $match; ?></td>
                                                <td><?php echo $clicks; ?></td>
                                                <td><?php echo round($ctr / $i, 2); ?>%</td>
                                                <td><?php echo $revenue; ?></td>
                                                <td><?php echo $impression; ?></td>
                                                <td><?php echo round($aecpm / $i, 2); ?></td>
                                            <tr>
                                        </tbody>
                                    </table>
                                @endif

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="pagination-bar text-center" style="float: left;">
                                <nav aria-label="Page navigation " class="d-inline-b">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            {{ $data->appends(\Request::except('_token'))->render() }}

                                        </li>
                                    </ul>
                                </nav>
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
                        <label class="ckbox"><input checked type="checkbox"><span>Hangout With
                                friends</span></label>
                        <span class="ml-auto">
                            <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-2 border-top">
                        <label class="ckbox"><input type="checkbox"><span>Prepare for
                                presentation</span></label>
                        <span class="ml-auto">
                            <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-2 border-top">
                        <label class="ckbox"><input type="checkbox"><span>Prepare for
                                presentation</span></label>
                        <span class="ml-auto">
                            <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-2 border-top">
                        <label class="ckbox"><input checked type="checkbox"><span>System Updated</span></label>
                        <span class="ml-auto">
                            <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-2 border-top">
                        <label class="ckbox"><input type="checkbox"><span>Do something more</span></label>
                        <span class="ml-auto">
                            <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-2 border-top">
                        <label class="ckbox"><input type="checkbox"><span>System Updated</span></label>
                        <span class="ml-auto">
                            <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-2 border-top">
                        <label class="ckbox"><input type="checkbox"><span>Find an Idea</span></label>
                        <span class="ml-auto">
                            <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-2 border-top mb-4 border-bottom">
                        <label class="ckbox"><input type="checkbox"><span>Project review</span></label>
                        <span class="ml-auto">
                            <i class="fe fe-edit-2 text-primary mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger mr-2" data-toggle="tooltip" title=""
                                data-placement="top" data-original-title="Delete"></i>
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

            <script type="text/javascript">
                // document.getElementById('pagination').onchange = function() {
                //     window.location = "{{ $data->url(1) }}&items=" + this.value;
                // };

                // function myFunction() {
                //     var input, filter, table, tr, td, i, txtValue;
                //     input = document.getElementById("search");
                //     filter = input.value.toUpperCase();
                //     table = document.getElementById("myTable");
                //     tr = table.getElementsByTagName("tr");

                //     for (i = 0; i < tr.length; i++) {
                //         td = tr[i].getElementsByTagName("td");
                //         tr[i].style.display = "none";
                //         for (j = 0; j < td.length; j++) {
                //             if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                //                 tr[i].style.display = "";
                //             }
                //         }
                //     }
                //     document.getElementById('pagination').onchange = function() {
                //         window.location = "{{ $data->url(1) }}&items=" + this.value;
                //     };
                // }


                // function mystatus() {
                //     var input, filter, table, tr, td, i;
                //     input = document.getElementById("mylist");
                //     filter = input.value.toUpperCase();

                //     console.log(filter);
                //     table = document.getElementById("myTable");
                //     tr = table.getElementsByTagName("tr");

                //     for (i = 0; i < tr.length; i++) {
                //         td = tr[i].getElementsByTagName("td")[2];
                //         if (td) {
                //             if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                //                 tr[i].style.display = "";
                //             } else {
                //                 tr[i].style.display = "none";
                //             }
                //         }
                //     }
                // }

            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript">

        // $(document).ready(function() {
        //     $(document.getElementById("search")).on('keyup', function() {
                  
        //         $value = $(this).val();
        //             if ($value) {
        //                 $.ajax({
        //                     headers: {
        //                             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //                         },
        //                     type: 'get',
        //                     url: "{{ url('searchdata') }}",
        //                     data: {
        //                         search: $value,
        //                     },
        //                     success: function(response) {
        //                         // We get the element having id of display_info and put the response inside it
        //                         $('#tdata').html(response);
        //                     },
        //                     error:function(e)
        //                     {
        //                         $('#tdata').html('Data Not Found');
        //                     }
        //                 });
        //             }
        //         });



        //         $(document.getElementById("date_search")).on('change',function() {
        //           $date_search = $(this).val();
        //           alert($date_search);
        //               if ($date_search) {
        //                   $.ajax({
        //                       headers: {
        //                               'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //                           },
        //                       type: 'get',
        //                       url: "{{ url('searchdata') }}",
        //                       data: {
        //                           search: $date_search,
        //                       },
        //                       success: function(response) {
        //                           // We get the element having id of display_info and put the response inside it
        //                           $('#tdata').html(response);
        //                       }
        //                   });
        //               } else {
        //                   $('#tdata').html("Please Enter Some Words");
        //               }
        //           });
  


        //     });


        $('#search').on('keyup', function(){
            search(); 
        });
        search();
        function search(){
            var keyword = $('#search').val();
            $.post('{{ url("searchdata") }}',
            {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword:keyword
            },
            function(data){
                
                console.log(data);
            });
        }



                // $(document).ready(function() {
                //     $(document.getElementById("search")).on('keyup', function() {
                //      $value = $(this).val();
                //          alert($value);
                //        delay(function() {
                //            $.ajax({
                //                  headers: {
                //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
                //                },
                //                  url: "{{ url('searchdata') }}",
                //                 type: 'get',
                //               data: {
                //                      'search': $value
                //                 },
                //                done: function(data) {
                //                      console.log($data);
                //                     // $('tbody').html(data);
                //                }
                //            });
                //      }, 300);
                //     });
                // });
            </script> 

            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
            {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> --}}

            <script>
            //    jQuery(document).ready(function(){
            //     jQuery('#ajaxSubmit').click(function(e){
            //      e.preventDefault();
            //      $.ajaxSetup({
            //       headers: {
            //           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            //       }
            //   });
            //      jQuery.ajax({
            //       
            //         method: "get",
            //         data: {
            //             adrequests: jQuery('#mylist').val(),
                      
            //        },
            //        success: function(result){
            //            alert(result);
            //            console.log(result);
            //        }});
            //  });
            // });


            // $(document).ready(function() {
            // $(document.getElementById("mylist")).on('change', function(e) {
            //       $value = $(this).val();
            //     //   alert($value);
            //               $.ajax({
            //                   headers: {
            //                           'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //                       },
            //                   type: 'get',
            //                   url: "{{ url('') }}",
            //                   data: {
            //                     adrequests : $value,
            //                   },
            //                   success: function(response) {
            //                       // We get the element having id of display_info and put the response inside it
                                
            //                       $('#tdata').html(response);
            //                   },
            //                   error:function(e)
            //                   {
            //                       $('#tdata').html('Data Not Found');
            //                   }
            //               });
            //       });
            //     });  
               
            </script>


        @stop
