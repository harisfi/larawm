{{-- info modal --}}
@if (session('flash'))
    <div class="modal fade" id="infModal" tabindex="-1" aria-labelledby="infModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infModalLabel">
                        {{ session('flash')['error'] ? 'Error' : 'Success' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('flash')['msg'] }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const infModal = new bootstrap.Modal('#infModal');
            infModal.show()
        </script>
    @endpush
@endif

{{-- delete modal --}}
<div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="del_modal" method="POST" class="modal-content">
            @method('DELETE')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="delModalLabel">
                    Delete Item?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        const delModal = new bootstrap.Modal('#delModal');
        function deleteItem(action) {
            let form = document.getElementById('del_modal');
            form.action = action;
            delModal.show();
        }
    </script>
@endpush