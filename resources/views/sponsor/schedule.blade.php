@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
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

<div class="container" style="margin: 0 !important;">
    <div class="row">
        <div class="col-3" style="background: linear-gradient(to right, #c29df0, #ddbff9);">
            <form action="" method="POST">
                <label for="name" class="form-label fw-bold mt-3">Name</label>
                <input type="text" name="name" id="name" class='form-control mb-3'>

                <label for="name" class="form-label fw-bold">Location</label>
                <input type="text" name="name" id="name" class='form-control mb-3'>

                <label for="content" class="form-label fw-bold">Content</label>
                <select name="content" id="content" class="form-select mb-3">
                    <option value="" hidden></option>
                    <option value="">match</option>
                    <option value="">Fan festival</option>
                </select>

                <label for="date" class="form-label fw-bold">Date</label>
                <input type="date" name="date" id="date" class='form-control mb-3'>


                <label for="date" class="form-label fw-bold">Term</label>
                <input type="date" name="date" id="date" class='form-control mb-3'>
                <p class="text-center fw-bold" style="transform: rotate(90deg); font-size: 2rem;">~</p>
                <input type="date" name="date" id="date" class='form-control mb-3'>

                <label for="price" class="form-label fw-bold">Max price</label>
                <input type="number" name="price" id="price" class='form-control mb-5' min="0" placeholder="$">

                <button type="submit" class='btn float-end'><i class="fa-solid fa-magnifying-glass fs-5"></i></button>

            </form>
        </div>

        <div class="col-9">
            <div class="row align-items-center">
                <div class="col-10">
                    <h1 class='display-3  text-center'>Your Events</h1>
                </div>

                <div class="col-2">
                    <button type="submit" class="btn">
                        <select name="" id="" class="form-select">
                            <option value="">Date</option>
                            <option value="">Popular</option>
                        </select>
                    </button>
                </div>
            </div>

            <div class="my-event" style="margin-bottom: 50px;">
                <div class="event-card">
                    <img src="{{ asset('images/abstract-basketball-watercolor-style-background_1017-39243.jpg') }}" alt="Event Image" class="event-image">
                    <div class="event-content">
                        <div class="event-meta">
                            <span class="event-title">Dogers vs Yankees</span>
                            <span>2025/07/29</span>
                            <span>Dogers Stadium</span>
                        </div>
                        <p class="event-description">Description: In this event, you can enjoy your......</p>
                    </div>
                    <div>
                        <span class="heart-icon">❤️11</span>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-1">
                        <button type="submit" class="btn fw-bold border border-dark" style="background-color: #ddd">Page</button>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn fw-bold border border-dark" style="background-color: #ddd">Participant</button>
                    </div>
                    <div class="col-1">

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
