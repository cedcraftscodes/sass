

<?php 


function secure($text){
  return htmlspecialchars(stripcslashes(strip_tags(trim($text))));
}

include 'connect.php';

$response = array();
if(isset($_POST['username']) && isset($_POST['password']))
{
  $uname = secure($_POST['username']);
  $pass = md5(secure($_POST['password']));

  $stmt = $conn->prepare("SELECT * FROM `tblusers` WHERE `username`=:uname AND `pass_word`=:pass");
  $stmt->bindParam("uname", $uname);
  $stmt->bindParam("pass", $pass);
  $stmt->execute();

  $stmt->setFetchMode(PDO::FETCH_ASSOC); 
  $count=$stmt->rowCount();
  $data=$stmt->fetch();



  if($count)
  {
        $code = "login_success";
        array_push($response, array("code"=>$code, 
          "userid"=>$data['userid'], 
          "contact"=>$data['mobile'], 
          "firstname"=>$data['first_name'], 
          "middlename"=>$data['middle_name'], 
          "lastname"=>$data['last_name'], 
          "address" => $data['address'],
          "username" => $data['username']));
        echo json_encode($response);
  }
  else
  {
    $code = "login_failed";
    $message = "The username or password you have entered is invalid!";
    array_push($response, array("code"=>$code, "message"=>$message));
    echo json_encode($response);

      //login failed
  }
}else{
      $code = "login_failed";
      $message = "Please fill up required field!";
      array_push($response, array("code"=>$code, "message"=>$message));
      echo json_encode($response);
}



?>

