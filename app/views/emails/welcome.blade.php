<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Test</h2>

		<div>
			Hallo {{ $username }},<br><br>

			Bitte aktiviere deinen Account mit folgendem Link. <br><br>

			<a href="{{ $link }}"/> {{ $link }} </a> <br>
		</div>
	</body>
</html>
