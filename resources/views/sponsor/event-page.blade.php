@extends('layouts.app')

@section('content')
<div style="background-color: {{ $post_detail->background_color }};">
    {{-- main picture --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner" style="height: 400px;  object-fit: fill;">
          <div class="carousel-item active">
            <img src="{{ $post_detail->picture_1 }}" class="d-block w-100 img-" alt="..." style="object-fit:cover;">
          </div>
          <div class="carousel-item">
            <img src="{{ $post_detail->picture_2 }}" class="d-block w-100" alt="..." style="object-fit:cover;">
          </div>
          <div class="carousel-item">
            <img src="{{ $post_detail->picture_3 }}" class="d-block w-100" alt="..." style="object-fit:cover;">
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

      {{-- description --}}
      <div class="container">
        <div class="row mt-3">
            <div class="col-7">
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body" style="border: 5px solid black; border-radius: 20px; ">
                        <span class="fw-bold">Description: </span>{{ $post_detail->description }}
                    </div>
                </div>

                <div class="card mt-3" style="border-radius: 20px; margin-bottom: 150px;">
                    <div class="card-body" style="border: 5px solid black; border-radius: 20px; ">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <img src="{{ $post_detail->user->avatar }}" alt="" style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid black" class="">
                            </div>
                            <div class="col-9">
                                <p><span class="fw-bold">Venue: </span>{{$post_detail->venue}}</p>
                                <p><span class="fw-bold">Date: </span>{{$post_detail->date}}</p>
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
            <div class="col-5">
                <div class="card" style="margin-bottom: 150px; border-radius: 20px;">
                    <div class="card-body" style="border: 5px solid black; border-radius: 20px; ">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore sint laudantium maxime quae molestiae pariatur suscipit aperiam, quod doloribus voluptate in odio ad, recusandae at similique quos eos, dignissimos provident sequi cum commodi expedita! Et facilis temporibus praesentium debitis ullam inventore labore quae molestias obcaecati quasi esse sapiente quod sequi culpa nostrum officia nesciunt, tempore repudiandae fugiat voluptates? Quis laborum repellendus blanditiis ipsam incidunt temporibus dignissimos eos asperiores officiis quas nostrum ratione nam odit enim, quibusdam vel eius, illum voluptatibus natus totam mollitia, doloribus molestias ipsum. Unde quaerat eum veniam? Distinctio ad quo exercitationem eos similique eum, minima ut. Assumenda fugiat mollitia, impedit quis labore, explicabo sit deleniti nisi doloribus laboriosam ipsa quaerat amet dolorum nihil, voluptatibus asperiores eligendi ab repellendus quo quod voluptatum repudiandae. Adipisci, neque non aspernatur fuga laudantium sint esse sapiente rem omnis est alias voluptas illo a. Reiciendis odio maxime voluptatibus error distinctio aperiam, quis animi?
                    </div>
                </div>
            </div>
        </div>
      </div>


      {{-- footer --}}
      <div class="footer d-flex align-items-center justify-content-center" style="position: fixed; width: 100%; background-color: black; bottom: 0; height: 100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10 text-center">
                    <h1 class="text-white" style='white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                max-width: 100%;'>{{$post_detail->title}}</h1>
                </div>
                <form action="{{ route('reservation.store', $post_detail->id) }}" method="post">
                    @csrf
                    <div class="col-2 text-center">
                        <button type="submit" class="btn btn-dark btn-outline-light">Reserve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection