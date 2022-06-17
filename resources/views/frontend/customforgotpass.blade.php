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
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#signin_tab" type="button" role="tab" aria-controls="signin_tab" aria-selected="true">Enter your email to get a password reset link</button>
                                </li>

                            </ul>

                            <div class="register_wrap tab-content">
                                @if (session('sent_rest_email'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{ session('sent_rest_email') }}
                                  </div>

                                @endif

                                <div class="tab-pane fade show active" id="signin_tab" role="tabpanel">
                                    <form action="{{ route('customer.forgot.email') }}" method="POST">
                                        @csrf
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Email Address*</h3>
                                            <div class="form_item">
                                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                                <input id="email_input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                            </div>

                                        </div>

                                        <div class="form_item_wrap text-center p-0">
                                            <button type="submit" class="btn btn_primary">Send</button>
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
