<html>
<head>
<title> sign up-Cafeteria Online System </title>
<style>
.error {color: #FF0000;}
body{padding:0;
  margin: 0;
  background: url(1.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  /*opacity: 0.5;
  filter: alpha(opacity=50);*/
  font-family: 'Roboto', sans-serif;
}

input[type=text], select, textarea {
    margin:0px 100px;
    width: 60%;
    padding: 10px 10px;
    border: 1px solid #ccc;
    border-radius: 15px;
    resize: vertical;
}
input[type=email], select, textarea {
    margin:0px 100px;
    width: 60%;
    padding: 10px 10px;
    border: 1px solid #ccc;
    border-radius: 15px;
    resize: vertical;
}
input[type=tel], select, textarea {
    margin:0px 100px;
    width: 60%;
    padding: 10px 10px;
    border: 1px solid #ccc;
    border-radius: 15px;
    resize: vertical;
}
input[type=password], select, textarea {
    margin:0px 100px;
    width: 60%;
    padding: 10px 10px;
    border: 1px solid #ccc;
    border-radius: 15px;
    resize: vertical;
}
input[type=submit] {
    font-family:verdana;
    width:30%;
    margin: 5px 180px;
    background-color: grey;
    color: white;
    padding: 8px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    /*float: right;*/
}

input[type=submit]:hover {
    background-color: grey;
}

.container {
    margin: 230px 700px;
    width: 30%;
    border-radius: 5px;
    background-color: black;
    opacity: 0.7;
    filter: alpha(opacity=50);
    padding: 10px;
}
/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
<body>

  <?php
  $usernameErr = $student_idErr = $phone_noErr = $emailErr = $passwordErr = $cpasswordErr = "";
  $username = $student_id  = $phone_no = $email = $password = $cpassword = $website = "";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["username"])){
      $usernameErr="* Name is required";
    } else {
        $username=test_input($_POST["username"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$username)){
          $usernameErr="* Only letters and white space allowed";
        }
    }

    if (empty($_POST["student_id"])) {
    $student_idErr = "* Student ID is required";
  } else {
    $student_id = test_input($_POST["student_id"]);
    if (!preg_match("/^[a-zA-Z]*$/",$student_id)) {
      $student_idErr = "* Invalid ID format";
    }
  }

  if (empty($_POST["phone_no"])) {
  $phone_noErr = "* Phone No. is required";
} else {
  $phone_noErr = test_input($_POST["phone_no"]);
  if (preg_match("/^[a-zA-Z]*$/",$phone_no)) {
    $phone_noErr = "* Invalid Phone no. format";
  }
}

if (empty($_POST["email"])) {
  $emailErr = "Email is required";
} else {
  $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
}
  if (empty($_POST["password"])) {
  $password = "* password is required";
} else {
  $password = test_input($_POST["password"]);
//  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //  $passwordErr = "Invalid password format";
//  }
}
if (empty($_POST["cpassword"])) {
$cpassword = "* Confirmation of password is required";
} else {
$cpassword = test_input($_POST["cpassword"]);
if (!filter_var($cpassword== $password)) {
  $cpasswordErr = "* Your Password doesn't match";
  }
 }
}
function test_input($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
?>

<div class="container">
  <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

   <p style="color:white">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Name<br>
    <input type="text"  name="username"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <span class="error"><?php echo $usernameErr;?></span><br><br>

    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbspStudent ID<br>
  <input type="tel"  name="student_id" maxlength="10"><br>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <span class="error"><?php echo $student_idErr;?></span><br><br>

  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbspPhone No.<br>
<input type="tel"  name="phone_no" maxlength="10"><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<span class="error"><?php echo $phone_noErr;?></span><br><br>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbspEmail-ID<br>
    <input type="text"  name="email"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <span class="error"><?php echo $emailErr;?></span><br><br>

    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbspPassword<br>
    <input type="password"  name="password"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <span class="error"><?php echo $password;?></span><br><br>

    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbspConfirm Password<br>
      <input type="password"  name="cpassword"><br>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <span class="error"><?php echo $cpassword;?></span><br><br>

    <input type="submit" value="Create Account">
  </form>
</div>
</body>
</html>
