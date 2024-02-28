@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student Fee Amount List</h3>
                                <a href="{{ route('fee.amount.add') }}" style="float: right" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr >
                                            <th>SL</th>
                                            <th>Fee Category</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($allData as $key => $amount)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $amount['fee_category']['name'] }}</td>
                                                <td>
                                                    <a href="{{ route('fee.amount.edit', $amount->fee_category_id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                                    <a href="{{ route('fee.amount.details', $amount->fee_category_id) }}" class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i> </a>
                                                    <a href="{{ route('fee.amount.delete',$amount->fee_category_id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Fee Category</th>
                                            <th>Action</th>
                                        </tr>
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
