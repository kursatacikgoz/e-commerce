<?php 

try{
	$db = new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8",'root','12345678');
	//echo "Başarılı veritabanı bağlantısı";

	$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id =:'id");

}catch(PDOException $e){
	echo $e->getMessage();
}

?>