@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-user-list.css') }}">
<body style="background:linear-gradient(-20deg, #f8cbcb 0%, #bedffb9c 100%); height: 100vh;">
    <div class="container">
        <div class="row mx-auto mt-3">
            <h1>Sponsor list</h1>
            <hr>
                <table class="mb-3" style="">
                    <thead class="">
                        <tr>
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="{{ route('admin.sponsors') }}" class="text-dark text-decoration-none">Sponsor</a></td>
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="{{ route('admin.users') }}" class="text-dark text-decoration-none">User</a></td>
                            <td style="background-color: #eef0a4;" class="text-center fw-bold"><a href="{{ route('admin.payments') }}" class="text-dark text-decoration-none">Payment</a></td>
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="{{ route('admin.contents') }}" class="text-dark text-decoration-none">Content</a></td>
                        </tr>
                    </thead>
                </table>

                

                <table class="table" style="width: 100%; table-layout: fixed; !important">
                    <thead>
                        <tr>
                            <th style="width: 10% !important">Date</th>
                            <th style="width: 20% !important">User Name</th>
                            <th style="width: 10% !important">Numer of Tickets</th>
                            <th style="width: 30% !important">Event Name</th>
                            <th style="width: 10% !important">Amount</th>
                            <th style="width: 20% !important">Bank Account</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payment_record as $payment)
                        <tr>
                            <td>{{$payment->created_at}}</td>
                            <td>{{$payment->user->name}}</td>
                            <td>{{$payment->number_of_tickets}}</td>
                            <td>{{$payment->post->title}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->user->phone_number}}</td>
                        </tr>
                        @empty
                            <p>No record yet</p>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
</body>
@endsection