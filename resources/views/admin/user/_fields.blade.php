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
</div>
<!-- /.box-body -->
<div class="box-footer">
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Back</a>
    @canany(['create', 'update'], App\User::class)
    <button type="submit" class="btn btn-primary">Save</button>
    @endcanany
</div>