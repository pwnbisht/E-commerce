@extends('front/layout')
@section('page_title', 'Registration')
@section('container')

    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="{{ asset('storage\media\login_registration_banner\banner.jpeg') }}" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Login or SignUp</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="aa-myaccount-login">
                                    <h4>Login</h4>
                                    <form action="" class="aa-login-form">
                                        <label for="">Username or Email address<span>*</span></label>
                                        <input type="text" placeholder="Username or email">
                                        <label for="">Password<span>*</span></label>
                                        <input type="password" placeholder="Password">
                                        <button type="submit" class="aa-browse-btn">Login</button>
                                        <label class="rememberme" for="rememberme"><input type="checkbox"
                                                id="rememberme"> Remember me </label>
                                        <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="aa-myaccount-register">
                                    <h4>Register</h4>
                                    <form action="" class="aa-login-form" id="frmRegistration">
                                        @csrf

                                        <label for="">Name<span>*</span></label>
                                        <input type="text" name="name" placeholder="Pawan Bisht" required>
                                        <div id="name_error" class="field_error"></div>

                                        <label for="">Username or Email address<span>*</span></label>
                                        <input type="text" name="email" placeholder="xyz@email.com" required>
                                        <div id="email_error" class="field_error"></div>

                                        <label for="">Password<span>*</span></label>
                                        <input type="password" name="password" placeholder="Password" required>
                                        <div id="password_error" class="field_error"></div>

                                        <label for="">Mobile<span>*</span></label>
                                        <input type="text" name="mobile" placeholder="Mobile number" required>
                                        <div id="mobile_error" class="field_error"></div>

                                        <button type="submit" class="aa-browse-btn" id="btnRegistration">Register</button>
                                    </form>
                                </div>
                                <div id="reg_cmplt_msg" class="field_success"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
