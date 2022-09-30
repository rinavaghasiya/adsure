@extends('Admin.header-footer')
@section('contenct')

    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="main__title">
                        <h2>Create User</h2>
                    </div>
                </div>


                {{-- date,packagename,adunit,impressions,clicks,adrequest,matchadrequest,ctr,coverage,revenue,adecpm --}}
                <div class="col-12">
                    @if (Session::has('createuser'))
                        <div class="alert alert-success">
                            {{ session::get('createuser') }}
                            <i class="material-icons closeicon" data-dismiss="alert">close</i>
                        </div>
                    @elseif(Session::has('emailerror'))
                        <div class="alert alert-danger">
                            {{ session::get('emailerror') }}
                            <i class="material-icons closeicon" data-dismiss="alert">close</i>
                        </div>
                    @endif
                    <form action="{{ url('createuser') }}" method="post" class="sign__form sign__form--profile">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                <h4 class="sign__title">Add User</h4>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="sign__group">
                                    <label class="sign__label" for="name">NAME</label>
                                    <input id="name" type="text" name="name" class="sign__input" placeholder="Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="sign__group">
                                    <label class="sign__label" for="username">USER NAME</label>
                                    <input id="username" type="text" name="username" class="sign__input"
                                        placeholder="User Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="sign__group">
                                    <label class="sign__label" for="oldpass">PASSWORD</label>
                                    <input id="password" type="password" name="password" class="sign__input"
                                        placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="sign__group">
                                    <label class="sign__label" for="oldpass">EMAIL</label>
                                    <input id="email" type="email" name="email" class="sign__input" placeholder="Email"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="sign__group">
                                    <label class="sign__label" for="oldpass">CONTACT</label>
                                    <input id="contact" type="text" name="contact" class="sign__input"
                                        placeholder="Contact" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="sign__group">
                                    <label class="sign__label" for="oldpass">COMPANY NAME</label>
                                    <input id="companynm" type="text" name="companyname" class="sign__input"
                                        placeholder="Company Name" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="sign__btn" type="submit">Save</button>
                            </div>
                        </div>
                    </form>

                    <div class="row" style="margin-top:50px;">
                        <div class="col-12">
                            <div class="main__table-wrap" data-scrollbar="true" tabindex="-1"
                                style="overflow: hidden; outline: none;">
                                <div class="scroll-content">
                                    <table class="main__table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Email</strong></th>
                                                <th><strong>Username</strong></th>
                                                <th><strong>Password</strong></th>
                                                <th><strong>Company Name</strong></th>
                                                <th><strong>Contact No</strong></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($data as $user)
                                                <tr>

                                                    <td>
                                                        <div class="main__table-text">{{ $user->name }}</div>
                                                    </td>

                                                    <td>
                                                        <div class="main__table-text">{{ $user->email }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">{{ $user->username }}</div>
                                                    </td>

                                                    <td>
                                                        <div class="main__table-text">{{ $user->password }}</div>
                                                    </td>

                                                    <td>
                                                        <div class="main__table-text">{{ $user->companyname }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text">{{ $user->contact }}</div>
                                                    </td>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
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
                            <div class="scrollbar-track scrollbar-track-x show" style="display: none;">
                                <div class="scrollbar-thumb scrollbar-thumb-x"
                                    style="width: 1260px; transform: translate3d(0px, 0px, 0px);"></div>
                            </div>
                            <div class="scrollbar-track scrollbar-track-y show" style="display: none;">
                                <div class="scrollbar-thumb scrollbar-thumb-y"
                                    style="height: 111px; transform: translate3d(0px, 0px, 0px);"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <div id="modal-view" class="zoom-anim-dialog mfp-hide modal modal--view">
        <div class="comments__autor">
            <img class="comments__avatar" src="img/user.svg" alt="">
            <span class="comments__name">John Doe</span>
            <span class="comments__time">30.08.2018, 17:53</span>
        </div>
        <p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
            believable. If you are going to use a passage of Lorem
            Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
        <div class="comments__actions">
            <div class="comments__rate">
                <span><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 7.3273V14.6537" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg> 12</span>

                <span>7<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.6667 10.9905H7.33333" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.6857 1H6.31429C3.04762 1 1 3.31208 1 6.58516V15.4148C1 18.6879 3.0381 21 6.31429 21H15.6857C18.9619 21 21 18.6879 21 15.4148V6.58516C21 3.31208 18.9619 1 15.6857 1Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></span>
            </div>
        </div>
    </div>
    <!-- end modal view -->

    <!-- modal delete -->
    <div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
        <h6 class="modal__title">Comment delete</h6>

        <p class="modal__text">Are you sure to permanently delete this comment?</p>

        <div class="modal__btns">
            <button class="modal__btn modal__btn--apply" type="button">Delete</button>
            <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
        </div>
    </div>
    <!-- end modal delete -->

    <!-- modal view -->
    <div id="modal-view2" class="zoom-anim-dialog mfp-hide modal modal--view">
        <div class="reviews__autor">
            <img class="reviews__avatar" src="img/user.svg" alt="">
            <span class="reviews__name">Best Marvel movie in my opinion</span>
            <span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

            <span class="reviews__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z" />
                </svg> 8.4</span>
        </div>
        <p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
            believable. If you are going to use a passage of Lorem
            Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
    </div>
    <!-- end modal view -->

    <!-- modal delete -->
    <div id="modal-delete2" class="zoom-anim-dialog mfp-hide modal">
        <h6 class="modal__title">Review delete</h6>

        <p class="modal__text">Are you sure to permanently delete this review?</p>

        <div class="modal__btns">
            <button class="modal__btn modal__btn--apply" type="button">Delete</button>
            <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
        </div>
    </div>
    <!-- end modal delete -->

    <!-- modal status -->
    <div id="modal-status3" class="zoom-anim-dialog mfp-hide modal">
        <h6 class="modal__title">Status change</h6>

        <p class="modal__text">Are you sure about immediately change status?</p>

        <div class="modal__btns">
            <button class="modal__btn modal__btn--apply" type="button">Apply</button>
            <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
        </div>
    </div>
    <!-- end modal status -->

    <!-- modal delete -->
    <div id="modal-delete3" class="zoom-anim-dialog mfp-hide modal">
        <h6 class="modal__title">User delete</h6>

        <p class="modal__text">Are you sure to permanently delete this user?</p>

        <div class="modal__btns">
            <button class="modal__btn modal__btn--apply" type="button">Delete</button>
            <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
        </div>
    </div>
    <!-- end modal delete -->


    </html>

@stop
