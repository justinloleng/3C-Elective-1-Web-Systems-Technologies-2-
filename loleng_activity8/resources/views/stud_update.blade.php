<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
     
        <table>
           <tr>
              <td>Name</td>
              <td>
                 <input type = 'text' name = 'name' 
                    value = '<?php echo $users[0]->name; ?>'/>
              </td>
           </tr>
           <tr>
              <td colspan = '2'>
                 <input type = 'submit' value = "Update student" />
              </td>
           </tr>
        </table>

</body>
</html>