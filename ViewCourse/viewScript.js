//A function that helps send json format request
function sendRequest(u){
	var obj=$.ajax({url:u,async:false});
	var result=$.parseJSON(obj.responseText);
	return result;
}

//
function gothere(){
	course_code = $("#c_id").val();
	var strUrl = "viewExtend.php?c_id="+course_id+"&c_id=";
	var send=sendRequest(strUrl);
	if(send.result==1){
		
		alert(send.message);
		return;
	}
}
//
function viewing(){
	var view = sendRequest("extend.php?cmd=2");
	if(view.result==1){
		alert(view.course);
		var tableValue=view.course;
		var tableHTML="";
		for(var i=0;i<tableValue.length;i++){
			
			tableHTML+='<tr><td>'+tableValue[i]['course_title']+'</td><td>'+tableValue[i]['course_code']+
			'</td><td>'+tableValue[i]['course_description']+'</td><td>'+tableValue[i]['course_objective']+
			'</td><td>'+tableValue[i]['course_materials']+'</td><td>'+tableValue[i]['academic_year']+'</td><td>'+
			tableValue[i]['semester']+'</td><td>'+tableValue[i]['lecturer']+'</td><td>'+tableValue[i]['faculty_intern']+
			'</td><td>'+tableValue[i]['department']+'</td><td>'+tableValue[i]['prerequisites']+'</td></tr>';
		}
		document.getElementById("mytable").innerHTML=tableHTML;
	}
}