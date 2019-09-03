{{ Form::open(array('route' => 'admin.videos.store', 'method' => 'delete', 'id' => 'item-delete-form')) }}

{{ Form::close() }}

<script type="text/javascript">
	$('body').on('click', '.btn-delete', function (e) {
	// $('.datatable .btn-delete').click(function(e){
		e.preventDefault();
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {		  
		  if (result.value) {
		  	$('#item-delete-form').attr('action', $(this).data('url'));
		  	$("#item-delete-form").submit();   
		  }
		});
	});

	$("#item-delete-form").on('submit', function(event){
		event.preventDefault(); //prevent default action 
		var post_url = $(this).attr("action"); //get form action url
		var request_method = $(this).attr("method"); //get form GET/POST method
		var form_data = $(this).serialize(); //Encode form elements for submission
		$.ajax({
			url : post_url,
			type: request_method,
			data : form_data
		}).done(function(response){
			console.log(response);
			Swal.fire(
		      'Deleted!',
		      'Your file has been deleted.',
		      'success'
		    );

		    datatable_var.ajax.reload(null, false );
		});
	});		
</script>