@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Ward</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Ward</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3>Ward List
                                <a class="btn btn-success float-right btn-sm" href="{{ route('wards.add') }}"><i class="fa fa-plus-circle"></i> Add Ward</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Upazila</th>
                                        <th>Union</th>
                                        <th>Ward No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allData as $key => $ward)
                                    <tr class="{{ $ward->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $ward['division']['name'] }}</td>
                                        <td>{{ $ward['district']['name'] }}</td>
                                        <td>{{ $ward['upazila']['name'] }}</td>
                                        <td>{{ $ward['union']['name'] }}</td>
                                        <td>{{ $ward->ward_no }}</td>
                                        <td>
                                            <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('wards.edit', $ward->id) }}"><i class="fa fa-edit"></i></a>
                                            <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('wards.delete') }}" data-token="{{csrf_token()}}" data-id="{{ $ward->id }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
