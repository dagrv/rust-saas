@extends('app')

@section('title', $page->title)

@section('content')

    @include('partials.nav')

    {{-- Privacy Page ex: privacy.blade.php --}}

    <div class="container mx-auto lg:max-w-4xl px-5 pt-32 mb-12">
        <div class="bg-white px-8 py-6 border-t-4 border-orange-500 border-b-8 border-orange-500 page">
            
            {!! $page->body !!}
        
        </div>
    </div>

    @include('partials.footer')

@endsection