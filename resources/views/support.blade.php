@extends('app')

@section('title', 'Support')

@section('content')

    <div class="bg-gray-100 min-h-screen">
        
        @include('partials.dashboard-header')

        <div class="max-w-3xl bg-white rounded-lg mx-auto my-16 p-16">
                <h1 class="text-2xl font-medium mb-2">Support</h1>
                <p>If you want to get support, please leave us a message, we'll reply as soon as possible to your support inquiry</p>

            <form action="{{ route('support.send') }}" method="POST" class="clearfix">
                
                @csrf

                <input type="text" name="subject" placeholder="Subject" class="mt-4 border-2 border-gray-300 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" value="{{ old('subject') }}">
                <textarea name="message" cols="30" rows="10" class="mt-2 border-2 border-gray-300 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" placeholder="How can we help ?">{{ old('message') }}</textarea>
                <button class="align-center bg-green-400 w-full mt-6 p-2 rounded-lg font-medium text-white">Send</button>
            </form>
        </div>
    </div>
@endsection