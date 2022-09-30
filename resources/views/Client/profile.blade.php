@extends('Client.header-footer')
@section('contant')


    <!-- Main Content-->
    <div class="main-content pt-0">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Profile</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </div>

            </div>
            <!-- End Page Header -->
            <!-- Row -->
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body text-center">
                            <div class="main-profile-overview widget-user-image text-center">
                                <div class="main-img-user"><img alt="avatar" src="assets/img/user.png"></div>
                            </div>
                            <div class="item-user pro-user">
                                <h4 class="pro-user-username text-dark mt-2 mb-0">{{ Session::get('name') }}</h4>
                                <p class="pro-user-desc text-muted mb-1">{{ Session::get('username') }}</p>

                                {{-- <a href="#" class="btn ripple btn-primary btn-sm"><i class="far fa-edit mr-1"></i>Edit</a> --}}

                            </div>
                        </div>

                    </div>

                    <div class="card custom-card">
                        <div class="card-header custom-card-header">
                            <div>
                                <h6 class="card-title mb-0">Contact Information</h6>
                            </div>
                        </div>
                        <div class="card-body-2">
                            <div class="main-profile-contact-list main-profile-work-list">
                                <div class="media">
                                    <div class="media-logo bg-light text-dark">
                                        <i class="fe fe-smartphone"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Mobile</span>
                                        <div>
                                            {{ $data->contact }}
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="card custom-card main-content-body-profile">
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ session::get('error') }}
                                <i class="material-icons closeicon" data-dismiss="alert">close</i>
                            </div>
                        @endif
                        <nav class="nav main-nav-line">
                            <a class="nav-link active" data-toggle="tab" href="#tab1over">Overview</a>
                        </nav>

                        <div class="card-body tab-content h-100">
                            <div class="tab-pane active" id="tab1over">
                                <div class="main-content-label tx-13 mg-b-20">
                                    Account Information
                                    {{-- <div style="float: right">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#edit" data-backdrop="static">Edit Profile</button>
                                    </div> --}}
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class=" table row table-borderless">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Full Name :</strong> {{ $data->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>User Name :</strong> {{ $data->username }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Company Name :</strong> {{ $data->companyname }}</td>
                                            </tr>
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-0">

                                            <tr>
                                                <td><strong>Email :</strong> {{ $data->email }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone :</strong>{{ $data->contact }} </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="main-content-label tx-13 mg-b-20">
                                    Password:
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#changepassword" data-backdrop="static">Change Password</button>
                                </div> --}}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
    </div>
    <!-- End Main Content-->
    <!-- Sidebar -->


    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('editprofile') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Full Name" value="{{ $data->name }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" placeholder="User Name" value="{{ $data->username }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Email Address" value="{{ $data->email }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="contact" placeholder="Contact" value="{{ $data->contact }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="companyname" placeholder="Company Name"
                                value="{{ $data->companyname }}" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn">Change</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="changepassword" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('editpassword') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="password" name="oldpassword" placeholder="Old Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="newpassword" placeholder="New Password" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn">Chage Password</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop
