<div {{ $attributes->merge(['class' => 'modal fade text-left animated slideInDown']) }} id="confirmDeleteModal"
    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel">{{ __('dashboard.delete_confirmation_title') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('assets/dashboard/images/svg/confirm-delete.svg') }}" alt="confirm delete" />
                <div class="modal-message  mt-2 font-weight-bold">{{ __('dashboard.delete_confirmation_content') }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('dashboard.close') }}</button>
                <form id="deleteForm" class="d-inline-block flex-grow-1" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">{{ __('dashboard.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
