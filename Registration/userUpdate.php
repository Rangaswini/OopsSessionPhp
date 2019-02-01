<?php
session_start();

use Rango\Registration\Registration;
use Rango\Registration\Connect;
require 'vendor/autoload.php';
if($_SESSION['uid']==1 || $_SESSION['uRole']=='subAdmin')
{ 
    $_SESSION['up']=1;

    $reg=new Registration();
    $r=$reg->display('all');
    $c=0;
    
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>dob</th>
    <th>qualification</th>
    <th>Role</th>
    <th>link</th>
    </tr>";
    for( $count1=count($r);$count1 > 0;$count1--) {
    
    
            echo "<tr>";
            echo "<td>" . $r[$c][1] . "</td>";
            echo "<td>" . $r[$c][2] . "</td>";
            echo "<td>" . $r[$c][3] . "</td>";
            echo "<td>" . $r[$c][4] . "</td>";
            echo "<td>" . $r[$c][5] . "</td>";
            echo "<td>" . $r[$c][7] . "</td>";
            echo "<td><a href=userUpdata.php?u_id=".$r[$c][0].">Update</a></td>";
           

            echo "</tr>";
            
            $c++;
            
            // exit();
    }
    echo "</table>";



  
}
?>