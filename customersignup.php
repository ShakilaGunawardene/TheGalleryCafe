<?php
    include_once 'header1.php';
?> 
<head>
    <style>
        body {
            background-image: url('images/22.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

.form{
   max-width: 40rem;
   background-color: var(--bg-colorb);
   border-radius: .5rem;
   padding:2rem;
   margin:0 auto;
   margin-top: 5rem;
}

.form h1{
   font-size: 2.5rem;
   margin-bottom: 1rem;
   color:#04AA6D; ;
   text-transform: uppercase;
   text-align: center;
   
}
.form .box{
   text-transform: none;
   padding:0.8rem 1.2rem;
   font-size: 1rem;
   font-weight: 600;
   color: black; 
   border-radius: .5rem;
   background-color: var(--white);
   margin:0.5rem 0;
   width: 90%;
}

.form .bttn {
  background-color: #04AA6D; 
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
}


</style>
</head>
<div class="form">
    <h1>The Gallery Cafe </h1>

<form action="include/customersignup.inc.php" method="post">
<input type="text" id="fname" name="name" placeholder="Name" class="box" required>
<input type="email" id="fname" name="email" placeholder="Email" class="box" required>
<input type="password" id="lname" name="pwd" placeholder="Password" class="box" required>
<input type="password" id="fname" name="pwdrepeat" placeholder="Confirm Password" class="box" required>
<button name="submit" type="submit" class="bttn">Register</button>
</form>
<p>All Ready Have an Account? <a href="customerlogin.php">Login</a></p>


</div>




  
<?php
    include_once 'footer.php';
?>