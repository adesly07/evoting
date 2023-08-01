<?php
include ('../conx.php');
if (isset($_GET['term'])){
	$return_arr = array();

	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $stmt = $conn->prepare("SELECT name FROM a_reg WHERE name LIKE :term");
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
	   $vowel = array('4', '3', '7', '1', '9');
$v_replace = array ('A', 'E', 'I', 'O', 'U');
 
	    while($row = $stmt->fetch()) {
	        $return_arr[] =  str_replace($vowel,$v_replace,$row['name']);
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}


?>