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
                            <td style="background-color: #ddd;" class="text-center fw-bold"><a href="{{ route('admin.payments') }}" class="text-dark text-decoration-none">Payment</a></td>
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
                            <td class="{{ $sponsor->trashed() ? 'bg-secondary text-muted' : '' }}">
                                @if ($sponsor->avatar)
                                    <img src={{ $sponsor->avatar }} alt="" style="height: 45px; width: 45px; border-radius: 50%; border: 1px solid black">

                                @else
                                    <img src={{ asset('images/doll.png') }} alt="" style="height: 20%; width: 20%; border-radius: 50%; border: 1px solid black">
                                @endif
                            </td>
                            <td class="align-middle {{ $sponsor->trashed() ? 'bg-secondary text-muted' : '' }}">{{$sponsor->name}}</td>
                            <td class="{{ $sponsor->trashed() ? 'bg-secondary text-muted' : '' }}">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('admin.sponsor-info.show', $sponsor->id) }}" class="btn btn-primary btn-outline-white me-2">show</a>

                                    @if (Auth::user()->id !== $sponsor->id)
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>

                                            <div class="dropdown-menu">
                                                @if ($sponsor->trashed())
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#activate-user-{{$sponsor->id}}">
                                                        <i class="fa-solid fa-user-checked"></i> Activate {{$sponsor->name}}
                                                    </button>
                                                @else
                                                    <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{$sponsor->id}}">
                                                        <i class="fa-solid fa-user-slash"></i> Deactivate {{$sponsor->name}}
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        @include('admin.modal.status')
                                    @endif
                                </div>
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