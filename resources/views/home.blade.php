@extends('app')

@section('title', 'Rust Software - SaaS Makers')

@section('content')

    <div class="h-2 w-full bg-indigo-600 absolute z-20 gradient"></div>

    <div class="absolute w-full z-20">
        <nav class="font-sans text-center flex justify-between my-4 mx-auto container overflow-hidden mt-8 z-50 relative px-5">
            <a href="/" class="toggleColour text-gray-700 no-underline hover:no-underline font-bold text-2xl lg:text-4xl">
                <img src="/img/logo.png" alt="We make SaaS products" class="h-8">
            </a>
            
            <ul class="text-sm text-grey-dark list-reset flex items-center">
                <li class="mr-8">
                    <a href="/" class="text-orange-400 rounded font-extrabold hidden sm:block">Home</a>
                </li>
                
                <li class="mr-8">
                    <a href="#" class="text-black hover:text-orange-400 rounded font-bold hidden sm:block">Feautures</a>
                </li>

                <li class="mr-8">
                    <a href="#" class="text-black hover:text-orange-400 rounded font-bold hidden sm:block">Pricing</a>
                </li>

                <li class="mr-8">
                    <a href="#" class="text-black hover:text-orange-400 rounded font-bold hidden sm:block">F.A.Q</a>
                </li>

                <li>
                    <a href="{{ route('login') }}" class="text-white ml-4 py-2 px-6 rounded font-bold hidden sm:block bg-green-400">Login</a>
                </li>
            </ul>
        </nav>
    </div>

    <h1 class="text-white">.</h1>

    <section class="-mt-24 font-sans container m-auto flex min-h-screen">
        <div class="flex-1 flex items-start flex-col justify-center">
            <h1 class="my-4 font-medium mt-32 md:mt-16 lg:mt-0 text-4xl text-center w-full px-2 text-gray-900 xl:text-4xl lg:text-4xl lg:px-0 font-black mb-8 md:text-5xl md:w-full lg:text-left lg:-mt-4 h-24">We build <span id="title" class="text-orange-500"></span> ready to go.</span></h1>
            <p class="leading-normal mb-12 pr-36 text-lg text-center w-full px-16 text-gray-600 leading-loose xl:pr-32 md:text-center md:px-32 sm:text-center lg:text-left lg:px-0">A project in mind ? Let us know, we'll do our best to fit your demand</p>
            
            <form action="https://rustx.us4.list-manage.com/subscribe/post?u=54cca8c23f34eb234efa20b02&amp;id=2e23b121f7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate class="flex w-full px-16 xl:pr-32 lg:pr-16 md:px-32 lg:px-0">
                <input class="bg-white border-2 border-gray-300 rounded-lg py-2 px-4 block w-full focus:outline-none focus:border-orange-600 text-black input w-1/3" name="EMAIL" type="email" autofocus="" placeholder="john@mail.com">
                <button class="hover:bg-grey-darker text-white ml-4 py-2 px-6 rounded-lg bg-orange-500 font-bold w-2/3">Submit</button>
            </form>

            <div class="mt-8">
                <div class="p-2 bg-orange-200 items-center text-black leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                  <span class="flex rounded-full bg-orange-300 text-black px-2 py-1 text-xs font-bold mr-3">Sign Up</span>
                  <span class="font-semibold mr-2 text-left flex-auto">for progress updates and gain early access now !</span>
                  <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                </div>
            </div>
        </div>

        <div class="flex-1 hidden items-start flex-col justify-center lg:flex">
            <img src="/img/op_sys.svg" class="w-full" alt="rust-software saas development">
        </div>

    </section>

    <svg width="100%" height="auto" class="w-full relative" viewBox="0 0 1370 65" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Desktop-HD" transform="translate(0.000000, -558.000000)" fill="#F9F9FC"><path d="M0,558 C243.726562,600.97601 472.059896,622.464014 685,622.464014 C897.940104,622.464014 1126.27344,600.97601 1370,558 L1370,622.464014 L0,622.464014 L0,558 Z" id="Rectangle-4"></path></g></g></svg>

    <section class="bg-gray-100">
    
        <div class="container mx-auto mt-0 pb-24">
                <h2 class="w-full mb-16 pt-16 pt-4 text-5xl font-bold leading-tight text-center text-gray-700">Some of our features </h2>

                <!-- First feauture-->
                <div class="flex flex-wrap mb-16 bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="w-1/6 sm:w-1/2">
                        <img src="/img/stripe_bg.png" class="" alt="">
                    </div>
                    <div class="w-5/6 sm:w-1/2  flex flex-col justify-center px-16">
                        <h3 class="text-3xl font-bold leading-none mb-3 mt-16 text-gray-700 -mt-1">Integrate easily your own payment system</h3>
                        <p class="text-gray-600 mb-8">You can integrate your Stripe or Braintree payment system right in your own SAAS.</p>	
                    </div>
                </div>

                <!-- Second feauture-->
                <div class="flex flex-wrap mb-16 bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="w-5/6 sm:w-1/2  flex flex-col justify-center px-16">
                        <h3 class="text-3xl font-bold leading-none mb-3 mt-16 text-gray-700 -mt-1">Integrate easily your own payment system</h3>
                        <p class="text-gray-600 mb-8">You can integrate your Stripe or Braintree payment system right in your own SAAS.</p>	
                    </div>

                    <div class="w-1/6 sm:w-1/2">
                        <img src="/img/stripe_bg.png" class="" alt="">
                    </div>
                </div>
            </div>
    </section>

    <!-- FOOTER EMAIL SECTION -->
    <section class="text-center pt-32 pb-40 gradient relative">
        <div class="container mx-auto text-center">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">Sign-Up to be notified when we release!</h1>
            <h2 class="my-4 text-3xl leading-tight text-white">Enter your email below to request early access</h2>
            
            <form action="https://rustx.us4.list-manage.com/subscribe/post?u=54cca8c23f34eb234efa20b02&amp;id=2e23b121f7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate class="flex w-full px-16 xl:pr-6 lg:pr-16 md:px-32 lg:px-0 lg:w-1/2 lg:m-auto lg:mt-8">
                <input class="bg-white border-2 border-white rounded py-2 px-4 block w-full focus:outline-none focus:border-indigo-400 text-black input w-1/3" name="EMAIL" type="email" autofocus="" placeholder="john@mail.com">
                <input type="hidden" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                <button class="hover:bg-grey-darker text-white ml-4 py-2 px-6 rounded bg-green-500 font-bold w-2/3">Submit</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>

    <script>
        /*
        document.getElementById('signup_btn').addEventListener('click', function () {
            document.getElementById('email').focus();
        });
        */

        // TypeJS
        var typed = new Typed('#title', {
            strings: ["Cloud Infrastructure", "SaaS Services"],
            typeSpeed: 80,
            backSpeed: 20,
            backDelay: 1500,
            startDelay: 10,
            loop: false
        })
    </script>

@endsection




{{-- // login

@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Dashboard
                </div>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        You are logged in!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
