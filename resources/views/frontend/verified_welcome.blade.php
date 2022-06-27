@extends('master')
@section('content')

  <!-- register_section - start
            ================================================== -->
            <section class="register_section section_space">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <ul class="nav register_tabnav ul_li_center" role="tablist">
                                <li role="presentation">
                                    @if (session('customer_name')) <button class="active" data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="true">Hi!, {{ session('customer_name') }}</button>@endif
                                </li>

                            </ul>

                            <div class="register_wrap tab-content text-center">
                                 <h3></h3>
                                <div class="welcome_image mb-3">
                                    <img src="{{ asset('frontend_assets/images/welcome/welcome.jpg') }}" alt="welcome">
                                </div>
                                <a href="{{ route('signin') }}" class="btn btn_primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- register_section - end
            ================================================== -->
@endsection
