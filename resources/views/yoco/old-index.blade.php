<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>payment Yoco</title>
    <!-- Include the Yoco SDK in your web page -->
    <script src="https://js.yoco.com/sdk/v1/yoco-sdk-web.js"></script>
</head>
<body>
    

    <button id="checkout-button">Pay</button>

    <button id="post">POST</button>


<script>
  var yoco = new window.YocoSDK({
    publicKey: 'pk_test_657b29ffyL0dlr389b04',
  });

  var checkoutButton = document.querySelector('#checkout-button');
  checkoutButton.addEventListener('click', function () {
    yoco.showPopup({
      amountInCents: 2799,
      currency: 'ZAR',
      name: 'Your Store or Product',
      description: 'Awesome description',
      callback: function (result) {
        
        // // send token to server
        fetch('http://127.0.0.1:8000/yoco',{
        method: 'POST', 
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(result)
        })
        .then(res => res.json())
        .then(data => console.log(data) )
        .catch(err => console.warn(err))
      }

    })
  });
</script>

</body>
</html>