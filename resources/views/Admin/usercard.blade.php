@extends('Admin.header-footer')
@section('contenct')

    <main class="main">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="main__title">
                        <h2>User-Card</h2>
                        <a href="{{ url('createuser') }}" class="main__title-link">Create user</a>
                    </div>
                </div>

                @foreach ($user as $u)
                    <div class="col-12 col-xl-6">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                                    </svg> <a href="{{ url('getuserdetail?uid=' . $u->username) }}"><span
                                            style="text-transform: capitalize;">{{ $u->companyname }}</span></a>

                                </h3>
                                <div class="dashbox__wrap">
                                    <a class="dashbox__more"
                                        href="{{ url('showpackage?uid=' . $u->username) }}">Packages</a>
                                </div>
                            </div>

                            <div class="dashbox__table-wrap dashbox__table-wrap--3">
                                <table class="main__table main__table--dash">
                                    <thead>
                                        <tr>
                                            <th>UserName</th>
                                            <th>Publish</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="main__table-text">{{ $u->username }}</div>
                                            </td>
                                            <?php $aa = App\package::where('username', $u->username)->get(); ?>
                                            <td>
                                                <div class="main__table-text"><?php echo count($aa); ?></div>
                                            </td>

                                            <td>
                                                <div class="main__table-text"><?php echo count($aa); ?></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>


    </body>


    </html>
@stop
