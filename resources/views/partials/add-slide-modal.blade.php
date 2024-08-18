<!-- add-slide-modal.blade.php -->

<div class="modal fade" id="addSlideModal" tabindex="-1" aria-labelledby="addSlideModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSlideModalLabel">Add New Slide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('carousel.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('POST') --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="button_text" class="form-label">Button Text</label>
                        <input type="text" class="form-control" id="button_text" name="button_text">
                    </div>
                    <div class="mb-3">
                        <label for="button_url" class="form-label">Button URL</label>
                        <input type="text" class="form-control" id="button_url" name="button_url">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Choose Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Slide</button>
                </form>
            </div>
        </div>
    </div>
</div>
