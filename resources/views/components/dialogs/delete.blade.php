@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<script>
    for (let i = 0, buttons_length = $('.table-action-delete, .delete-action').length, buttons = $('.table-action-delete, .delete-action'); i < buttons_length; i++) {
    	$(buttons[i]).on('click', function(e) {
			e.preventDefault();
    		swal({
     			title: "{{ $title ?? __('main.confirm_deletion') }}",
     			text: "{{ $description ?? __('main.are_you_sure') }}",
     			type: "warning",
     			showCancelButton: true,
     			confirmButtonColor: "#DD6B55",
     			confirmButtonText: "{{ $confirm ?? __('main.confirm') }}",
     			cancelButtonText: "@lang('admin.cancel')",
    		}).then((button) => {
     			if (button.value === true) {
    				swal("@lang('main.processing')", "@lang('main.please_wait')", "success");
					$($(buttons[i]).attr('data-form-id') || buttons[i].parentNode).submit();
				}
			});
    	});
    };
</script>
@endsection