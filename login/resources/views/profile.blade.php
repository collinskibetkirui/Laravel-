@include('partials.header')
<title>Home</title>
<h1>Profile</h1>
<h3> Welcome, {{ session('data')['username'] }} </h3>

<hr>
{{ session('status') }}

<form action="" method='get'>
	<input type="text" placeholder="add post" name="post">
	<button type="submit">Post</button>
</form>
<hr>
<br>

<form action="fileupload" method='POST' enctype="multipart/form-data">
	<input type="file" name="image" />
	@csrf
	<button type="submit">Post Image</button>
</form>

<br>
<br>

@include('partials.footer')
