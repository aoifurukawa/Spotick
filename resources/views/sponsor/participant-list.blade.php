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
                            <img src="https://pa-tu.work/storage/img/posts/64d402879466e.jpg">
                        </li>
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d40287b1635.jpg">
                        </li>
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d40287be1db.jpg">
                        </li>
                    </ul>
                    <ul class="slider-list" style="list-style: none;">
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d402879466e.jpg">
                        </li>
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d40287b1635.jpg">
                        </li>
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d40287be1db.jpg">
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-9">
            <h2 class="mt-3">Fan festival for Lakes</h3>
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
                    <tr>
                        <td>1</td>
                        <td>Aoi Furukawa</td>
                        <td>furukawaaoi0728@gmail.com</td>
                        <td>2</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Aoi Furukawa</td>
                        <td>furukawaaoi0728@gmail.com</td>
                        <td>2</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Aoi Furukawa</td>
                        <td>furukawaaoi0728@gmail.com</td>
                        <td>2</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Aoi Furukawa</td>
                        <td>furukawaaoi0728@gmail.com</td>
                        <td>2</td>
                    </tr>
                </t-body>
            </table>
        </div>

        {{-- <div class="col-3">
            <div class="contain">
                <div class="slider">
                    <ul class="slider-list" style="transform: translateY(-121px); list-style: none;">
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d402879466e.jpg">
                        </li>
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d40287b1635.jpg">
                        </li>
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d40287be1db.jpg">
                        </li>
                    </ul>
                    <ul class="slider-list" style="list-style: none;">
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d402879466e.jpg">
                        </li>
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d40287b1635.jpg">
                        </li>
                        <li class="slider-item">
                            <img src="https://pa-tu.work/storage/img/posts/64d40287be1db.jpg">
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
{{-- </div> --}}
@endsection
