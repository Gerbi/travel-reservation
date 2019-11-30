@extends('index')
@section('title', 'Create reservation')
@section('content')
    <div class="container w-1/2 mx-auto px-4 sm:px-8 my-5">
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
            <div class="flex items-center bg-gray-200 py-3 px-6 mb-0">
                <p class="text-xl font-semibold text-gray-900">{{ $hotelInfo->name }} -  </p>
                <p class="ml-2 text-lg font-normal text-gray-600">{{ $hotelInfo->location }}</p>
            </div>
            <div class="p-6">
                <p class="leading-normal">Book your stay now at the most magnificent resort in the world!</p>
                <form class="w-full mt-6" action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="flex-row">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-wrap w-3/4 pr-2 mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="room">Room Type</label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="room_id">
                                    @foreach ($hotelInfo->rooms as $option)
                                        <option value="{{$option->id}}">{{ $option->type }} - ${{ $option->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-wrap w-1-4 pl-2 mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="guests">Number of guests</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="num_of_guests" placeholder="1" required>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex flex-wrap w-1/2 pr-2 mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="arrival">Arrival</label>
                                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="arrival" placeholder="03/21/2020" required>
                            </div>
                            <div class="flex flex-wrap w-1/2 pl-2 mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="departure">Departure</label>
                                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="departure" placeholder="03/23/2020">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="relative inline-block px-3 py-2 rounded-lg font-semibold bg-blue-300 text-blue-900 leading-tight">Book it</button>
                </form>
            </div>
        </div>
    </div>
@endsection
