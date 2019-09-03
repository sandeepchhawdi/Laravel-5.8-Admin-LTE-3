@extends('layouts.admin_lte')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Videos List</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin.videos.create') }}" class="btn btn-primary">Add Video</a></li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Sub heading If any?</h3>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
                <table id="videos" class="table table-bordered table-striped datatable-list">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->  
@include('admin.common._delete_item')    
@endsection
@section('script')
<script>
    var datatable_var;
    $(function () {
        datatable_var = $('#videos').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.videos.list') }}",
            "columns": [
                { "data": "title" },
                { "data": "published" },
                { "data": "created_at" },
                { "data": "id", orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection