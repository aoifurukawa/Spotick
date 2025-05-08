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
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="{{ route('admin.sponsors') }}" class="text-dark text-decoration-none">Sponsor</a></td>
                        </tr>
                        <tr>
                            <td style="background-color: #ddd;" class=" text-center fw-bold"><a href="{{ route('admin.users') }}" class="text-dark text-decoration-none">User</a></td>
                        </tr>
                        <tr>
                            <td style="background-color: #b0eff0;" class=" text-center fw-bold"><a href="{{ route('admin.contents') }}" class="text-dark text-decoration-none">Content</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="col-9">
                <form action="{{ route('admin.content.store') }}" method="post">
                    @csrf
                    <div class="row w-75 mx-auto mb-3">
                        <div class="col-10">
                            <input type="text" name="name" id="content" class="form-control">
                        </div>
                        @error('content')
                            <p>add content</p>
                        @enderror
                        
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
                        @forelse ($all_contents as $content)
                            <tr>
                                <td>{{$content->id}}</td>
                                <td>{{$content->name}}</td>
                                <td>
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#content-edit-{{ $content->id }}">Edit</button>
                                    @include('admin.modal.content-edit')
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#content-delete-{{ $content->id }}">Delete</button>
                                    @include('admin.modal.content-delete')
                                </td>
                            </tr>
                        @empty
                            <p class="fw-bold">No content yet</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
@endsection
