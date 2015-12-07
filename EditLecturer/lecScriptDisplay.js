//A function that helps send json format request
function sendRequest(u){
	var obj=$.ajax({url:u,async:false});
	var result=$.parseJSON(obj.responseText);
	return result;
}

/**
*/

function gothere(){
	lecturer_id = $("#lecid").val();
	var strUrl = "displayExtended.php?lecid="+lecturer_id+"&lecid=";
	var send=sendRequest(strUrl);
	if(send.result==1){
		
		alert(send.message);
		return;
	}
}
/*
A function that will receive the edited data and store in a variable, validates the text fields
and submit edited data into the db
*/
function update(){
	var id=document.getElementById("lecid").value;
	var fn=document.getElementById("lfn").value;
	var ln=document.getElementById("lln").value;
	var oh=document.getElementById("ohrs").value;
	var d=document.getElementById("ld").value;
	var c=document.getElementById("ct").value;
	if(id==""){
		alert("Enter Lecturer's ID");
		return;
	}
	else if(fn==""){
		alert("Enter lecturer's first name");
		return;
	}
	else if(ln==""){
		alert("A lecturer must have last name");
		return;
	}
	else if(d==""){
		alert("What department does the lecturer belongs");
		return;
	}
	else if(c==""){
		alert("A lecture must at least teach a course");
		return;
	}
	else{
		var obj=sendRequest("extend_lecturer.php?cmd=1&lecid="+id+"&lfn="+fn+"&lln="+ln+"&ohrs="+oh+
		"&k="+d+"&ct="+c);
		if(obj.result==1){
			document.getElementById("dis").value=obj.message;
			//document.getElementById("lecid").value="";
			document.getElementById("lfn").value="";
			document.getElementById("lln").value="";
			document.getElementById("ohrs").value="";
			document.getElementById("ld").value="";
			document.getElementById("ct").value="";
			return;
		}
		else{
			document.getElementById("dis").value=obj.message;
			return;
		}
	}
}
/*
A function that fetches the data to be edited into the text fields
*/
function getId(){
	var lecid=getURLParameter("lecid");
	var one = sendRequest("extend_lecturer.php?cmd=3&lid="+lecid);
	if(one.result==1){
		var lec="";
		var lecturer=one.lecturer;
		document.getElementById("lecid").value=lecturer[0]['lecturer_id'];
		document.getElementById("lfn").value=lecturer[0]['lecturer_fname'];
		document.getElementById("lln").value=lecturer[0]['lecturer_lname'];
		document.getElementById("ohrs").value=lecturer[0]['lecturer_office_hrs'];
		document.getElementById("ld").value=lecturer[0]['department'];
		document.getElementById("ct").value=lecturer[0]['lecturer_course'];
		//alert(document.getElementById("ct").value);
	}
}
/*
 A function to decode the URI component
 */
function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)
  ||[,""])[1].replace(/\\+/g, '%20'))||null
}

/*
This function sends a request to the extend_lecturer.php page to display a lecturer's id and 
lecturer's last name in a table
*/
function displaying(){
	var view = sendRequest("extend_lecturer.php?cmd=2");
	if(view.result==1){
		var tableValue=view.lecturer;
		var tableHTML="";
		for(var i=0;i<tableValue.length;i++){
			
			tableHTML+="<tr><td>"+tableValue[i]['lecturer_id']+"</td><td>"+tableValue[i]['lecturer_lname']+
			"</td><td><a href=index_lecturer.html?lecid="+tableValue[i]['lecturer_id']+" >Update</a></td></tr>";
		}
		document.getElementById("mytable").innerHTML=tableHTML;
	}
}