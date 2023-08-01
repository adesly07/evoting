<?php
include ('../conx.php');
if (isset($_GET['term'])){
	$return_arr = array();

	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $stmt = $conn->prepare("SELECT matric_no FROM e_list WHERE matric_no LIKE :term");
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
$m_number = array('K', 'F', 'Z', 'M', 'X');
$m_replace = array ('1', '2', '3', '4', '5');
$matric_no = str_replace($m_number,$m_replace,$matric_no);
  
	    while($row = $stmt->fetch()) {
	        $return_arr[] =  str_replace($m_number,$m_replace,$row['matric_no']);
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}


?>