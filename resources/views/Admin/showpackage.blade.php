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


                {{-- @if (count($data) > 0) --}}
                <div class="col-12">
                    <div class="main__table-wrap">
                        <table class="main__table" id=myTable>
                            <thead>
                                <tr>

                                    <th><strong>Mobile App ID</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Email</strong></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $user)

                                    <tr>

                                        <td>
                                            <div class="main__table-text">{{ $user->mobileappid }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="main__table-text" style="text-transform: capitalize;">
                                                {{ $user->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">{{ $user->email }}
                                            </div>
                                        </td>

                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- @else
                    <div class="col-12" style="color: red;">
                        <center><b style="font-size: 20px;"> No Any Records...</b></center>
                    </div>
                @endif --}}
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
