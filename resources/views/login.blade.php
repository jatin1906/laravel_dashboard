@extends('layouts.index')

@section('title','Login')


@section('login')

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                        style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">We are The Developer Team</h4>
                                </div>
                                @if ($errors->any())
                                <div class="alert alert-danger popup" style="/* height:50px; */margin: -1px;padding: 9px;">

                                    @foreach ($errors->all() as $error)
                                    {{ $error }}
                                    @endforeach

                                </div>
                                @endif


                                <form action="{{route('addlogin.LoginUsers')}}" id="form" method="POST">
                                    @csrf
                                    <!-- <p>Please login to your account</p> -->

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" id="form2Example11" class="form-control" value="{{ old('email') }}" placeholder="Phone number or email address" name='email' />
                                        <span class="error-message">Please Enter Username</span>

                                        @if ($errors->has('email'))
                                        <div class="error-message" style="color: red;">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="password" name='password' value="{{ old('password') }}" class="form-control" placeholder="Password" /><i class="fa-solid eye fa-eye"></i>
                                        <span class="error-message">Please Enter Password</span>
                                        @if ($errors->has('password'))
                                        <div class="error-message" style="color: red;">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <div class="captcha">
                                            <span>{!! app('captcha')->display() !!}</span>
                                            <span class="error-captcha">You are not a human</span>
                                        </div>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1" style="display: flex;
                                    flex-direction:column">
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block gradient-custom-2 mb-3 " style="float: left!important;" type="submit">Log
                                            in</button>
                                        <!-- <a class="text-muted" href="" id="forget">Forgot password?</a> -->
                                    </div>

                                    <!-- <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                                    </div> -->

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Hello Team</h4>
                                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
@endsection