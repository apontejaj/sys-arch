<?php
header('Access-Control-Allow-Origin: *');

if(isset($_GET['un']) && isset($_GET['pw'])){

	$un = $_GET['un'];
	$pw = $_GET['pw'];

	try {
		$host = 'localhost';
		$dbname = 'charity';
		$dbuser = 'apontejaj';
		$pass = 'z5L5yDJ2';
		# MySQL with PDO_MYSQL
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $pass);
	
	} catch(PDOException $e) {echo 'Error';}  

		$sql = "SELECT * FROM `user` WHERE `username` = ? AND password = ?;";
		$sth = $DBH->prepare($sql);
		
		$sth->bindParam(1, $un, PDO::PARAM_INT);
		$sth->bindParam(2, $pw, PDO::PARAM_INT);
		
		$sth->execute();

		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

		$user = '{';
		foreach($result as $item){
			$user = $user . '"username":"' . $item['username'] . '","name":"' . $item['name'] . '",';
		}
		$user = $user . '"coder":"amilcar"}';
		echo $user;
				


}

else {
echo 'Looks like your missing the user name and password';
}