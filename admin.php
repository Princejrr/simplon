<?php


session_start();

$conn = mysqli_connect('localhost', 'root', '', 'login') or die("connexion échouée");




?>

<DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Admin Simplon CI</title>

<meta name="description" content="La description visible sur les moteurs de recherche">
</head>
<body>
    <form action="admin.php" method="post">
<nav class="navbar navbar-light justity-content-center fs-3 mb-5" style="background-color: #00ff5573">
          Admin Simplon
</nav>
<div class="container">

<div class="text-center mb-4">
    <h3>Connexion Administrateur</h3>
    <p class="text-muted">Remplissez les champs </p>
    <div class="container d-flex justity-content-center">
    <form action="" method="post" style="width: 50vw; min-width: 300px;">
    <div class="row mb-3">
        <div class="col">
            <label class="from-label">
              Admin :  
            </label>
            <input type="text" class="form-control" placeholder="votre Pseudo" name="admin" required>
        </div>

        <div class="mb-3">
            <label class="from-label">
              Mot de passe :  
            </label>
            <input type="password" class="form-control" placeholder="votre Mot de Passe" name="password" required>
        </div>

</br> <button type ="submit" class="btn btn-success" name="submit" >Envoyez</button>
</br> <a href="inscription.php">Devenir un admin?</a>
</form>

<?php
if(isset($_POST['submit'])){
  $admin = $_POST['admin'];
  $password = $_POST['password'];
  $select = mysqli_query($conn, "SELECT * FROM users WHERE admin = '$admin' AND password = '$password'");
  $row = mysqli_fetch_array($select);
  
  if(is_array($row)){
    $_SESSION["admin"] = $row["admin"];
    $_SESSION["password"] = $row["password"];
  } else{
    echo'<script type= "text/javascript">';
    echo'alert("Admin ou mot de passe invalide")';
    echo'window.location.href ="admin.php"';
    echo'</script>';
  }
}
if(isset($_SESSION["admin"])){
  header('Location:index.php');
}



?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>