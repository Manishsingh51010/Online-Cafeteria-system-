<?php
 $username=filter_input(INPUT_POST,'username');
 $student_id=filter_input(INPUT_POST,'student_id');
 $phone_no=filter_input(INPUT_POST,'phone_no');
 $email=filter_input(INPUT_POST,'email');
 $password=filter_input(INPUT_POST,'password');
 if(!empty($student_id)){
 if(!empty($username)){
     if(!empty($phone_no)){
      if(!empty($email)){
        if(!empty($password)){
          $host = "localhost";
          $dbusername = "root";
          $dbpassword = "";
          $dbname="signup_user";
          $conn = new mysqli ($host, $dbusername, $dbpassword,$dbname);
          if(mysqli_connect_error()){
          die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
      else{
          $sql = "INSERT INTO signup (username,student_id,phone_no,email,password) values ('$username','$student_id','$phone_no','$email','$password')";
           if($conn->query($sql))
             echo "New record is inserted successfully";
           else
             echo "Error:".$sql."<br>".$conn->error;
         }
    $conn->close();
}
        else
         echo "Please fill the Password";
         die();
        }
      else
        echo "Please fill your Email_id";
        die();
      }
      else
       echo "Please fill your Phone number";
       die();
     }
    else
      echo "Please fill your student_id";
      die();
    }
    else
    echo "Please fill your username";
    die();
?>
