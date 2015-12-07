var lectid = "";
var lectfname = "";
var lectlname = "";
var lectoffhrs = "";
var lectdept = "";
var lectcourse = "";

function sendRequest(u){
	var obj=$.ajax({url:u,async:false});
	var result=$.parseJSON(obj.responseText);
	return;
}

function gothere(){
	lectid = $("#lecid").val();
	lectfname = $("#lfn").val();
	lectlname = $("#lln").val();
	lectoffhrs = $("#ohrs").val();
	lectdept = $("#ld").val();
	lectcourse = $("#ct").val();
	
	validate();

	var strUrl = "extend_lecturer.php?lecid="+lectid+"&lfn="+lectfname+"&lln="
		+lectlname+"&ohrs="+lectoffhrs+"&ld="+lectdept+"&ct="+lectcourse;
	var send=sendRequest(strUrl);
	if(send.result==1){
		alert(send.message);
		return;
	}
}

// A fuction to ensure each input field is filled
function validate(){
	if (lectid == ""){ // Check if empty
			window.alert("Please this field is not supppose to be empty"); // Alert user to input course code
			//lectid.focus();
			document.getElementById("lecid").focus;
			return false;
		}
	if (lectfname == ""){ // Check if empty
		window.alert("Please this field is not supppose to be empty");  // Alert user to input course name or title
		document.getElementById("lfn").focus; 
		return false;
	}
	if (lectlname == ""){ // check if empty
		window.alert("Please this field is not supppose to be empty"); //alert user
		document.getElementById("lln").focus;
		return false;
	}
	if (lectoffhrs == ""){  //check if empty
		window.alert("Please the lecturer's office hours field is empty");  // alert user
		//lectoffhrs.focus();
		return false;
	}
	if (lectdept == ""){ // check if empty
		window.alert("Please the lecturer's department field is empty"); // alert user
		document.getElementById("ld").focus;
		return false;
	}
	if (lectcourse == ""){ //check if empty //check if empty
		window.alert("Please the lecturer course field is empty"); // alert user
	    document.getElementById("ct").focus;
		return false;
	}
}

$(function(){
	$('#EditLecturerForm').submit(function(e){
		//do form processing
		e.preventDefault();
		gothere();
	});
});
