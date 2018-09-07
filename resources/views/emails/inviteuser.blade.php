<!DOCTYPE html>
<html>
<head>
	<title>You're Invited to Project!</title>
	<link rel="stylesheet" type="text/css" href="{{ asset("/mockfire/css/mdb.css") }}">
  	<link rel="stylesheet" type="text/css" href="{{ asset("/mockfire/css/mdb.min.css") }}">
</head>
<body>
	<h3>Hai {{ $user['name'] }} !</h3>
	<p>Anda telah di invite ke Project <strong>{{ $project['name_project'] }}</strong>. Silahkan klik link dibawah untuk langsung masuk ke dalam project anda.</p>
	<a href="{{ url('/') }}/project/{{ $user['id'] }}/p/{{ $project['id'] }}">{{ url('/') }}/project/{{ $user['id'] }}/p/{{ $project['id'] }}</a>
	<br>
	<br>
	<small>Pesan ini dikirimkan otomatis, mohon untuk tidak membalas.</small>
</body>
</html>