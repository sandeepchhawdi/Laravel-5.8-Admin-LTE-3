<div class="box-body">
    <div class="form-group">
        <label for="name">Name<span class="red-color">*</span></label>
        {{ Form::text('name', Old('name'), array("class" => "form-control ".$errors->first('name', 'is-invalid'), "id" => "name", "placeholder" => "Enter User Name")) }}
        @error('name')
            <label class="control-label red-color" for="inputError"><i class="far fa-times-circle"></i>{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email ID<span class="red-color">*</span></label>
        {{ Form::text('email', Old('email'), array("class" => "form-control ".$errors->first('email', 'is-invalid'), "id" => "email", "placeholder" => "Enter User Email ID")) }}
        @error('email')
            <label class="control-label red-color" for="inputError"><i class="far fa-times-circle"></i>{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="roles">Roles</label>
        {{ Form::select('roles[]', $roles, Old('roles', $assigned_roles), array('class' => "form-control select2", 'multiple' => 'multiple')) }}
    </div>
    @if(empty($user) || auth()->user()->id == $user->id)
    <div class="form-group">
        <label for="password">Password<span class="red-color">@if(empty($user))*@endif</span></label>
        {{ Form::input('password', 'password', '', array("class" => "form-control ".$errors->first('password', 'is-invalid'), "id" => "password", "placeholder" => "Enter Password")) }}
        @error('password')
            <label class="control-label red-color" for="inputError"><i class="far fa-times-circle"></i>{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password<span class="red-color">@if(empty($user))*@endif</span></label>
        {{ Form::input('password', 'password_confirmation', '', array("class" => "form-control ".$errors->first('password_confirmation', 'is-invalid'), "id" => "password_confirmation", "placeholder" => "Enter Password Again")) }}
        @error('password_confirmation')
            <label class="control-label red-color" for="inputError"><i class="far fa-times-circle"></i>{{ $message }}</label>
        @enderror
    </div>
    @endif
</div>
<!-- /.box-body -->
<div class="box-footer">
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Back</a>
    @canany(['create', 'update'], App\User::class)
    <button type="submit" class="btn btn-primary">Save</button>
    @endcanany
</div>