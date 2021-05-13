<?php
require "config/conn.php";  

session_start();
if(isset($_SESSION['email']))
  $email= $_SESSION['email'];
else
  header("Location: login.php");


$sql="SELECT * FROM state where email='$email' ";
 $varr=mysqli_query($conn,$sql);
          
    //var_dump($varr);  

          if(mysqli_num_rows($varr)!=0){
          // echo $varr2["lastName"];
        

        $varr2 =mysqli_fetch_all($varr);
        
      }
      //var_dump($varr2);
     
      
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

table,th, td {
  text-align: center;
  padding: 8px;
  border:1px solid black;
}

tr:nth-child(even){
  background-color: #C9A0DC;
  color: #214FC6;
  }


tr:nth-child(odd){
  background-color: #FFE4CD;
  color: #214FC6;
  }

th {
  background-color: #CCFF00;
  color: #2E2D88;
  height: 70px;
}

table {
  width: 100%;
}
body {
  color: #FEFEFA;
  background-color: #FBE7B2;
}

button {
  background-color: #76D7EA;
  color: #58427C;
}
</style>
</head>
<body>

<h2> Record of<strong>CARDIO</strong><i>STATE</i></h2>

<table>
  <tr>
    <th><B>DATE</B></th>
    <th><strong>RISK</strong></th>
  </tr>

  <?php
foreach ($varr2 as &$value){
  echo"
  <tr>
    <td>$value[2]</td>
    <td>$value[1] % </td>
  
  ";
}
?>
</table><br><br><center>
<button><a href="index.html">HOME</a></button></center>
<style >
  #footer {
  background: #222831;
  padding: 60px 0 40px;
}
#footer .section-title {
  color: rgba(255, 255, 255, 0.8);
}
#footer .contact-info {
  margin: 0 0 60px 0;
  padding: 0;
}
#footer .contact-info li {
  list-style: none;
  margin: 0 0 20px 0;
  position: relative;
  padding-left: 40px;
}
#footer .contact-info li i {
  position: absolute;
  top: 5px;
  left: 0;
  font-size: 22px;
  color: rgba(255, 255, 255, 0.7);
}
#footer .contact-info li a {
  color: rgba(255, 255, 255, 0.6);
}
#footer .contact-form .form-group input[type="name"],
#footer .contact-form .form-group input[type="text"],
#footer .contact-form .form-group input[type="email"],
#footer .contact-form .form-group textarea {
  font-size: 16px;
}
#footer .contact-form .form-group input[type="name"]::-webkit-input-placeholder,
#footer .contact-form .form-group input[type="text"]::-webkit-input-placeholder,
#footer .contact-form .form-group input[type="email"]::-webkit-input-placeholder,
#footer .contact-form .form-group textarea::-webkit-input-placeholder {
  color: rgba(255, 255, 255, 0.5);
}
#footer .contact-form .form-group input[type="name"]:-moz-placeholder,
#footer .contact-form .form-group input[type="text"]:-moz-placeholder,
#footer .contact-form .form-group input[type="email"]:-moz-placeholder,
#footer .contact-form .form-group textarea:-moz-placeholder {
  /* Firefox 18- */
  color: rgba(255, 255, 255, 0.5);
}
#footer .contact-form .form-group input[type="name"]::-moz-placeholder,
#footer .contact-form .form-group input[type="text"]::-moz-placeholder,
#footer .contact-form .form-group input[type="email"]::-moz-placeholder,
#footer .contact-form .form-group textarea::-moz-placeholder {
  /* Firefox 19+ */
  color: rgba(255, 255, 255, 0.5);
}
#footer .contact-form .form-group input[type="name"]:-ms-input-placeholder,
#footer .contact-form .form-group input[type="text"]:-ms-input-placeholder,
#footer .contact-form .form-group input[type="email"]:-ms-input-placeholder,
#footer .contact-form .form-group textarea:-ms-input-placeholder {
  color: rgba(255, 255, 255, 0.5);
}
#footer .contact-form .form-group input {
  color: rgba(255, 255, 255, 0.5);
  background: transparent;
  border: none;
  background: rgba(0, 0, 0, 0.2);
  box-shadow: none;
}
#footer .contact-form .form-group textarea {
  color: rgba(255, 255, 255, 0.5);
  background: transparent;
  border: none;
  background: rgba(0, 0, 0, 0.2);
  box-shadow: none;
}
#footer #btn-submit {
  color: rgba(255, 255, 255, 0.9) !important;
  background: #4CB648 !important;
}
#footer .copy-right {
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding-top: 50px;
  margin-top: 50px;
}
#footer .copy-right p {
  color: rgba(255, 255, 255, 0.3);
  letter-spacing: 1px;
  font-size: 14px;
  text-transform: uppercase;
}
#footer .copy-right p a {
  color: rgba(255, 255, 255, 0.5);
}

</style>
<footer>
      <div id="footer">
        <div class="container">
          <div class="row">

              </p><center>
              <p>Copyright 2016  All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by  kondareddy and anupam </p>
              </center>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>
