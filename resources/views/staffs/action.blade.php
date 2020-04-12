<div class="btn-group">
    @if($staff->active)
        <a href="{{ route('staffs.ban', $staff->id) }}" class="btn btn-outline-success btn-sm custom-action"><i class="fa fa-ban"></i></a>
    @else
        <a href="{{ route('staffs.active', $staff->id) }}" class="btn btn-outline-secondary btn-sm custom-action"><i class="fa fa-ban"></i></a>
    @endif
    <a href="{{ route('staffs.show', $staff->id) }}" class="btn btn-outline-info btn-sm custom-action"><i class="fa fa-list-alt"></i></a>
    <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-outline-primary btn-sm custom-action"><i class="fa fa-edit"></i></a>
    <button onclick="delete_data('{{ $staff->id }}')" class="btn btn-outline-danger btn-sm custom-action" id="delete-btn"><i class="fa fa-trash"></i></button>
</div>

<form action="{{ route('staffs.destroy', $staff->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $staff->id }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>

<script type="text/javascript">
    function delete_data(id){
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                document.getElementById('delete-form-'+id).submit();
            }
        })
    }
</script>