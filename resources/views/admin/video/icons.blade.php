@can('modify video')                                
<a href="{{ route('admin.videos.show', $video->id) }}" class="btn btn-default btn-flat icon-padding"><i class="fa fa-eye"></i></a>
<a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-default btn-flat icon-padding"><i class="fa fa-pencil-alt"></i></a>
<a href="javascript:void(0)" data-url="{{ route('admin.videos.destroy', $video->id) }}" class="btn btn-default btn-flat icon-padding btn-delete"><i class="fa fa-trash-alt"></i></a>
@endcan