<?php
// Connexion à la base de données
include('../Connect.php');

// title desc datestart dateend schedule nbdriver identreprise status

$React_APP_Data = file_get_contents('php://input'); 
$Decode_React_APP_Data = json_decode($React_APP_Data , true);


header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');


$IdOffer = $Decode_React_APP_Data['IdOffer'];
$IdDriver = $Decode_React_APP_Data['IdDriver'];
/*
$IdDriver = ['IdDriver'];
$IdOffer = ['IdOffer'];
$Status = ['Status'];
*/
/*
$query = "SELECT * FROM forms WHERE EMAIL = '$EMAIL'";
$query_result = mysqli_query($connect_db, $query);
*/
$Reg_Query = "INSERT into saved (`idOffer`, `idDriver`) VALUES ('$IdOffer', '$IdDriver')";
//$Reg_Query = "SELECT * from apply ";
$Reg_Query_Result = mysqli_query($connect_db, $Reg_Query);
    
    if ($Reg_Query_Result) 
	{
        $Message = "insert apply successfully!";
    } else 
	{
        //$Message = "Error - Try again";
        $Message = "Error - " . mysqli_error($connect_db);

    }

$response[] = array("Message" => $Message);

echo json_encode($response);

?>