<?php
$link = mysqli_connect("127.0.0.1", "root", "");
$sql = "DROP DATABASE chouaib";
	if(mysqli_query($link, $sql)){
        echo " Records added successfully.";

}



?>