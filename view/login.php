<div id="login" class="form-group">
	
	<h1>
        <span class="badge badge-primary">
			Login
		</span>
	</h1>  
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