<?php $current=7; ?>
<?php include("./include/header.php"); ?>

<?php 
if($role!='a' && $role!='e'){
  echo "<div style='width:800px; margin:20px auto; border:0px solid #ff0000;'><b>Sorry...</b> You have no perivilage to visit this page.</div>";
  exit();
}
?>


<?php

function backup_tables($host,$user,$pass,$name,$tables = '*')
{

    $link = mysqli_connect($host,$user,$pass);
    mysqli_select_db($link,$name);
    mysqli_query($link, "SET NAMES 'utf8'");

    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
    $return='';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($link, 'SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);

        $return.= 'DROP TABLE '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";

        for ($i = 0; $i < $num_fields; $i++) 
        {
            while($row = mysqli_fetch_row($result))
            {
                $return.= 'INSERT INTO '.$table.' VALUES(';
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }

    //save file
    $file = "./backup/Backup-".date("Y-m-d h.i.s").".sql";
//echo "<a href='".$file."'>".$file."</a>";
    $handle = fopen("$file","w+");
    fwrite($handle,$return);
    fclose($handle);

//echo "<br /></br ></br ><b>Done,</b> Successfully Exported Database.";
//header("Location:manage.php?backup=y");
//echo "<meta http-equiv='refresh' content='0,manage.php?backup=y' />";

}


backup_tables($host,$user,$pass,$db);

?>



<?php include("./include/footer.php"); ?>