@extends('layouts.admin')
@section('content')
<style>
    .roles-menu ul li:first-child a {
        border-color: #fbbe32;
        color: #fbbe32;

    }
</style>
<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Role Permission Names</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_role"><i class="fa fa-plus"></i> Add Permission Name</a>
                <div class="roles-menu">
                    <ul>
                        @foreach ($role_permission_names as $role_permission_name)

                        <li>
                            <a href="javascript:void(0);">{{ $role_permission_name->name }}
                                <span class="role-action">
                                    <span class="action-circle large" style="line-height: 24px" data-toggle="modal" data-target="#edit_role">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <span class="action-circle large delete-btn" style="line-height: 24px" data-toggle="modal" data-target="#delete_role">
                                        <i class="fa fa-trash-o"></i>
                                    </span>
                                </span>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                <h6 class="card-title m-b-20">Module Access</h6>
                <div class="m-b-30">
                    <ul class="list-group notification-list">
                        <li class="list-group-item">
                            Employee
                            <div class="status-toggle">
                                <input type="checkbox" id="staff_module" class="check">
                                <label for="staff_module" class="checktoggle">checkbox</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Holidays
                            <div class="status-toggle">
                                <input type="checkbox" id="holidays_module" class="check" checked>
                                <label for="holidays_module" class="checktoggle">checkbox</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Leaves
                            <div class="status-toggle">
                                <input type="checkbox" id="leave_module" class="check" checked>
                                <label for="leave_module" class="checktoggle">checkbox</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Events
                            <div class="status-toggle">
                                <input type="checkbox" id="events_module" class="check" checked>
                                <label for="events_module" class="checktoggle">checkbox</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Chat
                            <div class="status-toggle">
                                <input type="checkbox" id="chat_module" class="check" checked>
                                <label for="chat_module" class="checktoggle">checkbox</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Jobs
                            <div class="status-toggle">
                                <input type="checkbox" id="job_module" class="check">
                                <label for="job_module" class="checktoggle">checkbox</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>Module Permission</th>
                                <th class="text-center">Read</th>
                                <th class="text-center">Write</th>
                                <th class="text-center">Create</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">Import</th>
                                <th class="text-center">Export</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Employee</td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                            </tr>
                            <tr>
                                <td>Holidays</td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                            </tr>
                            <tr>
                                <td>Leaves</td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                            </tr>
                            <tr>
                                <td>Events</td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Role Modal -->
    <div id="add_role" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('role.permission.name.add') }}">
                        @csrf
                        <div class="form-group">
                            <label>Permission Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Role Modal -->

    <!-- Edit Role Modal -->
    <div id="edit_role" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Role Name <span class="text-danger">*</span></label>
                            <input class="form-control" value="Team Leader" type="text">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Role Modal -->

    <!-- Delete Role Modal -->
    <div class="modal custom-modal fade" id="delete_role" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Role</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Role Modal -->

    </div>
<!-- /Page Wrapper -->
@endsection
@section('footer_script')
@if (session('add_role_name'))
    <script>
        Swal.fire(
        'Good job!',
        '{{ session('add_role_name') }}',
        'success'
    )
    </script>
@endif
@endsection
