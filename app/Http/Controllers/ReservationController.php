<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('room', 'room.hotel')
            ->orderBy('arrival','asc')
            ->get();

        return view('dashboard.reservations')->with('reservations', $reservations);
    }

    public function create($hotel_id)
    {
        $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);

        return view('dashboard.reservationCreate',compact('hotelInfo'));
    }

    public function store(Request $request)
    {
        $request->request->add(['user_id' => 1]);
        Reservation::create($request->all());

        return redirect('dashboard/reservations')->with('success','Reservation created!');
    }

    public function show(Reservation $reservation)
    {
        $reservation = Reservation::with('room', 'room.hotel')
            ->get()
            ->find($reservation->id);
        $hotel_id = $reservation->room->hotel_id;
        $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);

        return view('dashboard.reservationSingle', compact('reservation','hotelInfo'));
    }

    public function edit(Reservation $reservation)
    {
        $reservation = Reservation::with('room','room.hotel')
            ->get()
            ->find($reservation->id);
        $hotel_id = $reservation->room->hotel_id;
        $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);

        return view('dashboard.reservationEdit', compact('reservation','hotelInfo'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->user_id = 1;
        $reservation->save();

        return redirect('dashboard/reservation')->with('success','Successfully updated your reservation!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation = Reservation::find($reservation->id);
        $reservation->delete();

        return redirect('dashboard/reservation')->with('success','Successfully deleted your reservation!');
    }
}
