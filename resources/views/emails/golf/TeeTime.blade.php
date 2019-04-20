<!DOCTYPE html>
<html>
<head>
	<title>{{config('name')}}</title>
	<!-- Latest compiled and minified CSS -->
</head>
<body style="background: #f5f8fa;">
	<div style="padding: 22px;width: 859px;border: solid #ddd 1px;margin: auto;">
		<div>
			<center>
				<img src="{{url('')}}/img/demo-logo.png">
			</center>
		</div>
		<div class="container">
			<h2>Golf Play on Data: {{$data['date']}}, Tee Time: {{$data['teetime']}}</h2>
			<h2>Players: {{$data['player']}}</h2>
			<h2>Phone Contact: {{$data['phone']}}</h2>
			<h2>Email Contact: {{$data['email']}}</h2>
			<h2>Message: {{$data['message']}}</h2>		
			<div>
				<h4>Want to play with this program: <a href="{{$data['link']}}">Click to see program details</a></h4>
			</div>
		</div>
	</div>
</body>
</html>