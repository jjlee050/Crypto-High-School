<?php
    Banner::show("https://media.giphy.com/media/BfrOzZpsjfuiQ/giphy.gif");
?>

<div id="login" class="form-group">
	
	<h1> Login </h1>  
	<!-- Test -->
	<form action="login/checkUser" method="post">
		<div class="form-group">
			<label for="name"> Name: </label>
			<input type="text" class="form-control" name="name" />
		</div>
		<div class="form-group">
			<label for="password"> Password: </label>
			<input type="password" class="form-control" name="password" />
		</div>
		<input type="submit" value="Login" class="btn btn-primary"/>
    </form>
</div>