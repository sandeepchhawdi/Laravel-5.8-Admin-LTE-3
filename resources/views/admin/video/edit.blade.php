@extends('layouts.admin_lte')
@section('content-header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Edit Video Details</h1>
  </div>
</div><!-- /.row -->
@endsection
@section('content')
<div class="box box-primary">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <!-- form start -->
                    {{ Form::model($video, array('route' => ['admin.videos.update', $video->id], 'method' => 'put')) }}
                        @include('admin.video._fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection