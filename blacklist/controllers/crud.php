<?php 
	
	//handle editing
	if(isset($_POST["editRec"])) {
		$id = $_POST["id"];
	    $anme = $_POST["aname"];
		$atype = $_POST["atype"];
		$inst = $_POST["inst"];
		$aman = $_POST["aman"];
		$dat = $_POST["dat"];

	    $sql2="UPDATE blacklist SET account_name = '".$anme."', account_type = '".$atype."'
			, institution = '".$inst."', account_manager = '".$aman."', date_blacklisted = '".$dat."'  WHERE id = '".$id."'";
	    
	    $query = $db->prepare($sql2);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./index.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql2="UPDATE blacklist SET status = 'deleted'  WHERE id = '".$id."'";
	    
	    $query = $db->prepare($sql2);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./index.php'; </script>";
	}

?>