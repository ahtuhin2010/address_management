@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Upazila</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Upazila</li>
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
                            <h3>
                                @if (@$editData)
                                Edit Upazila
                                @else
                                Add Upazila
                                @endif
                                <a class="btn btn-success float-right btn-sm" href="{{ route('upazilas.view') }}"><i class="fa fa-list"></i> Upazila List</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ (@$editData)?route('upazilas.update', $editData->id):route('upazilas.store') }}" id="myForm">
                                @csrf

                                <div class="form row">
                                    <div class="form-group col-md-6">
                                        <label>Division Name</label>
                                        <select name="division_id" class="form-control" id="division_id">
                                            <Option value="">Select Division</Option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}" {{ (@$editData->division_id == $division->id)?"selected":"" }}>{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>District Name</label>
                                        <select name="district_id" class="form-control" id="district_id">
                                            <option value="">Select District</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Upazila Name</label>
                                        <input type="text" name="name" value="{{ @$editData->name }}" class="form-control" placeholder="Write Upazila Name">
                                        <font style="color: red">{{ ($errors->has('name'))?($errors->first('name')):'' }}</font>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">{{ (@$editData)?"Update":"Submit" }}</button>
                                    </div>

                                </div>
                            </form>
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


<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                division_id: {
                    required: true,
                },
                district_id: {
                    required: true,
                },
                name: {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change','#division_id',function(){
            var division_id = $(this).val();
            $.ajax({
                type:"GET",
                url: "{{ route('default.get-district') }}",
                data:{division_id:division_id},
                success:function(data){
                    var html = '<option value=""> Select District</option>';
                    $.each(data,function(key,v){
                        html += '<option value="'+v.id+'">'+v.name+'</option>';
                    });
                    $('#district_id').html(html);
                    var district_id = "{{ @$editData->district_id }}";
                    if (district_id !='') {
                        $('#district_id').val(district_id);
                    }
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(function(){
        var division_id = "{{ @$editData->division_id }}";
        if(division_id){
            $('#division_id').val(division_id).trigger('change');
        }
    });
</script>

@endsection
