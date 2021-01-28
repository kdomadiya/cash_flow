function validation_add(){
    var fname=document.forms["create-user"]["firstname"].value;
    var lname=document.forms["create-user"]["lastname"].value;
    var uname=document.forms["create-user"]["username"].value;
    var pass=document.forms["create-user"]["password"].value;
    var pass1=document.forms["create-user"]["repassword"].value;
    var mobile=document.forms["create-user"]["mobileno"].value;
    var email=document.forms["create-user"]["email"].value;
    var address=document.forms["create-user"]["address"].value;
    var role=document.forms["create-user"]["userrole"].value;
    
    if(fname==null || fname==""){
        alert("First Name Must Field.");
        return false;
    }
    else if(lname==null || lname==""){
        alert("Last Name Must Field.");
        return false;
    }
    else if(uname==null || uname==""){
        alert("User Name Must Field.");
        return false;
    }
    else if(mobile==null || mobile==""){
        alert("Mobile Must Field.");
        return false;
    }
    else if(email==null || email==""){
        alert("Email Must Field.");
        return false;
    }
    else if(address==null || address==""){
        alert("Address Must Field.");
        return false;
    }
    else if(pass==null || pass==""){
        alert("Password Must Field.");
        return false;
    }
    else if(pass!=pass1){
        alert("Passwotd Does not Match");
        return false;
    }
    else{
        return true;
    }    
}


function validation_edit(){
    var fname=document.forms["edit-user"]["firstname"].value;
    var lname=document.forms["edit-user"]["lastname"].value;
    var uname=document.forms["edit-user"]["username"].value;
    var pass=document.forms["edit-user"]["password"].value;
    var pass1=document.forms["edit-user"]["repassword"].value;
    var mobile=document.forms["edit-user"]["mobileno"].value;
    var email=document.forms["edit-user"]["email"].value;
    var address=document.forms["edit-user"]["address"].value;
    var role=document.forms["edit-user"]["userrole"].value;
    
    if(fname==null || fname==""){
        alert("First Name Must Field.");
        return false;
    }
    else if(lname==null || lname==""){
        alert("Last Name Must Field.");
        return false;
    }
    else if(uname==null || uname==""){
        alert("User Name Must Field.");
        return false;
    }
    else if(mobile==null || mobile==""){
        alert("Mobile Must Field.");
        return false;
    }
    else if(email==null || email==""){
        alert("Email Must Field.");
        return false;
    }
    else if(address==null || address==""){
        alert("Address Must Field.");
        return false;
    }
    else if(pass==null || pass==""){
        return true;
    }
    else if(pass!=pass1){
        alert("Passwotd Does not Match");
        return false;
    }
    else{
        return true;
    }    
}

function validation_update(){
    var fname=document.forms["update-user"]["firstname"].value;
    var lname=document.forms["update-user"]["lastname"].value;
    var uname=document.forms["update-user"]["username"].value;
    var pass=document.forms["update-user"]["password"].value;
    var pass1=document.forms["update-user"]["repassword"].value;
    var mobile=document.forms["update-user"]["mobileno"].value;
    var email=document.forms["update-user"]["email"].value;
    var address=document.forms["update-user"]["address"].value;
    var role=document.forms["update-user"]["userrole"].value;
    
    if(fname==null || fname==""){
        alert("First Name Must Field.");
        return false;
    }
    else if(lname==null || lname==""){
        alert("Last Name Must Field.");
        return false;
    }
    else if(uname==null || uname==""){
        alert("User Name Must Field.");
        return false;
    }
    else if(mobile==null || mobile==""){
        alert("Mobile Must Field.");
        return false;
    }
    else if(email==null || email==""){
        alert("Email Must Field.");
        return false;
    }
    else if(address==null || address==""){
        alert("Address Must Field.");
        return false;
    }
    else if(pass==null || pass==""){
        return true;
    }
    else if(pass!=pass1){
        alert("Passwotd Does not Match");
        return false;
    }
    else{
        return true;
    }    
}


function validation_credit(){
    var date=document.forms["credit"]["credit_date"].value;
    var amount=document.forms["credit"]["credit_amount"].value;
    var pcode=document.forms["credit"]["credit_party_code"].value;
    var pname=document.forms["credit"]["credit_party_name"].value;
    var particular=document.forms["credit"]["credit_particular"].value;
    
    if(date==null || date==""){
        alert("Credit : Date Must Field.");
	document.getElementById('credit_date').focus();
        return false;
    }
    else if(amount==null || amount==""){
        alert("Credit : Amount Must Field.");
	document.getElementById('credit_amount').focus();
        return false;
    }
    else if(pcode==null || pcode==""){
        alert("Credit : Party Code Must Field.");
	document.getElementById('credit_party_code').focus();
        return false;
    }
    else if(pcode!=pname){
        alert("Credit : Party Name Does not Match");
	document.getElementById('credit_party_name').focus();
        return false;
    }
    else if(particular==null || particular==""){
        alert("Credit : Particular Must Field.");
	document.getElementById('credit_particular').focus();
        return false;
    }
    else{
        return true;
    }    
}


function validation_debit(){
    var date=document.forms["debit"]["debit_date"].value;
    var amount=document.forms["debit"]["debit_amount"].value;
    var pcode=document.forms["debit"]["debit_party_code"].value;
    var pname=document.forms["debit"]["debit_party_name"].value;
    var particular=document.forms["debit"]["debit_particular"].value;


    if(date==null || date==""){
        alert("Debit : Date Must Field.");
	document.getElementById('debit_date').focus();
        return false;
    }
    else if(amount==null || amount==""){
        alert("Debit : Amount Must Field.");
	document.getElementById('debit_amount').focus();
        return false;
    }
    else if(pcode==null || pcode==""){
        alert("Debit : Party Code Must Field.");
	document.getElementById('debit_party_code').focus();
        return false;
    }
    else if(pcode!=pname){
        alert("Debit : Party Name Does not Match");
	document.getElementById('debit_party_name').focus();
        return false;
    }
    else if(particular==null || particular==""){
        alert("Debit : Particular Must Field.");
	document.getElementById('debit_particular').focus();
        return false;
    }
    else{
        return true;
    }    
}


function validation_update(){
    var date=document.forms["update"]["update_date"].value;
    var amount=document.forms["update"]["update_amount"].value;
    var pcode=document.forms["update"]["update_party_code"].value;
    var pname=document.forms["update"]["update_party_name"].value;
    var particular=document.forms["update"]["update_particular"].value;


    if(date==null || date==""){
        alert("Debit : Date Must Field.");
	document.getElementById('debit_date').focus();
        return false;
    }
    else if(amount==null || amount==""){
        alert("Debit : Amount Must Field.");
	document.getElementById('debit_amount').focus();
        return false;
    }
    else if(pcode==null || pcode==""){
        alert("Debit : Party Code Must Field.");
	document.getElementById('debit_party_code').focus();
        return false;
    }
    else if(pcode!=pname){
        alert("Debit : Party Name Does not Match");
	document.getElementById('debit_party_name').focus();
        return false;
    }
    else if(particular==null || particular==""){
        alert("Debit : Particular Must Field.");
	document.getElementById('debit_particular').focus();
        return false;
    }
    else{
        return true;
    }    
}