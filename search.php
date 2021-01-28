<?php

include("./include/config.php");


if($_REQUEST['submit']=='s'){

if(isset($_REQUEST['party_code'])){
$code=$_REQUEST['party_code'];
}
else{
$code=NULL;
}

if(isset($_REQUEST['from_date'])){
$from=$_REQUEST['from_date'];
}
else{
$from=NULL;
}

if(isset($_REQUEST['to_date'])){
$to=$_REQUEST['to_date'];
}
else{
$to=NULL;
}
}

else{
$code=NULL;
$from=NULL;
$to=NULL;
echo "Error : ";
}


$reslut=mysqli_query($con, "select *,DATE_FORMAT(create_Date,'%d/%m/%Y')AS date from records,members where records.party_id=members.member_id and party_id=$code and create _date between STR_TO_DATE('$from','%d/%m/%Y') and STR_TO_DATE('$to','%d/%m/%Y') and amount_type='c' and status='a' ORDER BY id desc");