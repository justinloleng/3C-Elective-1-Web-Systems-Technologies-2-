<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="/create" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token()?>">

    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    
    <button type="submit">Submit</button>
    </form>
    
</body>
</html>