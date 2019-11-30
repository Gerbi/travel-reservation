@extends('index')
@section('title', 'Hotels')
@section('content')
    <div class="container w-3/4 mx-auto">
        <div class="flex justify-between items-center py-10">
            <!-- Loop through hotels returned from controller -->
            @foreach ($hotels as $hotel)
                <div class="w-72">
                    <div class="bg-white rounded-sm">
                        <div style="background-image:url('{{ $hotel->image }}');height:300px;" class="bg-cover" alt="Front of hotel"></div>
                        <div class="p-6 block">
                            <p class="text-xl text-gray-800">{{ $hotel->name }}</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $hotel->location }}</p>
                            <p class="mt-1 text-sm text-gray-600">{{ $hotel->description }}</p>
                            <div class="mt-4">
                                <a href="/dashboard/reservations/create/{{ $hotel->id }}" class="bg-blue-500 px-4 py-1 rounded-sm">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
