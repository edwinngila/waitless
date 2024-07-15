@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
            @if (session('success'))
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-12">
            <div class="row">
                <h1>update user profile</h1>
            </div>
            <div class="row d-flex align-content-center justify-content-center">
                <div class="col-10">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Link</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade show active">
                                <div class="container">
                                    <div class="row d-flex align-content-center justify-content-center">
                                        <div class="col-7">

                                            <form class="mt-3" action="{{ route('updateUserProfile') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="row d-flex justify-content-center align-content-center">
                                                        <img class="user-image img-circle elevation-2" style="height:100px;width:100px;" src="{{ asset($user->profile_img) }}" alt="{{ $user->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">upload photo</label>
                                                        <input name="upload" class="form-control" type="file" id="formFile">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                                    <input name="name" value="{{ $user->name }}" type="name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                                    <input name="email" value="{{ $user->email }}" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary m-1">Update</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="container">
                                    <div class="row d-flex align-content-center justify-content-center mt-5">
                                        <div class="col-7 mt-2">

                                           <form action="{{ route('updateUserPassword') }}" method="post">
                                              @csrf
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Old-password</label>
                                                    <input name="OldPassword" type="password" class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                                    <input name="password" type="password" class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Confirm-password</label>
                                                    <input name="confirmPassword" type="password" class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary m-1">Update</button>
                                                    </div>
                                                </div>
                                           </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="container">
                                    <div class="row d-flex align-content-center justify-content-center">
                                        <div class="col-7">

                                            <form action="" method="post">
                                                @csrf
                                                <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
                                                    <i class="fa-solid fa-circle-exclamation m-1"></i>
                                                    <div>
                                                        <h2>Delete this account</h2>
                                                        <p>when you click on this button you will delete your account</p>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-content-center justify-content-center">
                                                    <button type="button" class="btn btn-danger mt-3 col-11">Delete</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
