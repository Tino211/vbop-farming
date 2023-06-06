<?php
	//Start session
	session_start();
   session_unset();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
  

   if (isset($_SESSION['SESS_MEMBER_ID'])){
      header("Location:main/index.php");
      exit();
   }

   //include database connectivity

   include_once('config.php');

   if (isset($_POST['submit'])){
      $errmsg_arr = "";

      $username = $_POST['username'];
      $password = $_POST['password'];

     

     // Check if the username and password are correct
      $query = "SELECT * FROM user where username='$username' and password='$password'";
      $result = mysqli_query($link, $query);

      if(mysqli_num_rows($result) == 1){
         $row = mysqli_fetch_assoc($result);
         $_SESSION["user_id"] = $row["user_id"];
         header("location:sites.php");
      }else{
         $error = "Your login name and password is invalid";
      
      }
   





   if (!empty($username)  ||  !empty($password)) {
      $query = "SELECT * FROM user WHERE username = '$username'";
      $result = $link-> query($query);
      if ($result->num_rows > 0){
         $member = $result->fetch_assoc();
         $_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_LAST_NAME'] = $member['position'];
         header("Location:main/index.php");
         die();
      }else{
         $errmsg_arr = "No Admin found with this username";
      }
   }else{
      $errmsg_arr = "Username or password is required";
   }
}

?>
<html>
<head>
<title>
VBOP:: Vibrant Broiler Operations Programme
</title>
    <link rel="shortcut icon" href="main/images/pos.jpg">

   <!-- <link href="main/css/bootstrap.css" rel="stylesheet"> -->

   <!-- <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
   -->
  <link rel="stylesheet" href="main/css/font-awesome.min.css">  
    <style type="text/css">
      body {
		
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

	  *{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}

.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#356;
}

.container .content h3 span{
   background: crimson;
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:crimson;
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: crimson;
}

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: green;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #green;
   color:darkgreen;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}
.form-container form .heading{
   color: darkgreen;
}

.form-container form .form-btn:hover{
   background: green;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:darkgreen;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
    </style>


    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container-fluid">
      <div class="row-fluid">
		<div class="span4">
		</div>
	
</div>
<div id="login">
<?php
/* if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']); */
//}
if (isset($errmsg_arr)){
?> 
<div class="alert alert-danger alert-dismissable">
   <button type="button" class="close" data-dismiss="alert"> &times;</button>
   <?php echo $errmsg_arr; ?>
</div>
<?php  } ?>

<div class="form-container">
<form action="" method="POST">
<h2 class="heading"><center >Vibrant Broiler Operations Program</center></h2>
         <h4><center>Admin Signin-form<center></h4>
         
			
		
<div class="input-prepend">
		<input  style="height:40px;" id="login" type="text" name="username" Placeholder="Username" required /><br>
</div>

<div class="input-prepend">
	<input type="password" style="height:40px;" name="password" Placeholder="Password" required/><br>
</div>

		
		 <button class="form-btn" href="dashboard.html" name="submit" type="submit"><i class="icon-signin icon-large"></i> Login</button>
		 <p>Don't have an account? <a href="register.php">Register Now!</a></p>
</div>
		 </form>
</div>
</div>
</div>
</div>
</body>
</html>