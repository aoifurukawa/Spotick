@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w-75 mx-auto d-flex mt-5" style="border-radius: 10px; overflow: hidden; border: #000000 solid;">
        <div class="text-white p-3" style="width: 65%;  background: radial-gradient(#473B7B 0%, #3584A7 51%, #30D2BE 100%);">
            <h3 class="text-center">Payment Info</h3>
            <hr class="mb-5" style="border: 3px solid white;">
            <label for="name" class="form-label">Cardholder's Name</label>
            <input type="text" name="name" id="name" class="form-control mb-3">
            <label for="number" class="form-label">Card Number</label>
            <input type="number" name="number" id="number" class="form-control mb-3">
            <div class="row">
                <div class="col-6">
                    <label for="date" class="form-label">Expiry Date</label>
                    <input type="date" name="date" id="date" class="form-control mb-5">
                </div>
                <div class="col-6">
                    <label for="password" class="form-label">CVV</label>
                    <input type="numberd" name="password" id="password" class="form-control mb-5">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-white w-75 d-block mx-auto" style="background-color: #e94d67; border: #000000 solid ;">Pay Now</button>
        </div>
        <div class="p-3" style="width: 35%; background:linear-gradient(-20deg, #beebc3 0%, #5cfcdc9c 100%);">
            <h3 class="text-center">Order</h3>
            <hr class="mb-5" style="border: 3px solid #000000;">
            <img src={{ asset('images/abstract-basketball-watercolor-style-background_1017-39243.jpg') }} alt="" style="width: 80%; height: 155px; border-radius: 10px; border: 1px solid black;" class="d-block mx-auto">
            <hr class="mt-5" style="border: 3px solid #000000;">
            <p><span class="fw-bold">Title:</span>Fan festival for Lakers Fan</p>
            <p><span class="fw-bold">Date:</span>2025/07/31 13:00~15:00</p>
            <p><span class="fw-bold">Price:</span>15$ (for <span class="fw-bold">3</span>)</p>

        </div>
    </div>
</div>
@endsection