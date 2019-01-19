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
      $("#logout").show();
    } else {
      $("#register").show();
      $("#login").show();
      $("#logout").hide();
    }
  });
</script>
<nav class="navbar navbar-dark bg-dark">
  <ul class="nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href='main' title='Home'>Home</a>
    </li>
    <li id="login" class="nav-item">
      <a class="nav-link" href='login'>Login</a>
    </li>
    <li id="register" class="nav-item">
      <a class="nav-link" href='signup' title='Register'>Register</a>
    </li>
    <li id="logout" class="nav-item">
      <a class="nav-link" href='login/logout' title='logout'>Logout</a>
    </li>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </ul>
</div>