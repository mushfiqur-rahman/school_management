@extends('admin.admin_master')
@section('admin')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">



                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Designation List</h3>
                                <a href="{{ route('designation.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Designation</a>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $designation )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $designation->name }}</td>
                                                <td>
                                                    <a href="{{ route('designation.edit',$designation->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('designation.delete',$designation->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>

                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>





@endsection
