<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    private $reservation;

    private $post;

    private $content;

    public function __construct(Reservation $reservation, Post $post, Content $content)
    {
        $this->reservation = $reservation;
        $this->post = $post;
        $this->content = $content;
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

        $post_info = $this->post->findOrFail($post_id);
        $number_of_tickets = $request->number_of_tickets;
        $booked_user = Auth::user();

        // return redirect()->route('paypal.index')->with('post_info', $post_info)
        //     ->with('number_of_tickets', $number_of_tickets)
        //     ->with('booked_user', $booked_user);

        return view('checkout')->with('post_info', $post_info)
            ->with('number_of_tickets', $number_of_tickets)
            ->with('booked_user', $booked_user);
    }

    public function show()
    {
        $my_reservations = $this->reservation->where('user_id', Auth::id())->latest()->get();
        $my_posts = $this->post->where('user_id', Auth::id())->latest()->get();
        $all_content = $this->content->oldest()->get();

        return view('sponsor.schedule')->with('my_reservations', $my_reservations)
            ->with('my_posts', $my_posts)
            ->with('all_content', $all_content);
    }

    public function destroy($id)
    {
        $reservation_delete = $this->reservation->findOrFail($id);
        $reservation_delete->delete();

        return redirect()->route('reservation.show');
    }
}
