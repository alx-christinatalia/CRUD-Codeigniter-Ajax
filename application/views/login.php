<html>
<head>
 	<script src= "<?php echo base_url(); ?>public/jquery-3.1.1.min.js"></script>

<title>Login</title>
<style>

/****** LOGIN MODAL ******/
body  {
	background-image:url(content2/img/a6375f7e275aa000.png);
	position:responsive;
}
#footer{
	background-color:#34495c;	
    background-size: cover;
	position: fixed;
	left: 0;
	bottom: 0;	
	width: 100%;
	height: 50px;
	border-collapse: collapse; 
	font-family:bellota;
	color:white;
	align:center;
	font-size:14px;
}
.loginmodal-container {
  border-collapse:collapse;
  -webkit-border-top-left-radius    : 90px;
  -webkit-border-bottom-right-radius: 40px;
  -webkit-border-bottom-left-radius : 2px;
  -webkit-border-top-right-radius   : 2px;
  border   							: #7f8c8d 6px solid;
  padding  							: 80px;
  max-width							: 350px;
  width    							: 100%;
  background-color					: #F7F7F7;
  margin-left						: 579px;
  margin-top						:-69px;
  box-shadow						: 0px 2px 2px rgba(0, 0, 0, 0.3);
  font-family						: bellota;
  position							:responsive;
}
.loginmodal-container h1 {
  text-align: center;
  font-size: 1.8em;
  font-family: Bellota;
}
.loginmodal-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password]  {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover, input[type=checkbox]:hover {
  
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {

  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
}
</style>
</head>
<link rel ="icon" type ="image/png" href ="content2/img/1641.jpg">
<body>	


		<br><br><br><br><br><br>
	
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1><font face="Bellota">Login your Account</font></h1><br>
				  <form  method= "post" action="cek_login">
					<input type="text" name="user" id="user" style="font-family: Bellota" placeholder="Username" autocomplete="off">
					<input type="password" class="form-password" name="pass" id="pass" style="font-family: Bellota" placeholder="Password" autocomplete="off">
					<input type="checkbox" name="check" class="form-checkbox" style="font-family:Bellota"> Show Password </br><br>
					<input type="submit" name="login" 
					style="font-family: Bellota; font-size:13pt;" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="#" style="font-family:Bellota; font-size:14pt;">Register</a> | 
					<a href="#" style="font-family:Bellota; font-size:14pt;">Forgot Password</a>
				  </div>
				</div>
			</div>
<div id ="footer">
	<center style ="margin-top: 15px;font-weight: none;"> 
	Copyright &#174; 2017 by Alexandria Christina Natalia. All right reserved 
	</center>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
</script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#user").keyup(function(){
				$("#pass").slideDown();
			});
			$("#pass").keyup(function(){
				$("#check").fadeIn();
			});
			});
	</script>
</html>