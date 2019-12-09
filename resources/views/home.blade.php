<!-- resources/views/home.blade.php -->
<!-- Specify that we want to extend the index file -->
@extends('index')
<!-- Set the title content to "Home" -->
@section('title', 'Home')
<!-- Set the "content" section, which will replace "@yield('content')" in the index file we're extending -->
@section('content')
    <div class="overlay relative pb-10 sm:pb-0 static w-full bg-cover bg-no-repeat bg-center" style="background-image: url('./img/travel.jfif'); height: 25rem ">
        <div class="container flex justify-start mx-auto h-full items-center pt-24 sm:pt-0">
            <div class="w-auto w-3/4 text-left">
                @if(Auth::user())
                    <h1 class="text-3xl">Welcome back, {{ Auth::user()->nickname}}!</h1>
                    <p class="leading-normal mb-8">To your one stop shop for reservation management.</p>
                    <a href="/dashboard" class="px-4 py-3 bg-green-500 rounded-lg text-white">View your Dashboard</a>
                @else
                    <h1 class="text-3xl">Reservation management made easy.</h1>
                    <p class="leading-normal mb-8">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam in quia natus magnam ducimus quas molestias velit vero maiores. Eaque sunt laudantium voluptas. Fugiat molestiae ipsa delectus iusto vel quod.</p>
                    <a href="/login" class="px-4 py-3 bg-green-500 rounded-lg text-white">Sign Up for Access to Thousands of Hotels</a>
                @endif
            </div>
        </div>
    </div>

    <div class="container w-3/5 mx-auto">
        <div class="flex justify-between items-center py-10">
            <div class="w-72">
                <div class="bg-white p-4">
                    <div>
                        <h5 class="text-lg font-semibold mb-4">Convenient</h5>
                        <p class="text-sm">Manage all your hotel reservations in one place</p>
                    </div>
                </div>
            </div>
            <div class="w-72">
                <div class="bg-white p-4">
                    <div>
                        <h5 class="text-lg font-semibold mb-4">Best prices</h5>
                        <p class="text-sm">We have special discounts at the best hotels</p>
                    </div>
                </div>
            </div>
            <div class="w-72">
                <div class="bg-white p-4">
                    <div>
                        <h5 class="text-lg font-semibold mb-4">Easy to use</h5>
                        <p class="text-sm">Book and manage with the click of a button</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
