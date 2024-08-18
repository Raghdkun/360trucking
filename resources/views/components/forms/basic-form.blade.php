<div class="bg-light rounded h-100 p-4">
    <h6 class="mb-4">{{ $title ?? 'Basic Form' }}</h6>
    <form method="{{ $method ?? 'POST' }}" action="{{ $action ?? '#' }}">
        @csrf
        {{ $slot }}
        <button type="submit" class="btn btn-primary">{{ $buttonText ?? 'Submit' }}</button>
    </form>
</div>
 

{{-- usage --}}

{{-- <x-forms.basic-form title="Login Form" action="{{ route('login') }}" method="POST" buttonText="Sign in">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Remember me</label>
    </div>
</x-forms.basic-form> --}}
