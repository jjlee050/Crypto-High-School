<?php 
  Session::start();
  $username = Session::getSession("username");
?>
<script>
  $(document).ready(function(){
    var username = "<?php echo $username; ?>";
    if (username) {
      $("#register").hide();
      $("#login").hide();
      $("#loggedIn").show();
    } else {
      $("#register").show();
      $("#login").show();
      $("#loggedIn").hide();
    }
  });
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="main">CryptoFaucet</a>
  <ul class="navbar-nav">
    <li id="login" class="nav-item">
      <a class="nav-link" href='login'>Login</a>
    </li>
    <li id="register" class="nav-item">
      <a class="nav-link" href='signup' title='Register'>Register</a>
    </li>
    <li id="loggedIn" class="nav-item dropdown float-left">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="dashboard">Dashboard</a>
          <a class="dropdown-item" href="faucet">Faucet</a>
          <a class="dropdown-item" href="#">Gacha</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href='login/logout' title='logout'>Logout</a>
        </div>
      </li>
  </ul>
</div>