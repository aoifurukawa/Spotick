<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PayPalController extends Controller
{
    /**
     * @noinspection PhpMissingReturnTypeInspection
     */
    private $post;

    private $reservation;

    private $payment;

    public function __construct(Post $post, Reservation $reservation)
    {
        $this->post = $post;
        $this->reservation = $reservation;
    }

    public function index()
    {

        $post_info = session('post_info');
        $number_of_tickets = session('number_of_tickets');
        $booked_user = session('booked_user');

        return view('checkout', compact('post_info', 'number_of_tickets', 'booked_user'));
    }

    private function getAccessToken(): string
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic '.base64_encode(config('paypal.client_id').':'.config('paypal.client_secret')),
        ];

        $response = Http::withHeaders($headers)
            ->withBody('grant_type=client_credentials')
            ->post(config('paypal.base_url').'/v1/oauth2/token');

        return json_decode($response->body())->access_token;
    }

    public function create(int $amount = 10): string
    {
        $id = uuid_create();

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->getAccessToken(),
            'PayPal-Request-Id' => $id,
        ];

        $body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'reference_id' => $id,
                    'amount' => [
                        'currency_code' => 'GBP',
                        'value' => number_format($amount, 2),
                    ],
                ],
            ],
        ];

        $response = Http::withHeaders($headers)
            ->withBody(json_encode($body))
            ->post(config('paypal.base_url').'/v2/checkout/orders');

        Session::put('request_id', $id);
        Session::put('order_id', json_decode($response->body())->id);

        return json_decode($response->body())->id;
    }

    /**
     * @return mixed
     */
    public function complete()
    {
        $url = config('paypal.base_url').'/v2/checkout/orders/'.Session::get('order_id').'/capture';

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->getAccessToken(),
        ];

        $response = Http::withHeaders($headers)
            ->post($url, null);

        return json_decode($response->body());
    }

    public function store(Request $request)
    {
        //     $request->validate([
        //     'user_name' => 'required|string|max:255',
        //     'post_name' => 'required|string|max:255',
        //     'number_of_tickets' => 'required|integer|min:1',
        //     'amount' => 'required|integer|min:0',
        // ]);

        Payment::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'number_of_tickets' => $request->number_of_tickets,
            'amount' => $request->amount,

        ]);

        return redirect()->route('reservation.show');

    }
}
