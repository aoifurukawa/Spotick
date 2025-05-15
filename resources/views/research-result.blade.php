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
        margin-left: 40px;
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
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>

    <div class="carousel-inner" data-bs-interval="5000">
      <div class="carousel-item active">
        <img src="{{ asset('images/baseball-home.jpg') }}" class="d-block w-100 img-" alt="..."  style="height: 400px; width: 100%; object-fit:cover;">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/basket-gall.jpg') }}" class="d-block w-100" alt="..."  style="height: 400px; width: 100%; object-fit:cover;">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/soccer-home.jpg') }}" class="d-block w-100" alt="..."  style="height: 400px; width: 100%; object-fit:cover;">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/icehockey-home2.avif') }}" class="d-block w-100" alt="..." style="height: 400px; width: 100%; object-fit:cover;">
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

<div class="container" style="margin: 0 !important;">
    <div class="row">
        <div class="col-3" style="background: linear-gradient(to right, #83bff0, #b0ddf4);">
            <form action="{{ route('events.research') }}" method="get">
                @csrf
                <label for="name" class="form-label fw-bold mt-3">Title</label>
                <input type="text" name="title" id="name" class='form-control mb-3'>

                <label for="venue" class="form-label fw-bold">Venue</label>
                <input type="text" name="venue" id="venue" class='form-control mb-3'>

                <label for="content" class="form-label fw-bold">Content</label>
                <select name="content" id="content" class="form-select mb-3">
                    <option value="" hidden></option>
                    @foreach ($all_content as $content)
                    <option value="{{$content->name}}">{{$content->name}}</option>
                    @endforeach
                </select>

                <label for="selected_date" class="form-label fw-bold">Date</label>
                <input type="date" name="selected_date" id="selected_date" class='form-control mb-3'>

                <label for="date" class="form-label fw-bold">Term</label>
                <input type="date" name="start_term" id="date" class='form-control mb-3'>
                <p class="text-center fw-bold" style="transform: rotate(90deg); font-size: 2rem;">~</p>
                <input type="date" name="end_term" id="date" class='form-control mb-3'>

                <label for="price" class="form-label fw-bold">Max price / per ticket</label>
                <input type="number" name="price" id="price" class='form-control mb-5' min="0" placeholder="$">

                <div class="row text-center mb-3">
                    <div class="col-8">
                        <a href="{{ route('home') }}"><button type="button" class="btn btn-warning btn-outline-white w-75">Reset</button></a>
                    </div>
                    <div class="col-4">
                        <button type="submit" class='btn'><i class="fa-solid fa-magnifying-glass fs-5"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-9">
            <h1 class='display-3  text-center'>All Events</h1>
            <hr>
            @php
                $hasCondition = $title || $venue || $selected_content || $selected_date || ($start_term && $end_term) || ($price);
            @endphp
            @if($hasCondition)
                <h3 class="mx-auto" style="width:85%">
                    <strong>Your Search Condition:</strong><br>
                    @if($title)
                        <span class='text-danger'>Title: {{ $title }}</span><br>
                    @endif
                    @if($venue)
                        <span class='text-primary'>Venue: {{ $venue }}</span><br>
                    @endif
                    @if($selected_content)
                        <span class='text-warning'>Content: {{ $selected_content }}</span><br>
                    @endif
                    @if($selected_date)
                        <span class='text-secondary'>Date: {{ $selected_date }}</span><br>
                    @endif
                    @if($start_term && $end_term)
                        <span class="text-success">Term: {{ $start_term }} ~ {{ $end_term }}</span>
                    @endif
                    @if ($price)
                        <span class="text-info">Max price: {{ $price }}</span>
                    @endif
                </h3>
            @endif
            <hr>

            @forelse ($results as $post)
                <div class="event-card">
                    <a href="{{ route('event-detail.show', $post->id) }}"><img src="{{ $post->picture_1 }}" alt="Event Image" class="event-image"></a>
                    <div class="event-content">
                        <div class="event-meta">
                            <span class="event-title">{{\Illuminate\Support\Str::limit($post->title, 15, '...')}}</span>
                            <span>{{$post->date}} </span>
                            <span>{{\Illuminate\Support\Str::limit($post->venue, 15, '...')}}</span>
                        </div>
                        <p class="event-description"><span class='fw-bold'>Description: </span>{{\Illuminate\Support\Str::limit($post->description, 45, '...')}}</p>
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
            @empty
                <h3 class="text-center">
                    No result
                </h3>
            @endforelse
        </div>
    </div>
</div>

@endsection
