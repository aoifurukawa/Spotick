@extends('layouts.app')

@section('content')
<div style="background: linear-gradient(-20deg, #e6a8e0 0%, #b3f0da 100%); padding-top: 20px;">
    {{-- main picture --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner" style="height: 400px; width: 86%; border-radius: 20px; border: 5px solid black; margin: auto; object-fit: fill;">
          <div class="carousel-item active">
            <img src="{{ asset('images/abstract-basketball-watercolor-style-background_1017-39243.jpg') }}" class="d-block w-100 img-" alt="..." style="">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/basketball-court.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/fan-festival.jpg') }}" class="d-block w-100" alt="...">
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
                        <span class="fw-bold">Description: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt consectetur tenetur animi odit, quidem mollitia eum quam tempore maiores aliquam natus assumenda, sequi expedita, blanditiis enim? Laudantium dolores laborum dolorum tempore vitae iusto distinctio eveniet voluptates ipsum excepturi nesciunt, quam optio modi ex eaque recusandae quas maiores harum dicta, mollitia amet! Perspiciatis repudiandae recusandae pariatur debitis quidem, mollitia qui aliquid eaque saepe aut fugit nostrum tempora amet assumenda quo eveniet sequi excepturi. Esse voluptatum nam quasi cumque assumenda excepturi ipsa dolores, enim sapiente, minima ullam, sit itaque? Libero nisi quod, consectetur accusamus expedita ut. Iste commodi laboriosam minima delectus. Atque.
                    </div>
                </div>

                <div class="card mt-3" style="border-radius: 20px; margin-bottom: 150px;">
                    <div class="card-body" style="border: 5px solid black; border-radius: 20px; ">
                        <div class="row">
                            <div class="col-3">
                                
                            </div>
                            <div class="col-9">
                                <p><span class="fw-bold">Location: </span>Dogers Stadium</p>
                                <p><span class="fw-bold">Date: </span>2025/08/05/3:00pm</p>
                                <p><span class="fw-bold">Sponsor's Name: </span>Aoi Furukawa</p>
                                <p><span class="fw-bold">Sponsor's Email: </span>furukawaaoi0728@gmail.com</p>
                                <a href=""><i class="fa-brands fa-facebook"></i></a>
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                                <a href=""><i class="fa-brands fa-x-twitter"></i></a>
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
                    <h1 class="text-white display-2">Title</h1>
                </div>
                <div class="col-2 text-center">
                    <button type="button" class="btn btn-dark btn-outline-light">Book</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection