<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="https://assets.edlin.app/favicon/favicon.ico">

  <link rel="stylesheet" href="https://assets.edlin.app/bootstrap/v5.3/bootstrap.css">

  <script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.client_id')}}&currency=USD&intent=capture"></script>

  <!-- Title -->
  <title>PayPal Laravel</title>
</head>
<body>
<div class="container text-center">
  <div class="row mt-3">
    <div class="col-12">
      <img src="https://assets.edlin.app/logo/codewithross/logo-symbol-dark.png" height='100' alt="Ross Edlin Logo"/>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-12">
      <h1>{{$post_info->title}}</h1>
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-12">
      <div class="links h5">
        @if ($booked_user->role_id == 1||3)
          <a class="text-decoration-none mx-3" href="{{ route('home') }}" target="_blank" style="color: #99FFFF">Home</a>
          <a class="text-decoration-none mx-3" href="{{ route('sponsor.post') }}" target="_blank" style="color: #f5cb60">Post</a>
          <a class="text-decoration-none mx-3" href="{{ route('reservation.show') }}" target="_blank" style="color: #FF99FF">schedule</a>
        @else
          <a class="text-decoration-none mx-3" href="{{ route('home') }}" target="_blank" style="color: #99FFFF">Home</a>
          <a class="text-decoration-none mx-3" href="{{ route('reservation.show') }}" target="_blank" style="color: #FF99FF">schedule</a>
        @endif
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12">
      <img src="{{ $post_info->picture_1 }}" alt="" style="border: 4px solid #3498db;
                                                          border-radius: 15px;
                                                          width: 300px;
                                                          height: 200px;" class="">

      <div class="row mt-3" id="paypal-success" style="display: none;">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="alert alert-success" role="alert">
            You have successfully sent me money! Thank you!
          </div>
        </div>
      </div>

      <form action="{{ route('payment.store') }}" style="display: none" id="paypal_store" method="post">
        @csrf
        <input type="text" value="{{ $booked_user->id }}" name="user_id">
        <input type="text" value="{{ $post_info->id }}" name="post_id">
        <input type="number" value="{{ $number_of_tickets }}" name="number_of_tickets">
        <input type="number" value="{{ $post_info->price*$number_of_tickets }}" name="amount">
      </form>

      <div class="row mt-3">
        <div class="col-12 col-lg-6 offset-lg-3">
          <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="text"
                   class="form-control"
                   id="paypal-amount"
                   value="{{ $post_info->price*$number_of_tickets }}"
                   aria-label="Amount (to the nearest pound)"
                   disabled>
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-12 col-lg-6 offset-lg-3" id="payment_options"></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 mb-3">
      Made with love, by <a href="https://www.rossedlin.com/" target="_blank">Ross Edlin</a> from <a
        href="https://www.codewithross.com/" target="_blank">Code with Ross</a>.
    </div>
  </div>
</div>
</body>
<script>
  paypal.Buttons({
    createOrder: function () {
      return fetch("/create/" + document.getElementById("paypal-amount").value)
        .then((response) => response.text())
        .then((id) => {
          return id;
        });
    },

    onApprove: function () {
      return fetch("/complete", {method: "post", headers: {"X-CSRF-Token": '{{csrf_token()}}'}})
        .then((response) => response.json())
        .then((order_details) => {
          console.log(order_details);
          document.getElementById("paypal-success").style.display = 'block';
          document.getElementById("paypal_store").submit();
          //paypal_buttons.close();
        })
        .catch((error) => {
          console.log(error);
        });
    },

    onCancel: function (data) {
      //todo
    },

    onError: function (err) {
      //todo
      console.log(err);
    }
  }).render('#payment_options');
</script>
</html>