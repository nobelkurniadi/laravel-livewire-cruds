  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="deleteModalLabel">Delete Confirm</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure want to delete "{{ $name }}"? </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" wire:click.prevent="delete()" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger">Yes, Delete</button>
        </div>
      </div>
    </div>
  </div>