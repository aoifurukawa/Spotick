@extends('layouts.app')

@section('content')

<style>
    .event-card {
        display: flex;
        align-items: center;
        background-color: #ddd; /* 背景色 */
        border-radius: 30px; /* 角丸 */
        /* padding: 10px; */
        padding: 0;
        max-width: 1600px;
        margin: 20px auto;
        margin-left: 20px;
    }

    .event-image {
        width: 200px;
        height: 70px;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        object-fit: cover;
        margin-right: 15px;
        border: 2px solid #000;
    }

    .event-content {
        flex-grow: 1;
    }

    .event-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .event-meta {
        /* display: flex; */
        /* gap: 30px; */
        margin-right: 20px;
        font-size: 16px;
        font-weight: bold;
        /* text-align: center; */
    }

    .event-description {
        font-size: 14px;
        color: #333;
    }

    .heart-icon {
        font-size: 24px;
        cursor: pointer;
        transition: transform 0.2s;
        margin-right: 5px;
    }

    .heart-icon:hover {
        transform: scale(1.2);
    }
</style>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="padding-top: 40px; background-color: #f0f0f0;">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>

    <div class="carousel-inner" data-bs-interval="5000">
      <div class="carousel-item active" style="background: linear-gradient(to bottom, #f0f0f0 30%, #aff2c485 30%);">
        <img src="{{ asset('images/baseball-home.jpg') }}" class="d-block mx-auto" alt="..."  style="height: 400px; width: 80%; object-fit:cover; border-radius: 50px;">
      </div>
      <div class="carousel-item" style="background: linear-gradient(to bottom, #f0f0f0 30%, #aff2c485 30%);">
        <img src="{{ asset('images/basket-gall.jpg') }}" class="d-block mx-auto" alt="..."  style="height: 400px; width: 80%; object-fit:cover; border-radius: 50px;">
      </div>
      <div class="carousel-item" style="background: linear-gradient(to bottom, #f0f0f0 30%, #aff2c485 30%);">
        <img src="{{ asset('images/soccer-home.jpg') }}" class="d-block mx-auto" alt="..."  style="height: 400px; width: 80%; object-fit:cover; border-radius: 50px;">
      </div>
      <div class="carousel-item" style="background: linear-gradient(to bottom, #f0f0f0 30%, #aff2c485 30%);">
        <img src="{{ asset('images/icehockey-home2.avif') }}" class="d-block mx-auto" alt="..." style="height: 400px; width: 80%; object-fit:cover; border-radius: 50px;">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
  
  
<h1 class='display-3 text-center' style="padding: 1rem 2rem;
                border-bottom: 6px double #000;
                background-color: #aff2c485">Your Events</h1>
<div style="width: 95%; margin: auto; margin-bottom: 150px;">
    <div class="row ">
        <div class="col-6">
            <h3 class="ms-5 text-center">As User</h3>
            <hr>

            @forelse ($my_reservations as $reservation)
                <div class="event-card">
                    <a href="{{ route('event-detail.show', $reservation->post->id) }}"><img src="{{ $reservation->post->picture_1 }}" alt="Event Image" class="event-image"></a>
                    <div class="event-content">
                        <div class="event-meta">
                            <span class="event-title">{{\Illuminate\Support\Str::limit($reservation->post->title, 30, '...')}}</span>
                        </div>
                        <div>
                            <span>{{$reservation->post->date}}</span>
                        </div>
                    </div>
                    <div>
                        @if ($reservation->post->like()->where('user_id', Auth::id())->exists())
                            <!-- すでにいいねしてたら、解除ボタンを表示 -->
                            <form action="{{ route('like.destroy', $reservation->post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">
                                    <i class="fa-brands fa-gratipay text-danger fa-2x"><span class="text-dark">{{ $reservation->post->like->count() }}</span></i> <!-- 赤色 -->
                                </button>
                            </form>
                        @else
                            <form action="{{ route('like.store', $reservation->post->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn">
                                    <i class="fa-brands fa-gratipay fa-2x">{{ $reservation->post->like->count() }}</i> <!-- 通常色 -->
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-danger btn-outline-white  btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#delete-{{$reservation->post->id}}">Cancel</button>
                    @include('sponsor.modal.schedule.reserve-delete')                 
                </div>
            @empty
                <h3 class="text-center">
                    No post yet
                </h3>
            @endforelse
        </div>

        <div class="col-6">
            <h3 class="ms-5 text-center">As sponsor</h3>
            <hr>

            @forelse ($my_posts as $post)
                <div class="event-card">
                    <a href="{{ route('event-detail.show', $post->id) }}"><img src="{{ $post->picture_1 }}" alt="Event Image" class="event-image"></a>
                    <div class="event-content">
                        <div class="event-meta">
                            <span class="event-title">{{\Illuminate\Support\Str::limit($post->title, 18, '...')}}</span>
                        </div>
                        <div>
                            <span>{{$post->date}}</span>
                        </div>
                    </div>
                    <div>
                        @if ($post->like()->where('user_id', Auth::id())->exists())
                            <!-- すでにいいねしてたら、解除ボタンを表示 -->
                            <form action="{{ route('like.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">
                                    <i class="fa-brands fa-gratipay text-danger fa-2x"><span class="text-dark">{{ $post->like->count() }}</span></i> <!-- 赤色 -->
                                </button>
                            </form>
                        @else
                            <form action="{{ route('like.store', $post->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn">
                                    <i class="fa-brands fa-gratipay fa-2x">{{ $post->like->count() }}</i> <!-- 通常色 -->
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    @if ($post->reservation->isNotEmpty())
                        <button type="button" class="btn btn-secondary btn-sm" disabled>Delete</button>
                    @else
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $post->id }}">Delete</button>
                        @include('sponsor.modal.schedule.post-delete')
                    @endif
                    <button type="submit" class="btn btn-primary btn-outline-white  btn-sm" data-bs-toggle="modal" data-bs-target="#delete-update-{{ $post->id }}">Edit</button>
                    @include('sponsor.modal.schedule.post-update')                
                    <a class="btn btn-warning btn-outline-white btn-sm" href="{{ route('schedule.participants', $post->id) }}">Participants List ( <span class="fw-bold">{{$post->reservation->count()}}</span> )</a>
                </div>
                <br>
            @empty
                @if (Auth::user()->role_id == 2)
                <h3 class="text-center">
                    Since you are not sponsor, you are not able to post.
                </h3>
                @else
                    <h3 class="text-center">
                        No post yet
                    </h3>
                @endif
            @endforelse
        </div>
    </div>
</div>

<div class="footer d-flex align-items-center justify-content-center" style="position: fixed; width: 100%; background-color: black; bottom: 0; height: 70px;">
    <div class="container">
        
    </div>
</div>

@endsection
