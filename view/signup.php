<div id="signup" class="form-group">
	<h1>
        <span class="badge badge-primary">
        	Sign Up
    	</span>  
    </h1>
	<!-- Test -->
	<form action="signup/registerUser" method="post">
		<div class="form-group">
			<label for="name"> Name: </label>
			<input type="text" class="form-control" name="name" />
		</div>
		<div class="form-group">
			<label for="email"> Email: </label>
			<input type="email" class="form-control" name="email" />
		</div>
		<div class="form-group">
			<label for="password"> Password: </label>
			<input type="password" class="form-control" name="password" />
		</div>
		<div class="form-group">
			<label for="confirm_password"> Confirm Password: </label>
			<input type="password" class="form-control" name="confirm_password" />
		</div>
		<input type="submit" value="Register" class="btn btn-primary"/>
    </form>
</div>