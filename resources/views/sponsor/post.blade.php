@extends('layouts.app')

@section('title', 'post')

@section('content')
<body style="background: url('{{ asset('images/cheering-picture.avif') }}') no-repeat center center fixed; background-size: cover;">
    <form action="" method="post" enctype="multipart/form-data">
    @csrf
        <div class="container mt-5">
            <div class="card w-75 mx-auto" style="opacity: 0.95;">
                <div class="card-header" style="background-color: #000">
                    <h3 class="text-center" style="color: #fff">Input your event data</h3>
                </div>

                <div class="card-body" style="height: 450px; overflow-y: auto; border: 1px solid #ccc; background-color: rgba(221, 221, 221, 0.9);">
                    <div class="row">
                        <div class="col-8">
                            <label for="title" class='form-label fw-bold'>Title of event</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="content" class="form-label fw-bold">Content</label>
                            <select name="" id="content" class="form-select">
                                <option value=""></option>
                                <option value="">match</option>
                                <option value="">Fan festival</option>
                            </select>
                        </div>
                    </div>

                    <label for="description" class="form-label fw-bold mt-3">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    <div class="row">
                        <div class="col-4">
                            <label for="date" class="form-label fw-bold mt-3">Date</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="price" class="form-label fw-bold mt-3">Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="$">
                        </div>
                        <div class="col-4">
                            <label for="number" class="form-label fw-bold mt-3">Number of tickets</label>
                            <input type="number" name="number" id="number" class="form-control">
                        </div>
                    </div>

                    <label for="venue" class='form-label fw-bold mt-3'>Venue</label>
                    <input type="text" name="venue" id="venue" class="form-control">

                    <label for="adress" class='form-label fw-bold mt-3'>Adress</label>
                    <input type="text" name="adress" id="adress" class="form-control">

                    <div class="row">
                        <div class="col-4">
                            <label for="picture" class="form-label fw-bold mt-3">Picture 1</label>
                            <input class="form-control mb-3" type="file" id="formFile" name="picture_1">
                        </div>
                        <div class="col-4">
                            <label for="picture" class="form-label fw-bold mt-3">Picture 2</label>
                            <input class="form-control mb-3" type="file" id="formFile" name="picture_2">
                        </div>
                        <div class="col-4">
                            <label for="picture" class="form-label fw-bold mt-3">Picture 3</label>
                            <input class="form-control mb-3" type="file" id="formFile" name="picture_3">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="background-color" class="form-label fw-bold mt-3">Background-color</label>
                            <select name="background-color" id="background-color" class="form-select">
                                <option value="" hidden>Grey</option>
                                <option value="">red</option>
                                <option value="">blue</option>
                            </select>
                        </div>
                    </div>

                    <label for="your-name" class="form-label fw-bold mt-3">Your Name</label>
                    <input type="text" name="name" id="your-name" class="form-control">

                    <label for="email" class="form-label fw-bold mt-3">Mail Adress</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <label for="insta" class="form-label fw-bold mt-3">Instagram Account URL</label>
                    <input type="url" name="insta" id="insta" class="form-control">

                    <label for="facebook" class="form-label fw-bold mt-3">FaceBook Account URL</label>
                    <input type="url" name="facebook" id="facebook" class="form-control">

                    <label for="X" class="form-label fw-bold mt-3">X Account URL</label>
                    <input type="url" name="X" id="X" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn mt-5 w-25 mx-auto d-block" style="background-color: #61d7bd">Post</button>
        </div>
    </form>
</body>
@endsection