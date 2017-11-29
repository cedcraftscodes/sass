<?php 


if(session_id()){}else{session_start();}

if(isset($_POST['action']) && !empty($_POST['action']))
{

	$action = $_POST['action'];
	switch ($action) {
		case 'addNews':
		addNews();
		break;
		case 'showNewsUpdate':
		showNewsUpdate();
		break;
		case 'deleteNews':
		deleteNews();
		break;
		case 'showUpdateNews':
		showUpdateNews();
		break;
		case 'updateNews':
		updateNews();
		break;

		default:
				# code...
		break;
	}
}


function secure($str){
	return strip_tags(trim(htmlspecialchars($str)));
}


function ContainsNumbers($String){
	return preg_match('/\\d/', $String) > 0;
}








function addNews()
{
	include '../config/config.php';

	/*
		Validations 
	*/
		$errors = array();

		if(strlen($_POST['title']) == 0){
			array_push($errors, "News title can not be blank!");
		}

		/*
		$stmt = $conn->prepare("SELECT userid FROM tblusers where email=:email AND `deleted`='NO'");
		$stmt->bindParam("email", $_POST['email']) ;
		$stmt->execute();
		$count=$stmt->rowCount();





		if($count != 0){
			array_push($errors, "User with email ".$_POST['email']." already exist!");
		}


		*/


		$title = secure(ucfirst($_POST['title']));
		$content = $_POST['content'];

		$time = time();



		$imgfile = $_FILES['newspic']['name'];
		$tmp_dir = $_FILES['newspic']['tmp_name'];
		$imgsize = $_FILES['newspic']['size'];


		$upload_dir = '../../images/';
		$imgext = strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
		$valid = array('jpeg', 'jpg', 'png', 'gif');
		$uploadimg = $time. "_" . rand(1000, 1000000) . "." . $imgext;
		$destination = "";


		if (in_array($imgext, $valid)) {
			if ($imgsize < 5000000) {
				move_uploaded_file($tmp_dir, $upload_dir.$uploadimg);
				$destination = 'images/'.$uploadimg;
			}
			else
			{
				array_push($errors, "Sorry, the file is too large.");
			}
		}
		else
		{
			array_push($errors, "File is not supported.".$imgfile);
		}



		if(count($errors) > 0 )
		{
			echo "<tr><script type='text/javascript'>
			$(document).ready(function(){
				$('#msgtitle').text('Error');
				$('#modalmsg').html(\"".implode("<br />",$errors)."\");
				$('#msgmodalbtn').text('Close');
				$('#msgmodalbtn').attr('class', 'btn btn-danger pull-right');
				$('#msgmodalheader').attr('class', 'modal-header modal-header-danger');
				$('#msgmodal').modal('show');
			});
			</script></tr>";
		}
		else
		{

			$stmt = $conn->prepare("INSERT INTO `tblnewsupdate`(`title`, `content`, `picture`, `adminid`, `Deleted`, `dateadded`) VALUES 
				(:title, :content, :img, :id, 'NO', :dtt)");
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':content', $content);
			$stmt->bindParam(':id', $_SESSION['acc_id']);
			$stmt->bindParam(':img', $destination);
			$stmt->bindParam(':dtt', $time);
			$stmt->execute();


			echo "<tr><script type='text/javascript'>
			$(document).ready(function(){
				$('#msgtitle').text('Success');
				$('#modalmsg').html('News successfully added!');
				$('#msgmodalbtn').text('Close');
				$('#msgmodalbtn').attr('class', 'btn btn-success pull-right');
				$('#msgmodalheader').attr('class', 'modal-header modal-header-success');
				$('#msgmodal').modal('show');
			});
			</script></tr>";
		}
		showNewsUpdate();
	}

	function showNewsUpdate()
	{
		include '../config/config.php';

		$admins = $conn->query("SELECT
			`newsid`,
			`title`,
			`content`,
			`picture`,
			nu.`dateadded`,
			`fname`,
			`mname`,
			`lname`
			FROM
			`tblnewsupdate` AS nu
			INNER JOIN tbladmins as ad 
			ON ad.userid = nu.`adminid`
			WHERE nu.`Deleted` = 'NO'

			");
		while($r = $admins->fetch()){
			echo "<tr>";
			echo "<td>".$r['newsid']."</td>";

			echo "<td>".$r['title']."</td>";
			echo "<td>".$r['content']."</td>";
			echo "<td><img src='../".$r['picture']."' width='200' height='150'/></td>";

			echo "<td>".$r['fname']." ".$r['mname']." ".$r['lname']."</td>";
			$dateadded = date("F j, Y, g:i a", $r["dateadded"]);
			echo "<td>".$dateadded."</td>";
			echo '<td><a class="btn btn-sm btn-info" onclick="updateNews('.$r['newsid'].')"> <span class="glyphicon glyphicon-pencil"></span> Edit</a> | <a class="btn btn-sm btn-danger" onclick="deleteNews('.$r['newsid'].')"><span class=
			"glyphicon glyphicon-trash"></span> Delete</a></td>';
			echo "</tr>";
		}
	}

	function deleteNews()
	{
		include '../config/config.php';
		$id = $_POST['id'];

    // prepare sql and bind parameters
		$stmt = $conn->prepare("UPDATE tblnewsupdate set Deleted='YES' WHERE newsid=:id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();


		echo "<tr><script type='text/javascript'>
		$(document).ready(function(){
			$('#msgtitle').text('Success');
			$('#modalmsg').html('News successfully deleted!');
			$('#msgmodalbtn').text('Close');
			$('#msgmodalbtn').attr('class', 'btn btn-success pull-right');
			$('#msgmodalheader').attr('class', 'modal-header modal-header-success');
			$('#msgmodal').modal('show');
		});
		</script></tr>";
		showNewsUpdate();
	}

	function showUpdateNews()
	{
		include '../config/config.php';
		$id = $_POST['id'];

		$stmt = $conn->prepare("SELECT
			`newsid`,
			`title`,
			`content`,
			`picture`
			FROM
			`tblnewsupdate` AS nu WHERE nu.`Deleted` = 'NO' AND `newsid`=:id");
		$stmt->bindParam(':id',$id);
		$stmt->execute(); 
		$row = $stmt->fetch();

		$newsid = $row['newsid'];
		$title = $row['title'];
		$content = $row['content'];
		$picture = $row['picture'];



		echo json_encode(array(
			"newsid" => $newsid, 
			"title" => $title, 
			"content" => $content,
			"picture" => $picture  ));

	}	




	function updateNews()
	{
		include '../config/config.php';


		$errors = array();
		$time = time();


		if(!empty($_FILES['newspic_u']['name'])){
			$imgfile = $_FILES['newspic_u']['name'];
			$tmp_dir = $_FILES['newspic_u']['tmp_name'];
			$imgsize = $_FILES['newspic_u']['size'];


			$upload_dir = '../../images/';
			$imgext = strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
			$valid = array('jpeg', 'jpg', 'png', 'gif');
			$uploadimg = $time. "_" . rand(1000, 1000000) . "." . $imgext;
			$destination = "";


			if (in_array($imgext, $valid)) {
				if ($imgsize < 5000000) {
					move_uploaded_file($tmp_dir, $upload_dir.$uploadimg);
					$destination = 'images/'.$uploadimg;
				}
				else
				{
					array_push($errors, "Sorry, the file is too large.");
				}
			}
			else
			{
				array_push($errors, "File is not supported.".$imgfile);
			}
			$stmt = $conn->prepare("UPDATE `tblnewsupdate` SET `title`=:title,`content`=:content,`picture`=:pic WHERE `newsid`=:id");

		}else{
			$stmt = $conn->prepare("UPDATE `tblnewsupdate` SET `title`=:title,`content`=:content WHERE `newsid`=:id");
		}		




		$id = secure($_POST['u_id']);
		$title = secure($_POST['title_u']);
		$content = $_POST['content_u'];

		$errors = array();


		if(strlen($_POST['title_u']) == 0){
			array_push($errors, "Title can not be blank!");
		}


		if(strlen($_POST['content_u']) == 0){
			array_push($errors, "Content can not be blank!");
		}





		if(count($errors) > 0 )
		{

			echo "<tr><script type='text/javascript'>
			$(document).ready(function(){
				$('#msgtitle').text('Error');
				$('#modalmsg').html(\"".implode("<br />",$errors)."\");
				$('#msgmodalbtn').text('Close');
				$('#msgmodalbtn').attr('class', 'btn btn-danger pull-right');
				$('#msgmodalheader').attr('class', 'modal-header modal-header-danger');
				$('#msgmodal').modal('show');
			});
			</script></tr>";
		}
		else
		{

			
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':content', $content);
			if(!empty($_FILES['newspic_u']['name'])){
				$stmt->bindParam(':pic', $destination);
			}


			$stmt->execute();
		}
		echo "<tr><script type='text/javascript'>
		$(document).ready(function(){
			$('#msgtitle').text('Success');
			$('#modalmsg').html('News successfully updated!');
			$('#msgmodalbtn').text('Close');
			$('#msgmodalbtn').attr('class', 'btn btn-success pull-right');
			$('#msgmodalheader').attr('class', 'modal-header modal-header-success');
			$('#msgmodal').modal('show');
		});
		</script></tr>";	
		showNewsUpdate();


	}

	?>