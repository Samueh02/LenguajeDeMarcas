<?php
    
    $dbhost="bx6upwoiubkc4felso1w-mysql.services.clever-cloud.com";
    $dbuser="uflpbetwquqnmjoz";
    $dbpass="apjpBAssEuhauYy6mUP";
    $dbname="bx6upwoiubkc4felso1w";

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn)
    {
        die("No hay conexion:" .mysqli_connect_error());
    }


    $nombre=$_POST["usuario"];
    $pass=$_POST["pass"];
    $email=$_POST["email"];
    
    //LOGIN
    if(isset($_POST["btningresar"])){

        $query = mysqli_query($conn,"SELECT * FROM paginaweb WHERE usuario ='$nombre' AND password = '$pass'");
        $nr = mysqli_num_rows($query);
        if($nr==1){
            echo "<script>alert('Bienvenido $nombre');window.location='clubes.html'</script>";
        }else{
            echo "<script>alert('Usuario no valido');window.location='index.html'</script>";
        }
    }

    //REGISTRAR
    if(isset($_POST["btnregistrar"])){
       $sqlgrabar = "INSERT INTO paginaweb(usuario, email ,password) value ('$nombre','$email','$pass')";
       if(mysqli_query($conn,$sqlgrabar)){
            echo "<script>alert('Usuario registrado con exito: $nombre');window.location='index.html'</script>";
       }else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        } 
    }

    
?>