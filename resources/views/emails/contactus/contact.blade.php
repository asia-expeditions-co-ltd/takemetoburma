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
				<img src="http://golftravelmyanmar.com/img/demo-logo.png" width="60px">
			</center>
		</div>
		<div class="container">
			<h2>Email : {{$data['email']}}</h2>
			<h2>Contact Phone: {{$data['phone']}}</h2>
			<h2>Message: {{$data['message']}}</h2>
			<h2>Traveling Date: {{date('Y-M-d',strtotime($data['date']))}}</h2>
			<h2>No. Pax: {{$data['pax']}}</h2>
			<h2>Program Name: {{$data['title']}}</h2>
			<h4>Preview Details on click this link: <a href="{{$data['url']}}">{{$data['title']}}</a></h4>
			<hr>
		</div>
	</div>
</body>
</html>