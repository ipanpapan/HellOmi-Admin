<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'konek.php';

	$idGroup = $_GET['group'];
	$id = $_GET['idCabor'];
	if ($id==9 || $id==14 || $id==5 ||$id==6)
	    $result = $conn->query("SELECT * FROM omi_hasil_klasemen INNER JOIN omi_fakultas where id_cabor = '$id' AND poin_klasemen = '1' AND omi_fakultas.id_fakultas=omi_hasil_klasemen.id_fakultas "); //query select by id
	else
	    $result = $conn->query("SELECT * FROM omi_hasil_klasemen where id_cabor = '$id' AND nama_grup = '$idGroup' ORDER BY poin_klasemen DESC"); //query select by id
	$outp = ""; $outm = "";
	while($rs = mysqli_fetch_array($result)) {
	    
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Id_Cabor":"'   . $rs["id_cabor"] . '",';
	    $outp .= '"Nama_Fakultas":"'   . $rs["nama_fakultas"] . '",';
	    $outp .= '"Logo":"'   . $rs["id_fakultas"] . '",';
	    $outp .= '"Win":"'   . $rs["win_klasemen"] . '",';
	    $outp .= '"Draw":"'   . $rs["draw_klasemen"] . '",';
	    $outp .= '"Lose":"' .$rs["lose_klasemen"]. '",';
	    $outp .= '"Poin":"' .$rs["poin_klasemen"]     . '"}';  
	}
	
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>