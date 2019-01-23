<?php
    session_start();

if( isset($_SESSION['uname']) )
{
            echo "welcome".$_SESSION['uname']."!";
}


?>