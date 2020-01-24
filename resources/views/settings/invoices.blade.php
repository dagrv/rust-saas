@extends('app')

@section('title', 'Invoices')

@section('content')
    <div class="bg-gray-100 min-h-screen pb-24">
        
        @include('partials.dashboard-header')

        <div class="container mx-auto max-w-3xl mt-8">
            <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Security Settings</h1>
            
            @include('settings.nav')
    
                @csrf

                <div class="w-full bg-white rounded-lg mx-auto mt-8 flex overflow-hidden">
                    <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
                        <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Invoices</h2>
                        <p class="text-xs text-gray-500">Your last invoices</p>
                    </div>
                    <div class="md:w-2/3 w-full">
                        
                        <div class="py-8 px-16">
                            
                            <table class="w-full">
                                <thead class="text-left">
                                    <th class="border-b-2 border-gray-600 pb-3 font-bold">Date</th>
                                    <th class="border-b-2 border-gray-600 pb-3 font-bold">Total</th>
                                    <th class="border-b-2 border-gray-600 pb-3 font-bold">Download</th>
                                </thead>

                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td class="border-b border-green-600 py-3 text-gray-800">{{ $invoice->date()->toFormattedDateString() }}</td>
                                        <td class="border-b border-green-600 py-3 text-gray-800">{{ $invoice->total() }}</td>
                                        <td class="border-b border-green-600 py-3 text-gray-800"><a href="/user/invoice/{{ $invoice->id }}" class="text-green-400 font-bold underline rounded-lg">Download</a></td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    
                    </div>
                </div>
            
        </div>
    </div>
@endsection