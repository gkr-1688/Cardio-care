
<?php
session_start();
 $email= $password = "";
    require "config/conn.php";
 
 
  if( isset($_SESSION['user'])){
                            
        //header("Location: index.html");
      }
       
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        
        $email = (string) ($_POST["email"]);
        $password = (string) ($_POST["password"]);
        $password=md5($password);

        //database
      
    
        

  
          $sql ="SELECT * FROM user where email='$email'";
          $varr=mysqli_query($conn,$sql);
          
      

          if(mysqli_num_rows($varr)!=0){
          // echo $varr2["lastName"];
        

        $varr2 =mysqli_fetch_assoc($varr);
        //  storing user data in variable....................
          if($password==$varr2['password']){
              $_SESSION['user']=$varr2;
              $_SESSION['email']=$email;
              header("Location: index.html");
 
      
         }
         else{
           echo "<h3 style='color:#f35b5c' > incorrect password </h3>";
         }
      }
       else{
           echo "<h3 style='color:#f35b5c' > account not found </h3>";
         }
    
    }
     
    

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
       $email=$gender = $password1=$password2 = $phone= "";

    
    $email = ($_POST["email"]);
  
   
    $password1 =($_POST["password1"]);
    $password2 = ($_POST["password2"]);
    echo $email." ===".$password1."=====".$password2;
    
    if($password1 ==$password2 ) {
      
      

      $qr = "SELECT * from `user` where email= '$email' ";
      $r = mysqli_query($conn, $qr);
      $result = mysqli_fetch_all($r, MYSQLI_ASSOC);
      //var_dump($result);

      if ($result) {
        echo "h3 style='color:#f35b5c' > email already exists </h3>";
        }
      else{

        $password2=md5($password2);  //hashing paswword in database
    
      
       // echo $password2;

        $otp=rand(100000,999999);
        echo $otp;
        
        $_SESSION["conf_otp"]=$otp;
        $_SESSION["email"]=$email;
       
        

      /*  {
          sendEmail($email,"your otp for tripzilaa acount is: $otp");
         
          }
        catch(Exception $error){
        var_dump($error);
        }

        */

        
        

      
      $sql ="INSERT INTO user (email,password)VALUES ('$email','$password2')";

      if (mysqli_query($conn,$sql) ) {
        //echo "New record created successfully";
    }
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


  }
  
  

  
}
else{
  echo "<h3 style='color:#f35b5c'> password not matched</h3>";
}

}
      
     
    
    

?>
  


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: -webkit-linear-gradient(left, #000000,  #000000);
}
::selection{
  background: #fa4299;
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 5px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 5px;
  background: -webkit-linear-gradient(left, #00FF7F,  #32CD32);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #fc83bb;
   box-shadow: inset 0 0 3px #fb6aae; 
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #32CD32;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #32CD32;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #00FF7F, #32CD32, #00FF7F, #32CD32);
  border-radius: 5px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}

    </style>
    <title>CardoCare</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Please Login</div>
<div class="title signup">Signup</div>
</div>
<div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login" >Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab">
</div>
</div>
<div class="form-inner">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="login">
            <div class="field">
              <input type="Email" name='email' placeholder="Email Address" required>
            </div>
<div class="field">
              <input type="password" name="password" placeholder="Password" required>
            </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
<div class="field btn">
              <div class="btn-layer">
</div>
<input   type="submit" name='login' value="Login">
            </div>
<div class="signup-link">
Not a member? <a href="">Signup now</a></div>
</form>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="signup">
            <div class="field">
              <input type="Email" name='email' placeholder="Email Address" required>
            </div>
<div class="field">
              <input type="password" name='password1' placeholder="Password" required>
            </div>
<div class="field">
              <input type="password" name='password2' placeholder="Confirm password" required>
            </div>
<div class="field btn">
              <div class="btn-layer">
</div>
<input type="submit" name='signup' value="Signup">
            </div>
</form>
</div>
</div>
</div>
<script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>

  </body>
</html>
