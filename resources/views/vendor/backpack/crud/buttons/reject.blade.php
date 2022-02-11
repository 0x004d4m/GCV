@if($entry->balance_status_id == 1)
<a href="javascript:void(0)" onclick="rejectEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-danger" data-button-type="reject"><i class="la la-close"></i>Reject</a>
@endif

@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>
    function rejectEntry(id) {
        $("[data-button-type=reject]").unbind('click');
        swal({
            title: "{!! trans('backpack::base.warning') !!}",
            text: "Are you sure you want to reject this request?",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: true,
        }).then((value) => {
            if (value) {
                $.ajax({
                    url: "{{ url($crud->route.'/reject') }}"+"/"+id,
                    type: 'PUT',
                    success: function(result) {
                        new Noty({
                            type: "success",
                            text: "<strong>Item Rejected</strong><br>The item has been rejected successfully."
                        }).show();
                        $('.modal').modal('hide');
                        crud.table.draw(false);
                    },
                    error: function(result) {
                        swal({
                        title: "NOT deleted",
                        text: "There's been an error. Your item might not have been rejected.",
                        icon: "error",
                        timer: 4000,
                        buttons: false,
                        });
                        crud.table.draw(false);
                    }
                });
            }
        });
    }
</script>
@if (!request()->ajax()) @endpush @endif
