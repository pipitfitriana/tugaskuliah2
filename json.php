<?php
$c  = mysql_connect("localhost", "root", "");
$db = mysql_selectdb("akademik", $c);
if(!$db){
    echo "Purcase DB! :p";
    exit();
}

$datas = array();
$get = mysql_query("select nim, nama, alamat,progdi FROM mahasiswa");
while($data = mysql_fetch_array($get)){
    $datas[] = $data;
}

$json_format = json_encode($datas);

echo $json_format;
echo "<br/>";

$json_data = json_decode($json_format,true);

echo "<br/>";


for($i=0; $i<count($json_data); $i++){
	echo "nim:";
    echo $json_data[$i]['nim']."<br/>";
	echo "nama:";
    echo $json_data[$i]['nama']."<br/>";
	echo "alamat:";
    echo $json_data[$i]['alamat']."<br/>";
	echo "progdi:";
    echo $json_data[$i]['progdi']."<br/>";
    echo "<br/>";
}
 
echo "<br/>";

 
?>