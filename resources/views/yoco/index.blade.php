<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trash payment Yoco</title>
    <link rel="stylesheet" href={{ asset("css/style.css") }}>
    <script src="https://js.yoco.com/sdk/v1/yoco-sdk-web.js"></script>
    <script src={{ asset("js/app.js") }} defer ></script>
</head>
<body>
    

  <form id="payment-form" method="POST">
    <div class="one-liner">
      <div id="card-frame">
        <!-- Yoco Inline form will be added here -->
      </div>
      <button id="pay-button">
        checkout with YOCO
      </button>
    </div>
    <p class="success-payment-message"> </p>
  </form>
</body>
</html>

