@extends('admin.admin_master')
@section('admin')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update User</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{ route('user.update', $editData->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6" >
                                                    <div class="form-group">
                                                        <h5>User Role <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="role"  required="" class="form-control">
                                                                <option value="" selected="" disabled="">Select Role</option>
                                                                <option value="Admin" {{ ($editData->role == "Admin" ? "selected": "") }}  >Admin</option>
                                                                <option value="Operator" {{ ($editData->role == "Operator" ? "selected": "") }} >Operator</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6" >
                                                    <div class="form-group">
                                                        <h5>User Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" value="{{ $editData->name }}" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div><!-- End Col Md-6 -->
                                            </div> <!-- End Row -->



                                            <div class="row">
                                                <div class="col-md-6" >
                                                    <div class="form-group">
                                                        <h5>User Email <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" value="{{ $editData->email }}" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div> <!-- End Col Md-6 -->

                                                <div class="col-md-6" >

                                                </div> <!-- End Col Md-6 -->
                                            </div> <!-- End Row -->

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                                            </div>
                                        </div>
                                    </div> <!-- End Row -->
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>

@endsection
