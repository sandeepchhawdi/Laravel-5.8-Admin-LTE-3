@extends('layouts.admin_lte')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Users List</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      @can('create', App\User::class)
      <li class="breadcrumb-item"><a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add User</a></li>
      @endcan
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
                <table id="users" class="table table-bordered table-striped datatable-list">
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
@can('delete', App\User::class)
@include('admin.common._delete_item')
@endcan
@endsection
@section('script')
<script>
    var datatable_var;
    $(function () {
        datatable_var = $('#users').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.users.list') }}",
            "columns": [
                { "data": "name" },
                { "data": "email" },
                { "data": "created_at" },
                { "data": "id", orderable: false, searchable: false }
            ]
        });
    });
</script>
@endsection