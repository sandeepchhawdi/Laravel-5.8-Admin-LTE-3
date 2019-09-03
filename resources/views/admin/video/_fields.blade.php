<div class="box-body">
    <div class="form-group">
        <label for="title">Video Title<span class="red-color">*</span></label>
        {{ Form::text('title', Old('title'), array("class" => "form-control ".$errors->first('title', 'is-invalid'), "id" => "title", "placeholder" => "Enter Video Title")) }}
        @error('title')
            <label class="control-label red-color" for="inputError"><i class="far fa-times-circle"></i>{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group">
        <label for="published">Status</label>
        {{ Form::select('published', array(            
            '1' => 'Publish',
            '0' => 'Draft',
        ), Old('published'), array('class' => "form-control")) }}
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <a href="{{ route('admin.videos.index') }}" class="btn btn-default">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>