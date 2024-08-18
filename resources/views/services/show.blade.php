@extends('layouts.main')

@section('title', $service->title)

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem; background-image: url('{{ asset($service->image) }}'); background-size: cover; background-position: center;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $service->title }}</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <blockquote class="blockquote blockquote-custom bg-white px-3 pt-4">
                    <div class="blockquote-custom-icon bg-info shadow-1-strong">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                    {{-- <p class="mb-0 mt-2 font-italic text-dark">
                        {!! $service->content !!}
                    </p> --}}
                    {!! $service->content !!}
                    
                    
                </blockquote>
            </div>
        </div>
    </div>
@endsection
