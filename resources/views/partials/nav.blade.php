<nav class="bg-blue-900 shadow py-6">
    <div class="container mx-auto px-6 md:px-0">
        <div class="flex items-center justify-center">
            <div class="mr-6 flex flex-row items-center">
                <a class="text-lg font-semibold text-gray-100 no-underline" href="/">Travel Mind</a>
                <a class="ml-6 text-sm font-medium text-gray-200 no-underline" href="/hotels">Browse Hotels</a>
            </div>

            @if()
                <div class="flex-1 text-right">
                    @auth
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('logout') }}">Logout</a>
                    @else
                        <a class="no-underline  hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">Login/Signup</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>

