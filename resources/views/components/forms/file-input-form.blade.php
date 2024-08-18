<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">{{ $title ?? 'File Input' }}</h6>
    <form method="{{ $method ?? 'POST' }}" action="{{ $action ?? '#' }}" enctype="multipart/form-data">
        @csrf
        {{ $slot }}
        <button type="submit" class="btn btn-primary">{{ $buttonText ?? 'Upload' }}</button>
    </form>
</div>


{{-- usage --}}

{{-- <x-forms.file-input-form title="Upload File" action="{{ route('file.upload') }}" method="POST" buttonText="Upload">
    <div class="mb-3">
        <label for="formFile" class="form-label">Choose file</label>
        <input class="form-control" type="file" id="formFile" name="file">
    </div>
</x-forms.file-input-form> --}}
