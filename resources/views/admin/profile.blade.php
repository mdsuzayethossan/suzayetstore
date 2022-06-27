@extends('layouts.admin')
@section('content')
<!-- Main Wrapper -->
<div class="main-wrapper">


    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card mb-0" style="width: 500px; height: 320px; text-align: center;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile">
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                    <div class="profile_image">
                                        <a href="#"><img style="width: 180px; height: 180px; border-radius: 50%; border: 2px solid #fbbe32; margin-bottom: 20px;" alt="" src="{{ asset('uploads/users') }}/{{ Auth::user()->photo }}"></a>
                                    </div>
                                <div class="profile">
                                    <h3 class="user-name m-t-0 mb-0">{{ Auth::user()->name }}</h3>
                                    <div class="staff-id">Email : {{ Auth::user()->email }}</div>
                                    <div class="small doj text-muted mt-1">Date of Join : {{ Auth::user()->created_at->format('M d Y') }}</div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>




        <!-- Profile Modal -->
        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block" src="{{ asset('uploads/users') }}/{{ Auth::user()->photo }}" alt="user">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file" name="photo">
                                            @error('photo')
                                            <div class="alert alert-warning" role="alert">
                                                {{ $message }}
                                            </div>

                                          @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                              @error('name')
                                                <div class="alert alert-warning" role="alert">
                                                    {{ $message }}
                                                </div>

                                              @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                    <input class="form-control" type="email" readonly value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                    <input class="form-control" type="password" name="Old_Password">
                                                    @error('Old_Password')
                                                        <div class="alert alert-warning" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if (session('old_pass_not_match'))
                                                    <div class="alert alert-warning" role="alert">
                                                        {{ session('old_pass_not_match') }}
                                                      </div>

                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                    <input class="form-control" type="password" name="password">
                                                    @error('password')
                                                        <div class="alert alert-warning" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                    <input class="form-control" type="password" name="password_confirmation">
                                                     @error('password_confirmation')
                                                        <div class="alert alert-warning" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Modal -->

    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
@endsection
@section('footer_script')
    @if (session('update_profile'))
    <script>
        Swal.fire(
            'Good job!',
            '{{ session('update_profile') }}',
            'success'
            )
    </script>
    @endif
    @if (session('pass_up_error'))
    <script>
        Swal.fire(
            'Oops...',
            '{{ session('pass_up_error') }}',
            'error'
            )
    </script>
    @endif
    @if (session('old_pass_not_match'))
    <script>
        Swal.fire(
            'Oops...',
            '{{ session('old_pass_not_match') }}',
            'error'
            )
    </script>
    @endif
@endsection
