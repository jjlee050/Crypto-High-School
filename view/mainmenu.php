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
      $(".loggedIn").show();
    } else {
      $("#register").show();
      $("#login").show();
      $(".loggedIn").hide();
    }
  });
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="main">CryptoFaucet</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li id="login" class="nav-item">
        <a class="nav-link" href='login'>Login</a>
      </li>
      <li id="register" class="nav-item">
        <a class="nav-link" href='signup' title='Register'>Register</a>
      </li>
      <li class="loggedIn nav-item">
        <a class="nav-link" href="dashboard">Dashboard</a>
      </li>
      <li class="loggedIn nav-item">
        <a class="nav-link" href="faucet">Faucet</a>
      </li>
      <li class="loggedIn nav-item">
        <a class="nav-link" href="#">Gacha</a>
      </li>
      <li class="loggedIn nav-item">
        <a class="nav-link" href='login/logout' title='logout'>Logout</a>
      </li>
    </ul>
  </div>
</nav>