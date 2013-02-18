function showUser(value) //ajax, can use it in own project
{
	if (value=="")
	  {
	  document.getElementById("issues").innerHTML="";
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
	    document.getElementById("issues").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","webfunc.php?do=ajax&q="+value,true);
	xmlhttp.send();
}