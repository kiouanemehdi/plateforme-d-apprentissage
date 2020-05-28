<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" methode="POST">
@csrf
    <p>email doit avoir le domaine : <?php echo "edu.".$domain; ?><br>
        <label>entrer email</label>
        <input name="email">
         <button type='submit'> choisir </button>           
    </form>
    
</body>
</html>