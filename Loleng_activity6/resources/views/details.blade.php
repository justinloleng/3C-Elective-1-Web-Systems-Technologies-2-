<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Details</h1>
    <li><a href="{{route('customer')}}">customer</a> </li>
        <li><a href="{{route('item')}}">item</a> </li>
            <li> <a href="{{route('order')}}">order</a> </li>
                <li> <a href="{{route('details')}}">details</a> </li>
    
    </li>
    <p>Transaction No: {{ $transNo ?? '' }}</p>
    <p>Order No: {{ $orderNo ?? '' }}</p>
    <p>Item ID: {{ $itemId ?? '' }}</p>
    <p>Name: {{ $name ?? '' }}</p>
    <p>Price: {{ $price ?? '' }}</p>
    <p>Quantity: {{ $qty ?? '' }}</p>
</body>
</html>