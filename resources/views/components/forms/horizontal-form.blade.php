<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">{{ $title ?? 'Horizontal Form' }}</h6>
    <form method="{{ $method ?? 'POST' }}" action="{{ $action ?? '#' }}">
        @csrf
        {{ $slot }}
        <button type="submit" class="btn btn-primary">{{ $buttonText ?? 'Submit' }}</button>
    </form>
</div>


{{-- usage  --}}

{{-- 
<x-forms.horizontal-form title="Registration Form" action="{{ route('register') }}" method="POST" buttonText="Sign up">
    <div class="row mb-3">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail" name="email">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
    </div>
</x-forms.horizontal-form> --}}
