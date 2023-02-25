<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>projectApp</title>
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box}
.section2{
             
             display: inline-block;
             position: relative;
             left: 34px;

           }
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


	      @if ($message = Session::get('error'))
		   		<div class="alert alert-danger alert-block">
		    		<button type="button" class="close" data-dismiss="alert">×</button>
		    			<strong>{{ $message }}</strong>
		   		</div>
		  
		  @endif

    
		   @if (count($errors) > 0)
		    
		    <div class="alert alert-danger">
		     		<ul>
		     				@foreach($errors->all() as $error)
		      					<li>{{ $error }}</li>
		     				
		     				@endforeach
		     		</ul>
		    </div>
		   
		   @endif


     
	<form action="{{route('login.save')}}" style="border:1px solid #ccc" method="post">

				{{ csrf_field() }}

		<div class="container">
			<h1>Login</h1>
			<p>Please fill in this form to Login and If you donot have then register</p>
			<hr>
             
           

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

			

				


		

			<div class="clearfix">
                
		    <button type="submit" class="signupbtn">Log in</button>
		   <button name="" class="btn btn-success" placeholder ="Register"><a href="{{route('register')}}">Register</a>
		   </button>
			</div> 
		</div>
	</form>

</body>
</html>