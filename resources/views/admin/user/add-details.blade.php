@extends('layouts.admin_lte')
@section('content')
<div class="box box-primary">
    <div class="row">
        <div class="col-md-6"> 
            @if(!empty($user))
                <!-- form start -->
                {{ Form::model($user, array('route' => 'admin.user.save-details', 'method' => 'post')) }}
                    @include('admin.user._userfields')
                {{ Form::close() }}
            @endif    
        </div>
    </div>
</div>
@endsection