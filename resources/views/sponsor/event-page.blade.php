@extends('layouts.app')

@section('content')


<div class="slider">
    <div class="container">
        <div class="row">
            <div class="col-7 mt-5">
                <div class="card" style="border-radius: 20px; background-color: rgba(255, 255, 255, 0);">
                    <div class="card-body" style="border: 5px solid black; border-radius: 20px; background-color: rgba(255, 255, 255, 0.8);">
                        <span class="fw-bold">Description: </span>{{ $post_detail->description }}
                    </div>
                </div>

                <div class="card mt-3" style="border-radius: 20px; margin-bottom: 150px; background-color: rgba(255, 255, 255, 0);">
                    <div class="card-body" style="border: 5px solid black; border-radius: 20px; background-color: rgba(255, 255, 255, 0.8);">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <img src="{{ $post_detail->user->avatar }}" alt="" style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid black" class="">
                            </div>
                            <div class="col-9">
                                <p><span class="fw-bold">Venue: </span>{{$post_detail->venue}}</p>
                                <p><span class="fw-bold">Date: </span>{{$post_detail->date}}</p>
                                <p><span class="fw-bold">Price for per ticket: </span>{{$post_detail->price}} $</p>
                                <p><span class="fw-bold">Sponsor's Name: </span>{{$post_detail->sponsor_name}}</p>
                                <p><span class="fw-bold">Sponsor's Email: </span>{{$post_detail->mail_address}}</p>
                                <a href="{{ $post_detail->insta_url }}"><i class="fa-brands fa-instagram"></i></a>
                                <a href="{{ $post_detail->facebook_url }}"><i class="fa-brands fa-facebook"></i></a>
                                <a href="{{ $post_detail->x_url }}"><i class="fa-brands fa-x-twitter"></i></a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-5 mt-5">
                <div class="card" style="margin-bottom: 150px; border-radius: 20px; background-color: rgba(255, 255, 255, 0);">
                    <div class="card-body" style="border: 5px solid black; border-radius: 20px; background-color: rgba(255, 255, 255, 0.8);">
                        <p>{{$answer}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer d-flex align-items-center justify-content-center" style="position: fixed; width: 100%; background-color: black; bottom: 0; height: 100px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-8 text-center">
                <h1 class="text-white" style='white-space: nowrap;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            max-width: 100%;'>{{$post_detail->title}}</h1>
            </div>
            
            <div class="col-4 text-center">
                <div class="d-flex text-align-center">
                    <form action="{{ route('reservation.store', $post_detail->id) }}" method="post">
                        @csrf
                        <div class="d-flex align-items-center gap-2">
                            <label for="tickets" class="form-label text-white mb-0">Number of tickets</label>
                            <input type="number" name="number_of_tickets" id="tickets" class="form-control" style="width: 20%">
                            <button type="submit" class="btn btn-dark btn-outline-light">Reserve</button>
                        </div>
                    </form>

                    @if ($post_detail->like()->where('user_id', Auth::id())->exists())
                        <!-- すでにいいねしてたら、解除ボタンを表示 -->
                        <form action="{{ route('like.destroy', $post_detail->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">
                                <i class="fa-brands fa-gratipay text-danger fa-2x"><span class="text-white">{{ $post_detail->like->count() }}</span></i> <!-- 赤色 -->
                            </button>
                        </form>
                    @else
                        <form action="{{ route('like.store', $post_detail->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn">
                                <i class="fa-brands fa-gratipay text-white fa-2x"><span class="text-white">{{ $post_detail->like->count() }}</i> <!-- 通常色 -->
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .slider {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    animation: bgFade 18s infinite;
    transition: background-image 1s ease-in-out;
  }

  @keyframes bgFade {
    0%   { background-image: url({{ $post_detail->picture_1 }}); }
    33%  { background-image: url({{ $post_detail->picture_2 }}); }
    66%  { background-image: url({{ $post_detail->picture_3 }}); }
    100% { background-image: url({{ $post_detail->picture_1 }}); }
  }
</style>
@endsection