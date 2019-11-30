@extends('index')
@section('title', 'Edit Reservation')
@section('content')
    <div class="container w-1/2 mx-auto px-4 sm:px-8 my-5">
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
            <div class="flex items-center bg-gray-200 py-3 px-6 mb-0">
                <p class="text-xl font-semibold text-gray-900">{{ $hotelInfo->name }} -  </p>
                <p class="ml-2 text-lg font-normal text-gray-600">{{ $hotelInfo->location }}</p>
            </div>
            <div class="p-6">
                <p class="leading-normal">Book your stay now at the most magnificent resort in the world!</p>
                <form class="w-full mt-6" action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex-row">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-wrap w-3/4 pr-2 mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="room">Room Type</label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " name="room_id" value="{{ old('room_id', $reservation->room_id) }}">
                                    @foreach ($hotelInfo->rooms as $option)
                                        <option value="{{$option->id}}">{{ $option->type }} - ${{ $option->price }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-wrap w-1-4 pl-2 mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="guests">Number of guests</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name')  border-red-500 @enderror" name="num_of_guests" value="{{ old('num_of_guests', $reservation->num_of_guests) }}">
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex flex-wrap w-1/2 pr-2 mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="arrival">Arrival</label>
                                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name')  border-red-500 @enderror" name="arrival" placeholder="03/21/2020" value="{{ old('arrival', $reservation->arrival) }}">
                            </div>

                            <div class="flex flex-wrap w-1/2 pl-2 mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="departure">Departure</label>
                                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name')  border-red-500 @enderror" name="departure" placeholder="03/23/2020" value="{{ old('departure', $reservation->departure) }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="relative inline-block px-3 py-2 rounded-lg font-semibold bg-blue-300 text-blue-900 leading-tight">Submit</button>
                </form>
            </div>
        </div>
        <form class="mt-4" action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <p class="text-right">
                <button type="submit" class="relative inline-block px-3 py-2 rounded-lg font-semibold bg-pink-300 text-pink-900 leading-tight">Delete reservation</button>
            </p>
        </form>
    </div>
@endsection
