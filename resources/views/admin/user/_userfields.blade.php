<div class="box-body">
    <div class="form-group">
        <label for="display_name">Display Name<span class="error">*</span></label><small> (The Name to be displayed to users in chat) </small>
        {{ Form::text('name', Old('name'), array("class" => "form-control", "id" => "name", "placeholder" => "Enter Display Name")) }}
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="image_url">Display Pic URL (optional)</label><small> (Display profile pic) </small>
        {{ Form::text('image_url', Old('image_url'), array("class" => "form-control", "id" => "image_url", "placeholder" => "Enter The Image URL")) }}
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <a href="{{ route('admin.video.list') }}" class="btn btn-default">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>