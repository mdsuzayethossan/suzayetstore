{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.admin')
@section('content')
<!-- Main Wrapper -->
<div class="main-wrapper main-wrapper-email">
    <div class="account-content">
        <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a>
        <div class="container">

            <!-- Account Logo -->
            <div class="account-logo">
                <a href="index.html"><img style="width: 80px; height:80px; border-radius:50%; border:5px solid #fbbe32" src="{{ asset('dashboard_assets/img/logo.jpg') }}" alt="Dreamguy's Technologies"></a>
            </div>
            <!-- /Account Logo -->

            <div class="account-box">
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
                <div class="account-wrapper">

                    <h3 class="account-title">Verify Your Email Address</h3>
                    <p class="account-subtitle">Before proceeding, please check your email for a verification link. If you did not receive the email,</p>

                    <!-- Account Form -->
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">click here to request another</button>
                        </div>

                    </form>
                    <!-- /Account Form -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->
@endsection
