$(document).keydown(function(evt){
if(evt.keyCode==112){
        evt.preventDefault();
        document.getElementById('credit_date').focus();
    } 
if(evt.keyCode==113){
        evt.preventDefault();
        document.getElementById('debit_date').focus(); 
    }
if(evt.keyCode==114){
        evt.preventDefault();
        document.getElementById('create_credit').focus(); 
    }
if(evt.keyCode==115){
        evt.preventDefault();
        document.getElementById('create_debit').focus(); 
    }

     
});


$(document).ready(function(){

$("#credit tr:even").css("background","#afa");
$("#credit tr:odd").css("background","#cfc");
$("#debit tr:even").css("background","#faa");
$("#debit tr:odd").css("background","#fcc");
$("#employee tr:even").css("background","#faa");
$("#employee tr:odd").css("background","#fcc");
$("#clients tr:even").css("background","#afa");
$("#clients tr:odd").css("background","#cfc");


$("#credit_party_name").change(function(){
var value=$(this).attr('value');
$("#credit_party_code").val(value);
});

$("#debit_party_name").change(function(){
var value=$(this).attr('value');
$("#debit_party_code").val(value);
});

$("#party_name").change(function(){
var value=$(this).attr('value');
$("#party_code").val(value);
});

$("#update_party_name").change(function(){
var value=$(this).attr('value');
$("#update_party_code").val(value);
});

$("#credit_particular").keyup(function(){
$("#credit_hint").show();
});

$("#debit_particular").keyup(function(){
$("#debit_hint").show();
});

$("#particular").keyup(function(){
$("#report_hint").show();
});

$("#update_particular").keyup(function(){
$("#update_hint").show();
});



var cpc=$("#credit_party_code");
cpc.keyup(cpctocpn);
cpc.change(cpctocpn);

function cpctocpn(){
var cpc=$(this).val();
$("#credit_party_name").val(cpc);
}

var dpc=$("#debit_party_code");
dpc.keyup(dpctodpn);
dpc.change(dpctodpn);

function dpctodpn(){
var dpc=$(this).val();
$("#debit_party_name").val(dpc);
}

var pc=$("#party_code");
pc.keyup(pctopn);
pc.change(pctopn);

function pctopn(){
var pc=$(this).val();
$("#party_name").val(pc);
}

var upc=$("#update_party_code");
upc.keyup(upctopn);
upc.change(upctopn);

function upctopn(){
var upc=$(this).val();
$("#update_party_name").val(upc);
}



$("#credit tr").click(function(){

});


$("#credit tr").dblclick(function(){
$(this).contents().find('#updates').fadeIn(200);
});

$("#credit tr").click(function(){
$(this).contents().find('#updates').fadeOut(200);
});


$("#debit tr").dblclick(function(){
$(this).contents().find('#updates').fadeIn(200);
});

$("#debit tr").click(function(){
$(this).contents().find('#updates').fadeOut(200);
});


});

function ShowCreditParticular(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("credit_hint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("credit_hint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search_credit_particular.php?q="+str,true);
xmlhttp.send();
}


function ShowDebitParticular(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("debit_hint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("debit_hint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search_debit_particular.php?q="+str,true);
$("#debit_hint").css("display",'block');
xmlhttp.send();
}



function ShowReportParticular(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("report_hint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("report_hint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search_report_particular.php?q="+str,true);
xmlhttp.send();
}  

function ShowUpdateParticular(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("update_hint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("update_hint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search_update_particular.php?q="+str,true);
xmlhttp.send();
}





function credit_insert(str){
document.getElementById('credit_particular').value=str;
document.getElementById('credit_hint').innerHTML="";
}

function credit_hide(){
document.getElementById('credit_hint').innerHTML="";
}


function debit_insert(str){
document.getElementById('debit_particular').value=str;
document.getElementById('debit_hint').innerHTML="";
}

function debit_hide(){
document.getElementById('debit_hint').innerHTML="";
}


function report_insert(str){
document.getElementById('particular').value=str;
document.getElementById('report_hint').innerHTML="";
}

function report_hide(){
document.getElementById('report_hint').innerHTML="";
}


function update_insert(str){
document.getElementById('update_particular').value=str;
document.getElementById('update_hint').innerHTML="";
}

function update_hide(){
document.getElementById('update_hint').innerHTML="";
}