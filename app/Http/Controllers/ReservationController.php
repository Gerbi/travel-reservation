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
            ->where('user_id', \Auth::user()->getUserInfo()['sub'])
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
        $user_id = \Auth::user()->getUserInfo()['sub'];
        $request->request->add(['user_id' => $user_id]);
        Reservation::create($request->all());

        return redirect('dashboard/reservations')->with('success','Reservation created!');
    }

    public function show(Reservation $reservation)
    {
        $reservation = Reservation::with('room', 'room.hotel')
            ->get()
            ->find($reservation->id);

        if ($reservation->user_id == \Auth::user()->getUserInfo()['sub']) {
            $hotel_id = $reservation->room->hotel_id;
            $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);

            return view('dashboard.reservationSingle', compact('reservation', 'hotelInfo'));
        }
        else
            return redirect('dashboard/reservations')->with('error', 'You are not authorized to see that.');
    }

    public function edit(Reservation $reservation) {
        $reservation = Reservation::with('room', 'room.hotel')
            ->get()
            ->find($reservation->id);

        if ($reservation->user_id === \Auth::user()->getUserInfo()['sub']) {
            $hotel_id = $reservation->room->hotel_id;
            $hotelInfo = Hotel::with('rooms')->get()->find($hotel_id);

            return view('dashboard.reservationEdit', compact('reservation', 'hotelInfo'));
        } else
            return redirect('dashboard/reservations')->with('error', 'You are not authorized to do that');
    }

    public function update(Request $request, Reservation $reservation) {
        if ($reservation->user_id != \Auth::user()->getUserInfo()['sub'])
            return redirect('dashboard/reservations')->with('error', 'You are not authorized to update this reservation');

        $user_id = \Auth::user()->getUserInfo()['sub'];
        $reservation->user_id = $user_id;
        $reservation->num_of_guests = $request->num_of_guests;
        $reservation->arrival = $request->arrival;
        $reservation->departure = $request->departure;
        $reservation->room_id = $request->room_id;

        $reservation->save();

        return redirect('dashboard/reservations')->with('success', 'Successfully updated your reservation!');
    }

    public function destroy(Reservation $reservation) {
        $reservation = Reservation::find($reservation->id);

        if ($reservation->user_id === \Auth::user()->getUserInfo()['sub']) {
            $reservation->delete();

            return redirect('dashboard/reservations')->with('success', 'Successfully deleted your reservation!');
        } else
            return redirect('dashboard/reservations')->with('error', 'You are not authorized to delete this reservation');
    }
}
