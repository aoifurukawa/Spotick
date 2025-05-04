<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    private $reservation;

    private $post;

    public function __construct(Reservation $reservation, Post $post)
    {
        $this->reservation = $reservation;
        $this->post = $post;
    }

    public function store(Request $request, $post_id)
    {
        $request->validate([
            'number_of_tickets' => 'required|integer|min:1',
        ]);

        $this->reservation->user_id = Auth::id();
        $this->reservation->post_id = $post_id;
        $this->reservation->number_of_tickets = $request->number_of_tickets;
        $this->reservation->reserved_at = now();

        $this->reservation->save();

        return redirect()->route('reservation.show');
    }

    public function show()
    {
        $my_reservations = $this->reservation->where('user_id', Auth::id())->latest()->get();
        $my_posts = $this->post->where('user_id', Auth::id())->latest()->get();

        return view('sponsor.schedule')->with('my_reservations', $my_reservations)
            ->with('my_posts', $my_posts);
    }

    public function destroy($id)
    {
        $reservation_delete = $this->reservation->findOrFail($id);
        $reservation_delete->delete();

        return redirect()->route('reservation.show');
    }
}
