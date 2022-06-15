@extends('layouts.admin')
@section('content')



	<!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Navigation Bar</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Navigation Bar</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn mx-2" data-toggle="modal" data-target="#add_menu"><i class="fa fa-plus"></i> Add Menu</a>
                        <a href="#" class="btn add-btn mx-2" data-toggle="modal" data-target="#add_logo"><i class="fa fa-plus"></i> Add Logo</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Menu Name </th>
                                    <th>Sub-Menu Name</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Hardware</td>
                                    <td>Hardware Expenses</td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i  class="material-icons fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_menu"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deletemenu"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                <a class="dropdown-item" href="{{ route('submenu') }}" ><i class="fa fa-object-ungroup m-r-5"></i> Sub-Menu </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>


                                    <td width="100"> <a href="profile.html" ><img src="{{ asset('frontend_assets/images/slider/slide-1.jpg') }}" style="width: 100%" alt=""></a></td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i  class="material-icons fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_logo"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deletelogo"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                <a class="dropdown-item" href="{{ route('subcategory') }}" ><i class="fa fa-object-ungroup m-r-5"></i> Sub-Category </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

        <!-- Add logo start here Modal -->
        <div class="modal custom-modal fade" id="add_logo" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Logo <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="logo">
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Add Logo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add logo end here Modal -->
           <!-- Delete menu start here Modal -->
           <div class="modal custom-modal fade" id="deletemenu" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete </h3>
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
        <!-- /Delete menu end here Modal -->
           <!-- Delete logo start here Modal -->
           <div class="modal custom-modal fade" id="deletelogo" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete </h3>
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
        <!-- /Delete logo end here Modal -->
        <!-- Add Holiday Modal -->
        <div class="modal custom-modal fade" id="add_menu" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Menu Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name">
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Add Menu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Holiday Modal -->

        <!-- Edit Menu Modal start here -->
        <div class="modal custom-modal fade" id="edit_categories" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Menu Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="Hardware">
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Update Menu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Menu Modal end here -->

        <!-- Edit logo Modal start here -->
        <div class="modal custom-modal fade" id="edit_logo" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Logo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Logo <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="logo" >
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Update Logo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit logo Modal end here -->
    </div>
    <!-- /Page Wrapper -->

@endsection
