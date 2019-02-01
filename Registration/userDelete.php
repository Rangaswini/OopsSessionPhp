<?php
use Rango\Registration\Registration;
use Rango\Registration\Connect;
require 'vendor/autoload.php';

$reg=new Registration();
                $delResult=$reg->deleteUser($_POST["userid"]);
                if($delResult==1)
                {
                    echo"Record Deleted Successfully";
                }
                else
                {
                    echo"Record not Deleted";
                }

?>