@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-user-list.css') }}">

<body style="background:linear-gradient(-20deg, #f8c3c0 0%, #c6fcba 100%); height: 100vh;">
    <div class="container">
        <div class="row mx-auto mt-3">
            <h1>Content list</h1>
            <hr>
            <div class="col-3">
                <table class="" style="">
                    <tbody class="">
                        <tr>
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="" class="text-dark text-decoration-none">Sponsor</a></td>
                        </tr>
                        <tr>
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="" class="text-dark text-decoration-none">User</a></td>
                        </tr>
                        <tr>
                            <td style="background-color: #b0eff0;" class=" text-center fw-bold"><a href="" class="text-dark text-decoration-none">Content</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="col-9">
                <form action="" method="post">
                    <div class="row w-75 mx-auto mb-3">
                        <div class="col-10">
                            <input type="text" name="content" id="content" class="form-control">
                        </div>
                        
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 20%">id</th>
                            <th style="width: 40%">Name</th>
                            <th style="width: 40%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Aoi Furukawa</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Aoi Furukawa</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Aoi Furukawa</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Aoi Furukawa</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Aoi Furukawa</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Aoi Furukawa</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Aoi Furukawa</td>
                            <td>
                                <button type="submit" class="btn btn-danger">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
@endsection
