<?php 
include('db_connect.php');


session_start();

$id=$_POST["id"];
$name=$_POST["name"];
$username=$_POST["username"];
$password=$_POST["password"];

if(empty($password)){


    $sql = "SELECT * FROM users where id = '$id'";

    $result = mysqli_query($conn, $sql);

   while($row = mysqli_fetch_assoc($result)) {
    
       $change=  $row["password"];
       $faculityid = $row["faculty_id"];
      



       $update= "UPDATE `users` SET `name`='$name',`username`='$username',`password`='$change' WHERE id='$id'";
       $update2= "UPDATE `faculty` SET `name`='$name',`email`='$username',`id`='$faculityid' WHERE id='$faculityid'";


      

       if ($conn->query($update) === TRUE && $conn->query($update2) === TRUE) {
        echo "New record created successfully";
        echo "<script>
             alert('Updated Successfully'); 
             window.history.go(-1);
     </script>";
exit();
       }
     

  }
  

}

        

$password = md5($password);
$update= "UPDATE `users` SET `name`='$name',`username`='$username',`password`='$password' WHERE id='$id'";
  $update2= "UPDATE `faculty` SET `name`='$name',`email`='$username',`id`='$faculityid' WHERE id='$faculityid'";


 

  if ($conn->query($update) === TRUE && $conn->query($update2) === TRUE) {
   echo "New record created successfully";
   echo "<script>
             alert('Updated Successfully'); 
             window.history.go(-1);
     </script>";
exit();
  }





?>