<?php
session_start();
use Rango\Registration\Registration;
use Rango\Registration\Connect;
require 'vendor/autoload.php';
//echo"jhfa;f";exit();
if($_SESSION['uid']==1 || $_SESSION['uRole']=='subAdmin' )
{ //echo"jhfa;f";exit();
    ?>
    <form action="" method="POST">
    <select name="roles">
    <option value="subAdmin">admin</option>
    <option value="user">user</option>
    <option value="all">all</option>
  
     <input type="submit" name="displayOp" value="Display">
     </form>
   </select>  
    <?php
}
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {     //echo "<br>hello";   
        mydisplay($_POST['roles']);
    }
    else{
        mydisplay("all");
    }
    function mydisplay($mr)
    {
        
        $page=$_GET['page'];
        if($page=="" || $page=="1")
        {
            $_SESSION['page1']=0;
        }
        else
        {
            $_SESSION['page1']=($page*2)-2;
        }
        $reg=new Registration();
        
        $reg=new Registration();
        $count=$reg->countRow($mr);
        $pageCount=ceil(count($count)/2);
        for($b=1;$b<=$pageCount;$b++)
        {
            ?><a href="userDisplay.php?page=<?php echo $b; ?>"><?php echo $b."";?></a><?php
        }
        $reg=new Registration();
        $r=$reg->displaypages($mr);
        $c=0;
        echo "<table border='1'>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>dob</th>
        <th>qualification</th>
        <th>Role</th>
        </tr>";
        for( $count1=count($r);$count1 > 0;$count1--) {
        echo "<tr>";
        echo "<td>" . $r[$c][1] . "</td>";
        echo "<td>" . $r[$c][2] . "</td>";
        echo "<td>" . $r[$c][3] . "</td>";
        echo "<td>" . $r[$c][4] . "</td>"; 
        echo "<td>" . $r[$c][5] . "</td>";
        echo "<td>" . $r[$c][7] . "</td>";
        echo "</tr>";
        $c++;
        }
        echo "</table>";
    }



?>