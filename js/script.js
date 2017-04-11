// JavaScript Document
function getprice(type,value){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		if(xmlhttp.responseText==""){
			document.getElementById("transalert").innerHTML = "Product Id or Product Name does not exist.";
		}
		else{
			document.getElementById("transalert").innerHTML ="";
		var n = xmlhttp.responseText.split(",",3);
		document.getElementById("itemPrice").innerHTML=n[1];
		if(type=='id') document.getElementById("prodname").value=n[0];
		else if(type=='name') document.getElementById("prodid").value=n[0];
		document.getElementById("quantity").setAttribute("placeholder","<="+n[2]);
		}
	}
  }
  	if(type=='id') xmlhttp.open("GET","getprice.php?pid="+value,true);
	else if(type=='name'){ value = value.toLowerCase(); xmlhttp.open("GET","getprice.php?pname="+value,true);}
	xmlhttp.send();
}
//add data to transtable
function addData(){
	var value = document.getElementById("prodid").value;
	var quantity = document.getElementById("quantity").value;
var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		document.getElementById("transtable").innerHTML = xmlhttp.responseText;	
	}
  }
  
  	if(value.length==0 & quantity.length==0) xmlhttp.open("GET","transtable.php",true);
	else xmlhttp.open("GET","transtable.php?pid="+value+"&q="+quantity,true);	
	xmlhttp.send();

}
//del data from transtable
function delData(pid){
var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		document.getElementById("transtable").innerHTML = xmlhttp.responseText;	
	}
  }
  
  	xmlhttp.open("GET","transtable.php?id="+pid,true);	
	xmlhttp.send();

}
