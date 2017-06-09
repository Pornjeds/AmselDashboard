<?php
$serverName = "PORNJED-PC\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"SALEPRO", "UID"=>"sa", "PWD"=>"P@ssw0rd");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) 
{
    echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
    echo "<pre>";
    print_r(sqlsrv_errors());
    echo "</pre>";
}
?>