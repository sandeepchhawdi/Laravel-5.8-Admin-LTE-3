@can('view', $model)                                
<a href="{{ route('admin.'.$route.'.show', $model->id) }}" class="btn btn-default btn-flat icon-padding"><i class="fa fa-eye"></i></a>
@endcan
@can('update', $model)
<a href="{{ route('admin.'.$route.'.edit', $model->id) }}" class="btn btn-default btn-flat icon-padding"><i class="fa fa-pencil-alt"></i></a>
@endcan
@can('delete', $model)
<a href="javascript:void(0)" data-url="{{ route('admin.'.$route.'.destroy', $model->id) }}" class="btn btn-default btn-flat icon-padding btn-delete"><i class="fa fa-trash-alt"></i></a>
@endcan