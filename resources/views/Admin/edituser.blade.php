@extends('Admin.header-footer')
@section('contenct')

    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <?php $dd = App\users::where('username', $uid)->first(); ?>
                        <h2><?php echo $dd->companyname; ?> </h2>


                        <span class="main__title-stat">{{ $dd->username }}</span>
                        <div class="main__title-wrap">
                            <!-- filter sort -->

                            <form action="" class="main__title-form">
                                <a href="{{ url('getuserdetail?uid=' . $uid) }}"
                                    style="position: relative; display: block; padding: .5rem .75rem;margin-left: -10px;  line-height: 1.25;"><?php echo '<u> All Records </u>'; ?></a>

                                {{-- <div style="float: left;">
                                    AdUnit: <select id="mylist" onchange="mystatus()">
                                        <option selected disabled>Select AdUnit</option>
                                        <option value="21939239661 ?? apl ?? adsure ?? Adsure_native_app">XVP2021_Native
                                        </option>
                                        <option value="21939239661 ?? apl ?? adsure ?? Adsure_banner_app">XVP2021_banner
                                        </option>
                                        <option value="21939239661 ?? apl ?? adsure ?? Adsure_interstitial_app">
                                            XVP20211_Interstitial</option>
                                        <option value="21939239661 ?? apl ?? adsure ?? Adsure_openad_app">XVP2021_Openads
                                        </option>
                                    </select>
                                </div> --}}

                                <div style="float: right;">
                                    Showing&nbsp;<select id="pagination">
                                        <option value="5" @if ($items == 5) selected @endif>5</option>
                                        <option value="10" @if ($items == 10) selected @endif>10</option>
                                        <option value="20" @if ($items == 20) selected @endif>20</option>
                                        <option value="30" @if ($items == 30) selected @endif>30</option>
                                        <option value="40" @if ($items == 40) selected @endif>40</option>
                                    </select>&nbsp;Entries
                                </div>
                            </form>

                            <!-- end filter sort -->

                            <!-- search -->
                            <form action="" class="main__title-form">
                                <label>Search:</label> &nbsp;
                                <input type="text" name="search" id="search" value="{{ $search }}"
                                    onkeyup="myFunction()" placeholder="Search Item">
                                <button type="button">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="8.25998" cy="8.25995" r="7.48191" stroke="#2F80ED" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></circle>
                                        <path d="M13.4637 13.8523L16.3971 16.778" stroke="#2F80ED" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </form>
                            <!-- end search -->
                        </div>

                    </div>
                </div>
                <!-- end main title -->

                <!-- users -->


                @if (count($data) > 0)
                    <div class="col-12">
                        <div class="main__table-wrap">
                            <table class="main__table" id=myTable>
                                <thead>
                                    <tr>
                                        <th><strong>Days</strong></th>
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

                                <tbody>
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
                                        $aecpm += str_replace(',', '', $user->adecpm);
                                        ?>
                                        <tr>

                                            <td>
                                                <div class="main__table-text" style="color: #2d2d2d;">{{ $user->days }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->mobileappid }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->dfpadunits }}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->adrequests }}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->matchedrequests }}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->clicks }}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->ctr }}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->estimatedrevenue }}</div>
                                            </td>

                                            <td>
                                                <div class="main__table-text">{{ $user->adimpressions }}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->adecpm }}</div>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach

                                    <tr>
                                        <td colspan="3">
                                            <div class="main__table-text"><strong>Total:</strong></div>
                                        </td>
                                        <td>
                                            <div class="main__table-text"><?php echo $ad; ?> </div>
                                        </td>
                                        <td>
                                            <div class="main__table-text"> <?php echo $match; ?></div>
                                        </td>
                                        <td>
                                            <div class="main__table-text"><?php echo $clicks; ?> </div>
                                        </td>
                                        <td>
                                            <div class="main__table-text"><?php echo round($ctr / $i, 2); ?>% </div>
                                        </td>

                                        <td>
                                            <div class="main__table-text"><?php echo $revenue; ?> </div>
                                        </td>

                                        <td>
                                            <div class="main__table-text"> <?php echo $impression; ?></div>
                                        </td>
                                        <td>
                                            <div class="main__table-text"> <?php echo $aecpm; ?></div>
                                        </td>


                                    <tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="col-12" style="color: red;">
                        <center><b style="font-size: 20px;"> No Any Records...</b></center>
                    </div>
                @endif
                <!-- end users -->

                <!-- paginator -->
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
                <!-- end paginator -->
            </div>
        </div>
    </main>

    <script type="text/javascript">
        document.getElementById('pagination').onchange = function() {
            window.location = "{{ $data->url(1) }}&items=" + this.value;
        };


        function mystatus() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("mylist");
            filter = input.value.toUpperCase();

            console.log(filter);
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function myFunction() {

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                tr[i].style.display = "none";

                for (j = 0; j < td.length; j++) {
                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                }
            }
        }
    </script>
@stop
