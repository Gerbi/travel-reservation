@extends('index')
@section('title', 'Edit Reservation')
@section('content')
    <div class="container w-1/2 mx-auto px-4 sm:px-8 my-5">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">You're all booked for the {{ $hotelInfo->name }} in {{ $hotelInfo->location }}!</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <div class="flex flex-row">
                        <div class="w-1/2">
                            <img src="{{ $hotelInfo->image }}" class="img-fluid" alt="Front of hotel">
                        </div>
                        <div class="w-1/2">
                            <h3 class="text-2xl font-semibold leading-tight">
                                {{ $hotelInfo->name }} - <p class="text-xs text-gray-700">{{ $hotelInfo->location }}</p>
                            </h3>
                            <p class="text-lg font-semibold text-gray-700">{{ $hotelInfo->description }}</p>
                            <p class="text-lg font-semibold text-gray-700"><strong>Arrival: </strong>{{ $reservation->arrival }}</p>
                            <p class="text-lg font-semibold text-gray-700"><strong>Departure: </strong>{{ $reservation->departure }}</p>
                            <p class="text-lg font-semibold text-gray-700"><strong>Room: </strong>{{ $reservation->room['type'] }}</p>
                            <p class="text-lg font-semibold text-gray-700"><strong>Guests: </strong>{{ $reservation->num_of_guests }}</p>
                            <p class="text-lg font-semibold text-gray-700"><strong>Price: </strong>${{ $reservation->room['price'] }}</p>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="/dashboard/reservations/{{ $reservation->id }}/edit" class="relative inline-block px-3 py-1 font-semibold bg-green-300 rounded-lg leading-tight text-green-900">Edit this reservation</a>
                        <a href="/dashboard/reservations/{{ $reservation->id }}/delete" class="relative inline-block px-3 py-1 font-semibold bg-red-300 rounded-lg leading-tight text-red-900">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
