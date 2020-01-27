@extends('app')

@section('title', $announcement->title)

@section('content')

    <div class="bg-gray-100 min-h-screen">
        
        @include('partials.dashboard-header')

        <div class="max-w-3xl mx-auto pt-8">
            <h1 class="text-2xl font-medium mb-2">{{ $announcement->title }}</h1>

            <a href="{{ route('announcements') }}" class="text-orange-600 p-2 rounded text-sm text-white">< Back</a>

            <div class="rounded-lg w-full px-8 py-6 bg-white mt-4">
                <p>{!! $announcement->body !!}</p>
            </div>
        </div>
    </div>
@endsection