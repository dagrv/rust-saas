@extends('app')

@section('title', 'Home')

@section('content')

    @include('partials.nav')

    <h1 class="text-white">.</h1>

    <section class="-mt-24 font-sans container m-auto flex min-h-screen">
        <div class="flex-1 flex items-start flex-col justify-center">
            <h1 class="my-4 font-medium mt-32 md:mt-16 lg:mt-0 text-4xl text-center w-full px-2 text-gray-900 xl:text-4xl lg:text-4xl lg:px-0 font-black mb-8 md:text-5xl md:w-full lg:text-left lg:-mt-4 h-24">We build <span id="title" class="text-orange-500"></span> ready to go.</span></h1>
            <p class="leading-normal mb-12 pr-36 text-lg text-center w-full px-16 text-gray-600 leading-loose xl:pr-32 md:text-center md:px-32 sm:text-center lg:text-left lg:px-0">A project in mind ? Let us know, we'll do our best to fit your demand</p>
            

            {{-- Social Login: Google, GitHub, Facebook, Email --}}
            <div class="flex justify-center items-center flex-col">
                <div class="max-w-5xl">
                    <a href="/login/google" class="google-blue text-gray-100 hover:text-white shadow font-bold py-3 pl-4 pr-8 rounded-full flex justify-start items-center cursor-pointer text-sm w-full">
                        <svg viewBox="0 0 24 24" class="fill-current mr-3 w-6 h-5" xmlns="http://www.w3.org/2000/svg"><path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/></svg>
                        <span class="border-l border-white h-6 w-1 block"></span>
                        <span class="pl-3">Sign up with Google</span>
                    </a>
            
                    <a href="/login/github" class="bg-gray-900 text-gray-100 hover:text-white shadow font-bold text-sm py-3 pl-4 pr-8 rounded-full flex justify-start items-center cursor-pointer text-sm w-full mt-4">
                        <svg viewBox="0 0 24 24" class="fill-current mr-3 w-6 h-6" xmlns="http://www.w3.org/2000/svg"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                        <span class="border-l border-white h-6 w-1 block mr-1"></span>
                        <span class="pl-3">Sign up with Github</span>
                    </a>
            
                    <a href="/login/facebook" class="bg-indigo-600 text-gray-100 hover:text-white shadow font-bold py-3 pl-4 pr-8 rounded-full flex justify-start items-center cursor-pointer text-sm w-full mt-4">
                        <svg viewBox="0 0 24 24" class="fill-current mr-3 w-6 h-6" xmlns="http://www.w3.org/2000/svg"><path d="M23.998 12c0-6.628-5.372-12-11.999-12C5.372 0 0 5.372 0 12c0 5.988 4.388 10.952 10.124 11.852v-8.384H7.078v-3.469h3.046V9.356c0-3.008 1.792-4.669 4.532-4.669 1.313 0 2.686.234 2.686.234v2.953H15.83c-1.49 0-1.955.925-1.955 1.874V12h3.328l-.532 3.469h-2.796v8.384c5.736-.9 10.124-5.864 10.124-11.853z"/></svg>
                        <span class="border-l border-white h-6 w-1 block mr-1"></span>
                        <span class="pl-3">Sign up with Facebook</span>
                    </a>
                    <a href="/register" class="bg-green-500 text-gray-100 hover:text-white shadow font-bold py-3 pl-4 pr-8 rounded-full flex justify-start items-center cursor-pointer text-sm w-full mt-4">
                        <svg viewBox="0 0 24 22" class="fill-current mr-3 w-6 h-5 mt-1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1"><g id="email" transform="translate(0 -3)"><path d="M1.803 3h20.394C23.211 3 24 3.755 24 4.858v14.284C24 20.187 23.268 21 22.197 21H1.803C.789 21 0 20.187 0 19.142V4.858C0 3.755.845 3 1.803 3zm20.45 16.839l-6.985-8.42-.902.755c-1.408 1.22-3.324 1.22-4.732 0l-.845-.755-6.986 8.42h20.45zm-6.14-9.174l6.76 8.187V4.8l-6.76 5.865zM1.127 18.852l6.76-8.187L1.127 4.8v14.052zM2.14 4.162l8.225 7.083c.958.871 2.31.871 3.324 0l8.225-7.084H2.141z" id="Shape"/></g></g></svg>
                        <span class="border-l border-white-400 h-6 w-1 block mr-1"></span>
                        <span class="pl-3">Sign up with Email</span>
                    </a>
                </div>
            </div>


            {{-- <form action="https://rustx.us4.list-manage.com/subscribe/post?u=54cca8c23f34eb234efa20b02&amp;id=2e23b121f7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate class="flex w-full px-16 xl:pr-32 lg:pr-16 md:px-32 lg:px-0">
                <input class="bg-white border-2 border-gray-300 rounded-lg py-2 px-4 block w-full focus:outline-none focus:border-orange-600 text-black input w-1/3" name="EMAIL" type="email" autofocus="" placeholder="john@mail.com">
                <button class="hover:bg-grey-darker text-white ml-4 py-2 px-6 rounded-lg bg-orange-500 font-bold w-2/3">Submit</button>
            </form> --}}

            {{-- <div class="mt-8">
                <div class="p-2 bg-orange-200 items-center text-black leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                  <span class="flex rounded-full bg-orange-300 text-black px-2 py-1 text-xs font-bold mr-3">Sign Up</span>
                  <span class="font-semibold mr-2 text-left flex-auto">for progress updates and gain early access now !</span>
                  <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                </div>
            </div> --}}
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
                        <p class="text-gray-600 mb-8">You can integrate your Stripe or Braintree payment system right or Mailchimp Emailing in your own SAAS app ready to go.</p>
                    </div>
                </div>

                <!-- Second feauture-->
                <div class="flex flex-wrap mb-16 bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="w-5/6 sm:w-1/2  flex flex-col justify-center px-16">
                        <h3 class="text-3xl font-bold leading-none mb-3 mt-16 text-gray-700 -mt-1">Integrate easily your own payment system</h3>
                        <p class="text-gray-600 mb-8">You can integrate your Stripe or Braintree payment system right or Mailchimp Emailing in your own SAAS app ready to go.</p>
                    </div>

                    <div class="w-1/6 sm:w-1/2">
                        <img src="/img/stripe_bg.png">
                    </div>
                </div>
            </div>
    </section>

    <!-- FOOTER EMAIL SECTION -->
    <section class="text-center pt-32 pb-40 gradient relative">
        <div class="container mx-auto text-center">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">Sign-Up to be notified when we release!</h1>
            <h2 class="my-4 text-3xl leading-tight text-white">Enter your email below to request early access</h2>
            
            <a href="/register" class="px-8 py-4 bg-green-600 text-xl mt-8 inline-block rounded-full text-white shadow-xl">Get Started</a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>

    <script>
        // TypeJS
        var typed = new Typed('#title', {
            strings: ["Cloud Infrastructure", "SaaS Services"],
            typeSpeed: 80,
            backSpeed: 20,
            backDelay: 1500,
            startDelay: 10,
            loop: true
        })
    </script>

@include('partials.footer')

@endsection
