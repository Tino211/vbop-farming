<?php

include_once ('config.php');



   if (mysqli_connect_errno()) {
      // If there is an error with the connection, stop the script and display the error.
      exit('Failed to connect to MySQL: ' . mysqli_connect_error());
   }
   
   if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($link, $_POST['name']);
      $username = mysqli_real_escape_string($link, $_POST['username']);
      $password = mysqli_real_escape_string($link, $_POST['password']);
      $position = mysqli_real_escape_string($link, $_POST['position']);
   
      // Check if the username already exists
      $stmt = $link->prepare('SELECT * FROM user WHERE username = ?');
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $stmt->store_result();
      if ($stmt->num_rows > 0) {
         // Username already exists
         echo 'Username already taken. Please choose another.';
      } else {
         // Hash the password
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   
         // Insert the new user record
         $stmt = $link->prepare('INSERT INTO user (name, username, password, position) VALUES (?, ?, ?, ?)');
         $stmt->bind_param('ssss', $name, $username, $hashed_password, $position);
         if ($stmt->execute()) {
            // Registration successful
            echo 'You have successfully registered! You can now login!';
            header('Location: index.php');
            exit();
         } else {
            // Something went wrong with the database insert
            echo 'Could not register. Please try again later.';
         }
      }
   }
   
   
   
   


   
?>

<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="main/css/font-awesome.min.css">  
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

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
     color : darkgreen;
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

</head>
<body>

<div id="login">  
<div class="form-container">
<font style=" font:bold 44px 'Aleo'; color:#green;"></font>
		<br>

			
			<form action="register.php" method="post" autocomplete="off">
          <h2 class="heading"><center >Vibrant Broiler Operations Program</center></h2>
         <h4><center>Admin Registration<center></h4>
         
				<label for="name">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="name" placeholder="Enter your name" id="name" required>
            
            
            <label for="username">
					<i class="fas fa-lock"></i>
				</label>
            <input type="username" name="username" placeholder=Username id="login" required >

                   	

				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>


				<label for="position">
					<i class="fas fa-lock"></i>
				</label>
            <input type="position" name="position"  placeholder="Position" id="position" required>
				
            <button class="form-btn"  type="submit" name="submit" ><i class="icon-signin icon-large"></i> Register</button>
            <p>Don't have an account? <a href="index.php">Login Now!</a></p>

			</form>
		</div>
</div>
</div>
	</body>
</html>


