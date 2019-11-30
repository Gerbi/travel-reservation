@extends('index')
@section('title', 'Reservations')
@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Your Reservations</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" scope="col">Hotel</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" scope="col">Arrival</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" scope="col">Departure</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" scope="col">Type</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" scope="col">Guests</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" scope="col">Price</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->room->hotel['name'] }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->arrival }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->departure }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->room['type'] }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $reservation->num_of_guests }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">${{ $reservation->room['price'] }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="/dashboard/reservations/{{ $reservation->id }}/edit" class="relative inline-block px-3 py-1 font-semibold bg-green-300 rounded-lg leading-tight text-green-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @if(!empty(Session::get('success')))
            <div class="px-4 py-3 bg-blue-400 rounded-lg mb-10 text-blue-800"> {{ Session::get('success') }}</div>
        @endif
        @if(!empty(Session::get('error')))
            <div class="px-4 py-3 bg-red-400 rounded-lg mb-10 text-red-800"> {{ Session::get('error') }}</div>
        @endif
    </div>
@endsection
