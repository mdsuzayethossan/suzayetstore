@extends('master')
@section('content')
        <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- account_section - start
            ================================================== -->
            <section class="account_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 account_menu">
                            <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Account Dashboard </button>
                                <button class="nav-link text-start w-100" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Acount</button>
                                <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            @if (session('cus_pass_update'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('cus_pass_update') }}
                                  </div>

                                @endif
                            @if (session('cus_name_update'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('cus_name_update') }}
                                  </div>

                                @endif
                            <div class="tab-content bg-light p-3" id="v-pills-tabContent">

                                <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h5>Welcome to Account</h5>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h5 class="text-center pb-3">Account Details</h5>
                                    <form class="row g-3 p-2" action="{{ route('customer.update') }}" method="POST">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="inputnamel4" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="inputnamel4" value="{{ Auth('customerauth')->user()->name }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input readonly type="email" class="form-control" id="inputEmail4" value="{{ Auth('customerauth')->user()->email }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label">Old Password</label>
                                            <input type="password" name="old_password" class="form-control" id="inputPassword4" value="{{ old('old_password') }}">
                                          @if (session('not_match_ol_pass'))
                                          <span class="text-danger">
                                            {{ session('not_match_ol_pass') }}

                                        </span>

                                          @endif

                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label">New Password</label>
                                            <input type="password" name="password" class="form-control" id="inputPassword4" value="{{ old('password') }}">
                                            @error('password')
                                            <span class="text-danger">@error(
                                                'password'){{ $message }}

                                               @enderror
                                            </span>

                                        @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputPassword4" class="form-label">Confirm Password</label>
                                            <input type="password" name="Confirm-Password" class="form-control" id="inputPassword4" value="{{ old('Confirm-Password') }}">
                                            @error('Confirm-Password')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>

                                        @enderror
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary active">Update</button>
                                        </div>
                                     </form>
                                    </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h5 class="text-center pb-3">Your Orders</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>SL</th>
                                            <th>Order No</th>
                                            <th>Sub Total</th>
                                            <th>Discount</th>
                                            <th>Delivery Charge</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>#120</td>
                                            <td>52500</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>52400</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Download Invoice</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
    <!-- account_section - end
    ================================================== -->
@endsection
