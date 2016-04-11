<html>
<head>
	<title></title>
</head>
<body>
	Here's your session<Br>

	<br>
		{{$user_sess->name}}<br>
		{{$user_sess->role}}
	

	<br><br>
	<form action="{{ url("out") }}" method="POST">
		{!! csrf_field() !!}
		<input type="submit" value="LOGOUT"/>
	</form>
</body>
</html>


