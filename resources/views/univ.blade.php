<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 

<h1>listes des universites</h1>
    <form action="email" method="POST">
        @csrf
        <label>choisissez votre univeriste</label>
        <select name="domain">
            <?php foreach ($univs as $univ ){ ?>
            <option  value="<?php echo $univ['domain']; ?>"> <?php echo $univ['nom'] ;?> </option>
            <?php } ?>
        </select>
         <button type='submit'> choisir </button>           
    </form>
</body> 
</html>