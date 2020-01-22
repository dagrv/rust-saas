@extends('app')

@section('title', 'Billing Settings')

@section('content')
    <div class="bg-gray-100 min-h-screen pb-24">
        
        @include('partials.dashboard-header')

        <div class="container mx-auto max-w-3xl mt-8">

        @if (session('alert'))
            <p>{{ session('alert') }}</p>
        @endif

            <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Billing Settings</h1>
            
            @include('settings.nav')

            <form action="{{ route('billing.save') }}" method="POST" id="billing-form" enctype="multipart/form-data">
                
                @csrf

                <div class="w-full bg-white rounded-lg mx-auto mt-8 flex overflow-hidden rounded-b-none">
                    <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
                        <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Billing Settings</h2>
                        <p class="text-xs text-gray-500">Update your payment informations</p>
                    </div>
                    
                    <div class="md:w-2/3 w-full">
                        @if(auth()->user()->subscribed('main'))
                                <div class="py-8 px-16">
                                    <div class="mb-2 text-normal">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 mr-2 flex-shrink-0">
                                            <circle cx="12" cy="12" r="10" class="text-green-200 fill-current"></circle>
                                            <path d="M10 14.59l6.3-6.3a1 1 0 0 1 1.4 1.42l-7 7a1 1 0 0 1-1.4 0l-3-3a1 1 0 0 1 1.4-1.42l2.3 2.3z" class="text-green-600 fill-current"></path>
                                        </svg>
                                        You are subscribed ! Thanks you !
                                    </div>
                                    <div class="text-normal text-blue-600 mb-1">Last 4 Digits: **** <b>{{ auth()->user()->card_last_four }}</b></div>
                                    <div class="text-normal text-blue-600 mb-1">Credit Card Brand: <b> {{ auth()->user()->card_brand }}</b></div>
                                    <div class="text-xs text-gray-500">To update your default payment method, Add a new card below</div>
                                </div>
                            <hr class="border-gray-200">
                        @endif
                        
                        <div class="py-8 px-16">
                            <label for="card-holder-name" class="text-sm text-gray-600">Name on your Credit Card </label>
                            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" id="card-holder-name" type="text">
                        </div>
                        <hr class="border-gray-200">

                        <div class="py-8 px-16">
                            <label for="cc" class="text-sm text-gray-600">Credit Card</label>
                            <div id="card-element" class="mt-2 border-2 border-gray-200 px-3 py-4 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"></div>
                            <div id="card-errors" class="text-red-400 text-bold mt-2 text-sm font-medium"></div>
                        </div>
                        <hr class="border-gray-200">

                        <div class="py-8 px-16">
                            <p class="text-sm text-gray-600 mb-4">Select a Plan</p>
                            @foreach ($plans as $plan)
                                <input type="radio" id="{{ $plan->name }}-plan" name="plan" @if($loop->first) checked @endif value="{{ $plan->name }}" class="radio-plan hidden">
                                <label for="{{ ucfirst($plan->name) }}-plan" class="border-2 border-gray-300 w-full px-4 py-4 rounded-lg block mb-2">
                                    <div class="flex">
                                        <img src="/img/plans/{{ $plan->name }}.png" alt="plans" class="w-16 h-16 mr-3">
                                    
                                        <div>
                                            <span class="block">{{ $plan->name }}</span>
                                            <span class="text-xs text-gray-600">{{ $plan->description }}</span>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        <hr class="border-gray-200">
                    </div>
                </div>

                <div class="p-16 py-8 bg-white clearfix rounded-b-lg border-t border-gray-200">
                    <p class="float-left text-sm text-gray-500 tracking-tight mt-2">Click on Save to update your Billing Settings</p>
                    <button id="card-button" data-secret="{{ auth()->user()->createSetupIntent()->client_secret }}" class="bg-green-500 text-white text-sm font-medium px-6 py-2 rounded float-right cursor-pointer">Update Payment Method</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('{{ env("STRIPE_KEY") }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        const cardError = document.getElementById('card-errors');

        cardElement.addEventListener('change', function(event) {
            if (event.error) {
                cardError.textContent = event.error.message;
            } else {
                cardError.textContent = '';
            }
        });

        var form = document.getElementById('billing-form');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const { setupIntent, error } = await stripe.handleCardSetup(
                    clientSecret, cardElement, {
                        payment_method_data: {
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );
                if (error) {
                    // Display "error.message" to the user...
                    
                    cardError.textContent = error.message;
                    
                    console.log(error);
                } else {
                    // The card has been verified successfully...
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'payment_method');
                    hiddenInput.setAttribute('value', setupIntent.payment_method);
                    form.appendChild(hiddenInput);
                    // Submit the form
                    form.submit();
            }
        });
    </script>
@endsection