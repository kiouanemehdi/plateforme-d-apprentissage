<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="email_verification" method="POST">
@csrf
        <label>entrer email</label>
        <input type="text" name="email"></input><br>
        <label>confirmer l'email</label>
        <input type="text" name="email_confirm"></input>
         <button type='submit'> choisir </button>           
    </form>
    
</body>
</html>