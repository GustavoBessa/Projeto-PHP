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
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Visão Geral </a>
    <a href="inserir.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Cadastro </a>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
          <?php
              include 'mysqlconn.php';
              $sql = "SELECT * FROM feeds WHERE type = 'Mensagem'";
              $result = mysqli_query($conn, $sql);

              echo mysqli_num_rows($result);
              mysqli_close($conn);
            ?> 
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Mensagens</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-bell w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
            <?php
              include 'mysqlconn.php';
              $sql = "SELECT * FROM feeds WHERE type = 'Alerta'";
              $result = mysqli_query($conn, $sql);

              echo mysqli_num_rows($result);
              mysqli_close($conn);
            ?> 
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Alertas</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
            <?php
              include 'mysqlconn.php';
              $sql = "SELECT * FROM feeds WHERE type = 'Compartilhamento'";
              $result = mysqli_query($conn, $sql);

              echo mysqli_num_rows($result);
              mysqli_close($conn);
            ?> 
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Compartilhamentos</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
          <?php
              include 'mysqlconn.php';
              $sql = "SELECT * FROM users";
              $result = mysqli_query($conn, $sql);

              echo mysqli_num_rows($result);
              mysqli_close($conn);
            ?> 
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5>Feeds</h5>
        <table class="w3-table w3-striped w3-white">
        <?php
              include 'mysqlconn.php';
              $sql = "SELECT * FROM feeds";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)) {
                if($row['type']=="Mensagem"){
                  $style="fa fa-comment w3-text-blue w3-large";
                }
                if($row['type']=="Alerta"){
                  $style="fa fa-bell w3-text-red w3-large";
                }
                echo "
                <tr>
                  <td><i class='".$style."'></i></td>
                  <td>".$row['feed']."</td>
                  <td>".$row["date"]."</td>
                ";
              }
              //echo mysqli_num_rows($result);
              mysqli_close($conn);
            ?> 
          <tr>
            <td><i class="fa fa-user w3-text-orange w3-large"></i></td>
            <td>Exemplo HTML</td>
            <td><i>10 mins</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>Mensagens</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-blue" style="width:0%">0%</div>
    </div>

    <p>Alertas</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:0%">0%</div>
    </div>

    <p>Compartilhamentos</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:0%">0%</div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
    <li class='w3-padding-18'>
      <img src="https://m.media-amazon.com/images/M/MV5BMjQyNzM2MjM1Ml5BMl5BanBnXkFtZTcwMDE5NjI3Mg@@._V1_FMjpg_UX1000_.jpg" class="w3-left w3-margin-right" style="width:50px; height:50px; object-fit:cover;">
      <h4>Adam (Exemplo HTML)</h4>
    </li>
    <?php
      include 'mysqlconn.php';
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        echo "
        <li class='w3-padding-18'>
          <img src='".$row["user_img"]."' class='w3-left w3-margin-right' style='width:50px; height:50px; object-fit:cover;'/>
          <h4>".$row['name']."</h4>
        ";
      }
      mysqli_close($conn);
    ?>
      
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Comentários</h5>
    <?php
      include 'mysqlconn.php';
      $sql = "SELECT * FROM `comments`";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
        $id_user = $row['id_user'];
        $sqluser = "SELECT * FROM users WHERE id_user = $id_user";
        $result2 = mysqli_query($conn, $sqluser);
        $row2 = mysqli_fetch_assoc($result2);
        echo "
        <div class='w3-row'>
          <div class='w3-col m2 text-center'>
            <img src='".$row2['user_img']."' class='w3-left' style='width:96px;height:96px;object-fit:cover;'>
          </div>
          <div class='w3-col m10 w3-container'>
            <h4> ".$row2['name']." <span class='w3-opacity w3-medium'>".$row['date']."</span></h4>
            <p>".$row['comentario']."</p><br>
          </div>
        </div>

        ";
      }
      mysqli_close($conn);
    ?>
    
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img src="https://m.media-amazon.com/images/M/MV5BMjQyNzM2MjM1Ml5BMl5BanBnXkFtZTcwMDE5NjI3Mg@@._V1_FMjpg_UX1000_.jpg" class="w3-left" style="width:96px;height:96px;object-fit:cover;">
      </div>
      <div class="w3-col m10 w3-container">
        <h4> Adam (Exemplo HTML) <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><br>
      </div>
    </div>
  </div>
  <br>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-dark-grey">
    <h4>Projeto PHP Itacoatiara</h4>
    <p>Powered by <b>Bemol Digital</b></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
