<?php 

include 'connect.php';

$response = array();
$news = $conn->query("SELECT `newsid`, `title`, `content`, `picture`, CONCAT(fname, ' ', lname) as 'Writer', nu.`dateadded` 
	FROM `tblnewsupdate` as nu
	INNER JOIN tbladmins as ad
	ON ad.`userid` = nu.`adminid`
	WHERE nu.`Deleted` ='NO'
	ORDER BY nu.`dateadded` DESC");
while($r = $news->fetch()){

			$dateadded = date("F j, Y, g:i a", $r["dateadded"]);
	array_push($response, 
		array(	'newsid' => $r['newsid'],
				'title'  => $r['title'],
				'content'=> $r['content'], 
				'writer' => $r['Writer'],
				'picture'=> $r['picture'],
				'dateposted' => $dateadded
			 ));
}

echo json_encode($response);

?>

