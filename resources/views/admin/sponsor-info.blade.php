@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h3>Profile</h3>
    <hr>
        <div class="row">
            <div class="col-6">
                <h4>About {{$sponsor->name}}</h4>
                <hr>
                <label for="avatar" class="form-label d-block mb-3">Avatar</label>
                @if ($sponsor->avatar)
                    <img src={{ $sponsor->avatar }} alt="" style="height: 195px; width: 195px; border-radius: 50%; border: 1px solid black" class="mb-4">
                @else
                <img src={{ asset('images/doll.png') }} alt="" style="height: 195px; width: 195px; border-radius: 50%; border: 1px solid black" class="mb-4">
                @endif

                <input class="form-control mb-3" type="file" id="formFile" name="avatar" disabled>
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name" id="name" class="form-control mb-3" value='{{ old('name', $sponsor->name) }}' disabled>
                <label for="role" class="form-label">Role</label>
                <select name="role_id" id="role" class="form-select mb-3" disabled>
                    @if ($sponsor->role_id == 1)
                        <option value="">Administrator</option>
                    @else
                        <option value="">Sponsor</option>
                    @endif
                </select>
                @error('role_id')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-3" value='{{ old('password', $sponsor->password) }}' disabled>
            </div>

            <div class="col-6">
                <h4>Contact Information</h4>
                <hr>
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control mb-3" value='{{ old('email', $sponsor->email) }}' disabled>
                <label for="phone" class="form-label">Phone Number</label>
                <input type="number" name="phone_number" id="phone" class="form-control mb-3" value='{{ old('phone_number', $sponsor->phone_number) }}' disabled>

                <h4>Residence Information</h4>
                <hr>
                <label for="country" class="form-label">Country</label>
                <select name="country" id="cuntry" class="form-select mb-3" disabled>
                    <option value="">{{$sponsor->country}}</option>
                </select>
                <label for="zip-code" class="form-label">Zip Code</label>
                <input type="number" name="zip_code" id="zip-code" class="form-control mb-3" value='{{ old('zip_code', $sponsor->zip_code) }}' disabled>
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control mb-3" value='{{ old('address', $sponsor->address) }}' disabled>
                <label for="air_port" class="form-label">Air Port (you often use)</label>
                <input type="text" name="airport" id="air_port" class="form-control mb-3" value='{{ old('air_port', $sponsor->airport) }}' disabled>
            </div>
        </div>
</div>
@endsection
