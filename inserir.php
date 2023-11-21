<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Visão Geral </a>
    <a href="inserir.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Cadastro </a>
    </div>
</nav>
<div class="w3-main" style="margin-left:300px;margin-top:43px; padding:15px">
    <h4>Cadastrar usuário:</h4>
    <table>
        <form action="inserir.php?tipo=users" method="post">
            <tr>
                <td style="width:150px">Nome:</td> 
                <td><input type="text" name="name"></td>
            </tr>
            <tr>   
                <td style="width:150px">Imagem de perfil:</td>
                <td><input type="text" name="user_img"></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
            </tr>
        </form>
    </table>
    <br>
    <h4>Adicionar Comentário:</h4>
    <table>
        <form action="inserir.php?tipo=comments" method="post">
            <tr>
                <td style="width:150px">Usuario: </td>
                <td><input type="text" name="id_user"></td>
            </tr>
            <tr>
                <td style="width:150px">Comentario:</td>
                <td><textarea type="textbox" name="comentario"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
            </tr>
        </form>
    </table><br>
    <h4>Adicionar Feed:</h4>
    <table>
        <form action="inserir.php?tipo=feeds" method="post">
            <tr>
                <td style="width:150px">Feed: </td>
                <td><input type="text" name="feed"></td>
            </tr>
            <tr>
                <td style="width:150px">Tipo:</td>
                <td><select name="type" style="width:100%">
                    <option>Alerta</option>
                    <option>Mensagem</option>
                </select></td>
            </tr>
            <tr>
                <td><input type="submit"></td>
            </tr>
        </form>
    </table>
    <?php
    
    function cadastroUser(){
        include 'mysqlconn.php';
        $name = $_POST["name"];
        $user_img = $_POST["user_img"];
        $sql = "INSERT INTO users (name, user_img)
            VALUES ('".$name."', '".$user_img."')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Usuário Cadastrado")</script>'; 
        }
        mysqli_close($conn);
    }
    function cadastroComment(){
        include 'mysqlconn.php';
        $id_user = $_POST["id_user"];
        $comentario = $_POST["comentario"];
        $sql = "INSERT INTO comments (id_user, comentario)
            VALUES ('".$id_user."', '".$comentario."')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Comentário Enviado")</script>'; 
        }
        mysqli_close($conn);
    }
    function cadastroFeed(){
        include 'mysqlconn.php';
        $feed = $_POST["feed"];
        $type = $_POST["type"];
        $sql = "INSERT INTO feeds (feed, type)
            VALUES ('".$feed."', '".$type."')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Feed Enviado")</script>'; 
        }
        mysqli_close($conn);
    }



    if(isset($_GET["tipo"])){
        $tipo_cadastro = $_GET["tipo"];
        switch($tipo_cadastro){
            case "users":
                cadastroUser();
                break;
            case "comments":
                cadastroComment();
                break;
            case "feeds":
                cadastroFeed();
                break;
        }
    }
    ?>
    <?php

    ?>
</div>
</body>
</html>