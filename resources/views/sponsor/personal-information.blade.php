@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h3>Register</h3>
    <hr>
    <form action="" method="post">
        <div class="row">
            <div class="col-6">
                <h4>About You</h4>
                <hr>
                <label for="avatar" class="form-label d-block mb-3">Avatar</label>
                <img src={{ asset('images/smiling-photo.avif') }} alt="" style="height: 195px; width: 195px; border-radius: 50%; border: 1px solid black" class="mb-4">
                <input class="form-control mb-3" type="file" id="formFile">
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name" id="name" class="form-control mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select mb-3">
                    <option value="" hidden></option>
                    <option value="">Sponsor</option>
                    <option value="">User</option>
                </select>
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-3">
            </div>

            <div class="col-6">
                <h4>Contact Information</h4>
                <hr>
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="number" name="phone" id="phone" class="form-control mb-3">

                <h4>Residence Information</h4>
                <hr>
                <label for="country" class="form-label">Country</label>
                <select name="country" id="cuntry" class="form-select mb-3">
                    <option value="" hidden></option>
                    <option value="">Japan</option>
                    <option value="">US</option>
                    <option value="">UK</option>
                    <option value="">Cananda</option>
                </select>
                <label for="zip-code" class="form-label">Zip Code</label>
                <input type="number" name="zip-code" id="zip-code" class="form-control mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control mb-3">
                <label for="address" class="form-label">Air Port (you often use)</label>
                <input type="text" name="address" id="address" class="form-control mb-3">
                <div class="row" style="margin-top: 47px;">
                    <div class="col-6"><button type="submit" class="btn btn-primary w-100"><span>Update </span></button></div>
                    <div class="col-6"><button type="submit" class="btn btn-danger w-100"><span>Cancel </span></button></div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
