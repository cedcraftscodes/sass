

<?php 



function secure($text){
  return htmlspecialchars(stripcslashes(strip_tags(trim($text))));
}

include 'connect.php';


$response = array();
if(isset($_POST['username']) 
  && isset($_POST['password']) 
  && isset($_POST['fname']) 
  && isset($_POST['mname']) 
  && isset($_POST['lname'])
  && isset($_POST['contact'])
  && isset($_POST['address']))
{


  $uname = secure($_POST['username']);
  $pass = md5(secure($_POST['password']));
  $fname = secure($_POST['fname']);
  $mname = secure($_POST['mname']);
  $lname = secure($_POST['lname']);
  $contact = secure($_POST['contact']);
  $address = secure($_POST['address']);


  $stmt = $conn->prepare("SELECT * FROM `tblusers` WHERE `username`=:uname");
  $stmt->bindParam("uname", $uname) ;
  $stmt->execute();

  $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  $count=$stmt->rowCount();
  $data=$stmt->fetch();

  if($count > 0)
  {
      $code = "reg_failed";
      $message = "Username already exist!";
      array_push($response, array("code"=>$code, "message"=>$message));
      echo json_encode($response);
  }
  else
  {
    $time = time();

    $stmt = $conn->prepare("INSERT INTO `tblusers`( `username`, `pass_word`, `first_name`, `middle_name`, `last_name`, `mobile`,`address`,`dateregistered`) VALUES (:uname, :pass, :fname, :mname, :lname, :mob, :add, :dr)");
    $stmt->bindParam("uname", $uname) ;
    $stmt->bindParam("pass", $pass) ;
    $stmt->bindParam("fname", $fname) ;
    $stmt->bindParam("mname", $mname) ;
    $stmt->bindParam("lname", $lname) ;
    $stmt->bindParam("mob",  $contact) ;
    $stmt->bindParam("add",  $address) ;
    $stmt->bindParam("dr", $time) ;
    $stmt->execute();


    $code = "reg_success";
    $message = "Registration Success!";
    array_push($response, array("code"=>$code, "message"=>$message));
    echo json_encode($response);
  }



}else{
      $code = "reg_failed";
      $message = "Please fill up required field!";
      array_push($response, array("code"=>$code, "message"=>$message));
      echo json_encode($response);
}




?>
