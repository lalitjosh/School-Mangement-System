<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ProjectApp</title>
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	display: inline-block;
	border: none;
	background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
	background-color: #ddd;
	outline: none;
}

hr {
	border: 1px solid #f1f1f1;
	margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
	background-color: #04AA6D;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 100%;
	opacity: 0.9;
}

button:hover {
	opacity:1;
}



/* Add padding to container elements */
.container {
	padding: 16px;
	margin-left: 295px;
	margin-right: 354px;
}

/* Clear floats */
.clearfix::after {
	content: "";
	clear: both;
	display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
	.cancelbtn, .signupbtn {
		width: 100%;
	}
}
</style>
</head>
<body>

	<form action="{{route('register.save')}}" style="border:1px solid #ccc" method="post">

				@csrf

		<div class="container">
			<h1>Sign Up</h1>
			<p>Please fill in this form to create an account and If you have already an account then Login</p>
			<hr>
             
            <label for="name"><b>Name</b></label>
			<input type="text" placeholder="Enter User Name" name="name" value="{{old('name')}}" >

				@error('name')
				  {{$message}}

				@enderror  

			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" value="{{old('name')}}" >


				@error('email')
				  {{$message}}

				@enderror  

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password"  >


				@error('password')
				  {{$message}}

				@enderror  

			<label for="psw-repeat"><b>Repeat Password</b></label>
			<input type="password" placeholder="Repeat Password" name="psw-repeat" >


				


		

			<div class="clearfix">

				<button type="submit" class="signupbtn">Sign Up</button>
				<button name="" class="btn btn-success" placeholder ="Login"><a href="{{route('login')}}">Login</a>
			</div>
		</div>
	</form>

</body>
</html>