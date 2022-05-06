<?php
include('database.php');
if(isset($_POST['create'])){
 
      $msg=insert_data($connection);
      
}
// insert query
function insert_data($connection){
   
      $full_name= legal_input($_POST['fname']);
      $email_address= legal_input($_POST['lname']);
      $city = legal_input($_POST['Image']);
      
      $query="INSERT INTO submit (fname,lname,Image) VALUES ('$full_name','$email_address','$city')";
      $exec= mysqli_query($connection,$query);
      if($exec){
        $msg="Data was created sucessfully";
        return $msg;
      
      }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
      }
}
// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>