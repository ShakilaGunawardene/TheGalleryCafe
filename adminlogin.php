<?php
    include_once 'header2.php';

    $host="localhost";
    $login="root";
    $password="";
    $db="thegallerycafe_login";

    $data=mysqli_connect($host,$login,$password,$db);

    if($data===false){
        die("connection error");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $name = $_POST['uid'];

        $pass = $_POST['pwd'];

        $sql="select * from login where usersName='".$name."'AND password='".$pass."'";

        $result=mysqli_query($data,$sql);
        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="admin")
        {
            header("location:admin.php");
        }
        else
        {
            echo "userName or password do not match";
        }
    }

    

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
   max-width: 50rem;
   background-color: var(--bg-color);
   border-radius: .5rem;
   padding:2rem;
   margin:0 auto;
   margin-top: 8rem;
}

.form h1{
   font-size: 2.5rem;
   margin-bottom: 1rem;
   color:#04AA6D; /* Green */;
   text-transform: uppercase;
   text-align: center;
}
.form h3{
   font-size: 1.5rem;
   margin-bottom: 1rem;
   color:blueviolet;
   text-transform: uppercase;
   text-align: center;
}
.form .box{
   text-transform: none;
   padding:1rem 1.2rem;
   font-size: 1rem;
   color:#04AA6D; /* Green */;
   border-radius: .5rem;
   background-color: var(--white);
   margin:1rem 0;
   width: 90%;
}

.form .bttn {
  background-color: #04AA6D; /* Green */
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

    <h3>Admin Login</h3>

<form action="#" method="post"

<form action="include/login.inc.php" method="post">
<input type="text" id="fname" name="uid" placeholder="Username" class="box">
<input type="password" id="lname" name="pwd" placeholder="Password" class="box">
<button name="submit" type="submit" class="bttn">Login</button>

</form>
<p> Staff Member ? <a href="stafflogin.php">staff member</a></p>
</div>


  
<?php
    include_once 'footer.php';
?>