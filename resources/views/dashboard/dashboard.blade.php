@extends('index')
@section('title', 'Dashboard')
@section('content')
    <div class="container w-1/2 mx-auto">
        <div class="flex justify-between items-center py-10">
            <div class="w-80">
                <div class="bg-white p-6">
                    <div>
                        <p class="text-lg font-semibold">Manage your Reservations</p>
                        <p class="mt-2 text-sm font-normal">Modify your current reservations.</p>
                        <div class="mt-8">
                            <a href="/dashboard/reservations" class="bg-blue-500 px-4 py-1 rounded-sm">My Reservations</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-80">
                <div class="bg-white p-6">
                    <div>
                        <p class="text-lg font-semibold">Find a Room</p>
                        <p class="mt-2 text-sm font-normal">Browse our catalog of top-rated hotels.</p>
                        <div class="mt-8">
                            <a href="/hotels" class="bg-blue-500 px-4 py-1 rounded-sm">Our Hotels</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
