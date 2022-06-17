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
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="true">Reset Password</button>
                                </li>

                            </ul>

                            <div class="register_wrap tab-content">
                                @if (session('sent_rest_email'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{ session('sent_rest_email') }}
                                  </div>

                                @endif

                                <div class="tab-pane fade show active" id="signin_tab" role="tabpanel">
                                    <form action="{{ route('customer.reset.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="reset_token" value="{{ $reset_token }}">
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
                                                <input id="password_input2" type="password" name="Confirm_Password" placeholder="Confirm Password" value="{{ old('Confirm_Password') }}">
                                                @error('Confirm_Password')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                   </span>
                                                   @enderror
                                            </div>
                                        </div>

                                        <div class="form_item_wrap text-center p-0">
                                            <button type="submit" class="btn btn_primary">Reset Password</button>
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




