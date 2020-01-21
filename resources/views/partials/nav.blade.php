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