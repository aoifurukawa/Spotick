@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/participant-slyde.css') }}">
{{-- <div class="container" style="width: 100vw;"> --}}
    <div class="row">
        <div class="col-3">
            <div class="contain">
                <div class="slider">
                    <ul class="slider-list" style="transform: translateY(-121px); list-style: none;">
                        <li class="slider-item">
                            <img src="{{ $posts->picture_1 }}">
                        </li>
                        <li class="slider-item">
                            <img src="{{  $posts->picture_2  }}">
                        </li>
                        <li class="slider-item">
                            <img src="{{ $posts->picture_3 }}">
                        </li>
                    </ul>
                    <ul class="slider-list" style="list-style: none;">
                        <li class="slider-item">
                            <img src="{{ $posts->picture_1 }}">
                        </li>
                        <li class="slider-item">
                            <img src="{{ $posts->picture_2 }}">
                        </li>
                        <li class="slider-item">
                            <img src="{{ $posts->picture_3 }}">
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-9">
            <h2 class="mt-3">{{$posts->title}}</h3>
            <hr>
            <table>
                <t-head>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Mail Address</th>
                        <th>Number of tickets</th>
                    </tr>
                </t-head>
                <t-body>
                    @forelse ($posts->reservation as $reservation)
                    <tr>
                        <td>{{$reservation->user->id}}</td>
                        <td>{{$reservation->user->name}}</td>
                        <td>{{$reservation->user->email}}</td>
                        <td>{{$reservation->number_of_tickets}}</td>
                    </tr>
                    @empty
                    <h3 class="text-center">
                        No reservation yet
                    </h3>
                    @endforelse
                    

                </t-body>
            </table>
        </div>
    </div>
{{-- </div> --}}
@endsection
