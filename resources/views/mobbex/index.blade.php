<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mobbex</title>
</head>
<body>
    <h6>Mobbex checkout</h6>
    <form action="/mobbex/checkout" method="POST">
        @csrf
        <div>
            <input type="number" name="total" value="100" placeholder="total" required>
            <br>
            <input type="text" name="description" value="dummy description" placeholder="description" required >
            <br>
            <input type="text" name="currency" value="ARS" placeholder="currency" required>
            <br>
            <input type="text" name="reference" value="dummy description" placeholder="reference" required >
            <br>
            <button type="submit" @if($checkout ?? ''  ) disabled @endif >Checkout</button>
        </div>
    </form>



    @if($checkout->result ?? '')

        <span>currency : {{ $checkout->data->currency }}</span>
        <br>
        <span>description: {{ $checkout->data->description }}</span>
        <br>
        <br>
        <span>total {{ $checkout->data->total }} : <button><a href={{ $checkout->data->url }}>pay</a></button> </span>
    
    @endif


</body>
</html>