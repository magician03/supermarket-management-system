// JavaScript Document
function pidChange(){
	var pid = document.getElementById("prodid").value;
	if(pid.length!=0){
		getprice("id",pid);
	}
	else
		document.getElementById("prodname").disabled=false;
		document.getElementById("prodname").value="";
		document.getElementById("quantity").setAttribute("placeholder","");
}

function pnameChange(){
	var pname = document.getElementById("prodname").value;
	if(pname.length!=0){
		getprice("name",pname);
	}
	else
		document.getElementById("prodid").disabled=false;
		document.getElementById("prodid").value="";
		document.getElementById("quantity").setAttribute("placeholder","");
}
//transaction 1st half validate
function transadd(){
	var id = document.getElementById("prodid").value;
	var name = document.getElementById("prodname").value;
	var q = document.getElementById("quantity").value;
	//if(id!=0 & id.length & name.length & q.length & q!=0) {
		addData();
		//document.getElementById("prodid").value = document.getElementById("prodname").value = document.getElementById("quantity").value = "";
		//document.getElementById("quantity").setAttribute("placeholder","");
		//document.getElementById("itemPrice").innerHTML="";
	//}
	//else {
		//alert("Errors in input. Please fix them");
		//return false;
	//}
}
function validate(){
	if(document.getElementById("discount").value==""){
		document.getElementById("discount").value=0;
	}
	if(document.getElementById("cid").value==""){
		document.getElementById("cid").value=0;
	
	}
		return true;
}
