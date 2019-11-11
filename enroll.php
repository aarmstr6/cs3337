<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New User Enroll</title>
</head>

<body>
	<h1 align="center">
		New User: Please Submit your information
	</h1>
	<form action="insertUser.php" method="post">		
		<table align="center" border="2">
			<tr>
				<td>
					Email
				</td>
				<td>
					<input type="text" name="email">
				</td>
			</tr>
			<tr>
				<td>
					password
				</td>
				<td>
					<input type="text" name="password">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="submit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
