<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color: #e2edf6; " >
<div >
<center >
    <div style="width: 50%; border: 1px solid black; margin-top:100px; border-radius: 25px;background-color: white; ">

<h1>Choisie Votre Université</h1>
    <form action="email" method="POST">
        @csrf
        <label style="font-size: 20px;margin-top: 50px; padding-right: 200px;">Université List : </label>
        <select name="domain" class="form-control" style="width: 50%;  ">
            <?php foreach ($univs as $univ ){ ?>
            <option  value="<?php echo $univ['ID_univ']; ?>"> <?php echo $univ['nom'] ;?> </option>
            <?php } ?>
        </select>
         <button type='submit' class="btn btn-primary" style="margin-top:20px; " > choisir </button>           
    </form>
</body> 

</div>
</center>
</div> 
</html>