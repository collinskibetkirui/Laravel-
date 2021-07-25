<form action="login" method='POST'>
	@csrf
	<input type="text" name="username" placeholder="usernameame"><br>
		@error('username')
	    	<div class="alert alert-danger">{{ $message }}</div>
		@enderror
	<br>
	<input type="password" name="password" placeholder="password"><br>
		@error('password')
	    	<div class="alert alert-danger">{{ $message }}</div>
		@enderror
	<br>
	<input type="submit" value="Login">
</form>
