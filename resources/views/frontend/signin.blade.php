@extends('master')
@section('content')

            <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Login/Register</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- register_section - start
            ================================================== -->
            <section class="register_section section_space">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <ul class="nav register_tabnav ul_li_center" role="tablist">
                                <li role="presentation">
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="true">Sign In</button>
                                </li>
                                <li role="presentation">
                                    <button data-bs-toggle="tab" data-bs-target="#signup_tab" type="button" role="tab" aria-controls="signup_tab" aria-selected="false">Register</button>
                                </li>
                            </ul>

                            <div class="register_wrap tab-content">

                                <div class="tab-pane fade show active" id="signin_tab" role="tabpanel">
                                    @if (session('registersuccess'))
                                    <div class="alert alert-info" role="alert">
                                      {{ session('registersuccess') }}
                                      </div>

                                    @endif
                                    @if (session('notregistered'))
                                    <div class="alert alert-info" role="alert">
                                      {{ session('notregistered') }}
                                      </div>

                                    @endif
                                    @if (session('notverified'))
                                    <div class="alert alert-warning" role="alert">
                                      {{ session('notverified') }}
                                      </div>

                                    @endif
                                    <form action="{{ route('post.signin') }}" method="POST">
                                        @csrf
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Email*</h3>
                                            <div class="form_item">
                                                <label for="username_input"><i class="fas fa-envelope"></i></label>
                                                <input id="username_input" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                                                @error('email')
                                                <div class="alert alert-warning" role="alert">
                                                    {{ $message }}
                                                  </div>

                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Password*</h3>
                                            <div class="form_item">
                                                <label for="password_input"><i class="fas fa-lock"></i></label>
                                                <input id="password_input" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                                                @error('password')
                                                <div class="alert alert-warning" role="alert">
                                                    {{ $message }}
                                                  </div>

                                                @enderror
                                            </div>


                                                <div class="checkbox_item d-inline-flex" style="width: 100%">
                                                    <div class="div"  style="width: 50%">
                                                        <input id="remember_checkbox" type="checkbox">
                                                    <label for="remember_checkbox">Remember Me</label>
                                                    </div>
                                                    <div class="div" style="width: 50%"><a class="text-right" style="width: 100%; text-align:right" href="{{ route('password.forgot') }}">Forgot Password?</a></div>


                                                </div>

                                        </div>

                                        <div class="form_item_wrap p-0 text-center">
                                            <button type="submit" class="btn btn_primary">Sign In</button>
                                        </div>


                                    </form>
                                    <div class="form_item_wrap p-0 text-center">
                                    <div class="login_with_social text-center">
                                        <h6 class="m-3">OR SIGN IN WITH YOUR SOCIAL MEDIA ACCOUNT</h6>
                                        <div class="login_with_social_item text-center">
                                            <ul style="list-style-type: none; display:flex; justify-content:center; margin:0; padding:0;">
                                                <li style="margin: 0 5px;"><a href="#"><i style="font-size: 35px; color: #4267B2" class="fab fa-facebook-square"></i></a></li>
                                                <li style="margin: 0 5px;"><a href="#"><i style="font-size: 35px; color: #DB4437;" class="fab fa-google-plus-square"></i></a></li>
                                                <li style="margin: 0 5px;"><a href="{{ route('redirect.to.provider') }}"><i style="font-size: 35px; color: #171515;" class="fab fa-github-square"></i></a></li>
                                            </ul>

                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="signup_tab" role="tabpanel">
                                    <form action="{{ route('customer.register') }}" method="POST">
                                        @csrf
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Name*</h3>
                                            <div class="form_item">
                                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                                <input id="username_input2" type="text" name="name" placeholder="Name" value="{{ old ('name') }}">
                                                @error('name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                   </span>
                                                   @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Email*</h3>
                                            <div class="form_item">
                                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                                <input id="email_input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                                @error('email')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                   </span>
                                                   @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Password*</h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input id="password_input2" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                                                @error('password')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                   </span>
                                                   @enderror
                                            </div>
                                        </div>
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Confirm password*</h3>
                                            <div class="form_item">
                                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                                <input id="password_input2" type="password" name="cpassword" placeholder="Confirm Password" value="{{ old('cpassword') }}">
                                                @error('cpassword')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                   </span>
                                                   @enderror
                                            </div>
                                        </div>



                                        <div class="form_item_wrap">
                                            <button type="submit" class="btn btn_secondary">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- register_section - end
            ================================================== -->
@endsection
