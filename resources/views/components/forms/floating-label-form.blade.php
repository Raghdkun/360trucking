<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">{{ $title ?? 'Floating Label Form' }}</h6>
    <form method="{{ $method ?? 'POST' }}" action="{{ $action ?? '#' }}">
        @csrf
        {{ $slot }}
        <button type="submit" class="btn btn-primary">{{ $buttonText ?? 'Submit' }}</button>
    </form>
</div>


{{-- usage --}}

{{-- <x-forms.floating-label-form title="Contact Form" action="{{ route('contact.submit') }}" method="POST" buttonText="Send">
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
    </div>
</x-forms.floating-label-form> --}}
