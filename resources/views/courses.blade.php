@extends('app')

@section('title', 'Dashboard')

@section('content')

    <div class="bg-gray-100 min-h-screen">
        
        @include('partials.dashboard-header')

        @if(auth()->user()->onTrial())
            <div class="container rounded-lg mx-auto mt-8">
                @include('partials.trial_notification', ['action_btn' => true])
            </div>
        @endif

        <div class="flex container mx-auto">
            
            @include('partials.dashboard-nav')

            <div class="w-full bg-white rounded-lg mx-auto my-8 px-10 py-8">
                <h1 class="text-2xl font-medium mb-2">Courses</h1>
                <h2 class="font-medium text-sm text-gray-500 mb-4 uppercase tracking-wide"></h2>

                @foreach (auth()->user()->courses as $course)
                    <div class="border border-gray-400 px-3 py-2 rounded-lg flex justify-between">
                        <span class="font-bold text-gray-700">{{ $course->name }}</span>
                        <a href="{{ str_replace('https://', 'https://' . $course->subdomain . '.' , url('/')) }}" target="_blank" class="text-green-600 font-semibold text-sm">Preview</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection