@if($data)
	
	@foreach($data as $value)
		
		<h1> Name : {{ $value->name }}</h1>
		<p>Email : {{ $value->email }}</p>
		@if($value->bio && $value->image)
			<p> Bio : {{ $value->bio }}</p>
			<p>Iamge : {{ $value->image }}</p>
		@endif

	@endforeach

@endif

<div style="list-style-type:none;">{{ $data->links() }}</div>