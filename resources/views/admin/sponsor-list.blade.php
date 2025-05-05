@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin-user-list.css') }}">
<body style="background:linear-gradient(-20deg, #f8cbcb 0%, #bedffb9c 100%); height: 100vh;">
    <div class="container">
        <div class="row mx-auto mt-3">
            <h1>Sponsor list</h1>
            <hr>
            <div class="col-3">
                <table class="" style="">
                    <tbody class="">
                        <tr>
                            <td style="background-color: #e68c8c;" class=" text-center fw-bold"><a href="{{ route('admin.sponsors') }}" class="text-dark text-decoration-none">Sponsor</a></td>
                        </tr>
                        <tr>
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="{{ route('admin.users') }}" class="text-dark text-decoration-none">User</a></td>
                        </tr>
                        <tr>
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="{{ route('admin.contents') }}" class="text-dark text-decoration-none">Content</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="col-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 20%">Icon</th>
                            <th style="width: 40%">Name</th>
                            <th style="width: 40%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($all_sponsors as $sponsor)
                        <tr>
                            <td>
                                @if ($sponsor->avatar)
                                    <img src={{ $sponsor->avatar }} alt="" style="height: 45px; width: 45px; border-radius: 50%; border: 1px solid black">

                                @else
                                    <img src={{ asset('images/doll.png') }} alt="" style="height: 20%; width: 20%; border-radius: 50%; border: 1px solid black">
                                @endif
                            </td>
                            <td class="align-middle">{{$sponsor->name}}</td>
                            <td>
                                <a href="{{ route('admin.sponsor-info.show', $sponsor->id) }}" class="btn btn-primary btn-outline-white">show</a>
                                <button type="submit" class="btn btn-danger">Hide</button>
                                <button type="submit" class="btn btn-danger">Unhide</button>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
@endsection