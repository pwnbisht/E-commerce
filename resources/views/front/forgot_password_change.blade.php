@extends('front/layout')
@section('page_title', 'Change Password')
@section('container')

<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-myaccount-login">
                                <h4>Change Password</h4>
                                <form action="" class="aa-login-form" id="frmUpdatePassword">
                                    @csrf
                                    <label for="">Enter new Password Here<span>*</span></label>
                                    <input type="password" name="password" placeholder="New Password" required>
                                    <label for="">Confirm Password<span>*</span></label>
                                    <input type="password" name="cnfm_password" placeholder="Confirm Passsord" required>
                                    <button type="submit" class="aa-browse-btn" id="btnUpdatePassword">Change</button>
                                </form>
                            </div>
                            <div id="forget_pass" class="field_success"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
