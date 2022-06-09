<?php

include 'db.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$rol = $_POST['rol'];
$status = $_POST['status'];
$query = "INSERT INTO usuarios (nombre, email, usuario, password, rol,status) 
    VALUES ('$nombre', '$email', '$usuario', '$password',$rol,$status)";

//if role is equal to 0, then it is a client
//if($rol == 0){
  //$saving = "INSERT INTO savings(ID_owner,Balance) VALUES ( ,100)";
    //$saving_query = mysqli_query($conexion, $saving);
    

$verificarCorreo = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email = '$email'");
$verificarUsuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usuario'");

if (mysqli_num_rows($verificarCorreo) > 0){

    echo '
            <script>
                alert("You already have a registered account with that email!");
                windows.location.href:"create.php";
            </script>
        ';
 //? header('location:create.php');
    exit();

}
if (mysqli_num_rows($verificarUsuario) > 0){

    echo '
            <script>
                alert("The Username is Already Taken!")
            </script>
        ';
    exit();
}


$ejecutar = mysqli_query($conexion,$query);
//$ejecutar2 = mysqli_query($conexion,$saving);

if($ejecutar){
    echo '
            <script>
                alert("User created successfully!")
                //go back to admin page
                window.location:"admin.php";
            </script>
        
        ';
}else{
    echo '
            <script>
                alert("Oh no! Something went wrong!")
                  window.location:"admin.php";

            </script>
        
        ';

}

mysqli_close($conexion);
?>