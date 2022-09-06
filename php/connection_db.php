<?php

define("server_name","localhost");
define("user_name","root");
define("password","admin");
define("database_name","gharjoda_db");

$con=mysqli_connect(server_name,user_name,password,database_name);
if($con){

}else{
    die("Connection failed ".mysqli_connect_error());
}

?>