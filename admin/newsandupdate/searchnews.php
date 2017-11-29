<?php
if(isset($_GET["query"]))
{

	$keyword = htmlspecialchars($_GET["query"], ENT_QUOTES, 'UTF-8');

	if(strlen($keyword) < 3){
		echo "<p> Minimum of 3 characters required!</p>";
	}else{
		include '../config/config.php';

		$searchResult = $conn->prepare("SELECT
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
			WHERE nu.`Deleted` = 'NO' AND (`title` LIKE :kw)");
		$searchResult->bindValue(":kw", '%'.$keyword.'%') ;
		$searchResult->execute();
		$count=$searchResult->rowCount();

		if($count != 0){
			while($r = $searchResult->fetch()){
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

		}else{
			echo "<p>No results found! </p>";
		}

	}

}


?>