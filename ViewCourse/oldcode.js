function validateAddCourseForm(){
				/*var course_code = document.AddCourseForm.cd;
				var course_title = document.AddCourseForm.ct;
				var semester = document.AddCourseForm.cs;
				var yr = document.AddCourseForm.cy;
				var course_descrip = document.AddCourseForm.cdes;
				var course_obj = document.AddCourseForm.co;
				var course_mat = document.AddCourseForm.cm;
				var course_dept = document.AddCourseForm.dept;
				var course_lect = document.AddCourseForm.cl;
				var course_fi = document.AddCourseForm.cfi;
				var pre = document.AddCourseForm.pc;*/

				var course_code = $("#cd").val();
				var course_title = $("#ct").val();
				var semester = $("#cs").val();
				var yr = $("#cy").val();
				var course_descrip = $("#cdes").val();
				var course_obj = $("#co").val();
				var course_mat = $("#cm").val();
				var course_dept = $("#dept").val();
				var course_lect = $("#cl").val();
				var course_fi = $("#cfi").val();
				var pre = $("#pc").val();
				

				if (course_code == ""){
					window.alert("Please enter the course code");
					//course_code.focus();
					document.getElementById("cd").focus;
					return false;
				}
				if (course_title == ""){
					window.alert("Please enter the course the title or name");
					//course_title.focus();
					return false;
				}
				if (semester == ""){
					window.alert("Please enter the semester the course is taken");
					//semester.focus();
					return false;
				}
				if (yr == ""){
					window.alert("Please enter the year in which the course is taken");
					//yr.focus();
					return false;
				}
				if (course_descrip == ""){
					window.alert("Please enter the course Description");
					//course_descrip.focus();
					return false;
				}
				if (course_obj == ""){
					window.alert("Please enter the course objective");
					//course_obj.focus();
					return false;
				}
				if (course_mat == ""){
					window.alert("Please enter the course materials");
					//course_mat.focus();
					return false;
				}
				if (course_dept == ""){
					window.alert("Please enter the course materials");
					//course_dept.focus();
					return false;
				}
				if (course_lect == ""){
					window.alert("Please enter the course lecturer(s)");
					//course_lect.focus();
					return false;
				}
				if (course_fi == ""){
					window.alert("Please enter the course FI(s)");
					//course_fi.focus();
					return false;
				}
				if (pre == ""){
					window.alert("Please enter the course prerequisite(s)");
					//pre.focus();
					return false;
				}
				//return true;
			}

			function sendRequest(u){
			var obj=$.ajax({url:u,async:false});
			var result=$.parseJSON(obj.responseText);
			return;
		}

		function gothere(){
			var course_code = $("#cd").val();
				var course_title = $("#ct").val();
				var valk=document.AddCourseForm.cs.value;
				var semester = valk;
				var yr = $("#cy").val();
				var course_descrip = $("#cdes").val();
				var course_obj = $("#co").val();
				var course_mat = $("#cm").val();
				var course_dept = $("#dept").val();
				var course_lect = $("#cl").val();
				var course_fi = $("#cfi").val();
				var pre = $("#pc").val();

				if (course_code == ""){
					window.alert("Please enter the course code");
					//course_code.focus();
					document.getElementById("cd").focus;
					return false;
				}
				if (course_title == ""){
					window.alert("Please enter the course the title or name");
					//course_title.focus();
					return false;
				}
				if (semester == ""){
					window.alert("Please enter the semester the course is taken");
					//semester.focus();
					return false;
				}
				if (yr == ""){
					window.alert("Please enter the year in which the course is taken");
					//yr.focus();
					return false;
				}
				if (course_descrip == ""){
					window.alert("Please enter the course Description");
					//course_descrip.focus();
					return false;
				}
				if (course_obj == ""){
					window.alert("Please enter the course objective");
					//course_obj.focus();
					return false;
				}
				if (course_mat == ""){
					window.alert("Please enter the course materials");
					//course_mat.focus();
					return false;
				}
				if (course_dept == ""){
					window.alert("Please enter the course materials");
					//course_dept.focus();
					return false;
				}
				if (course_lect == ""){
					window.alert("Please enter the course lecturer(s)");
					//course_lect.focus();
					return false;
				}
				if (course_fi == ""){
					window.alert("Please enter the course FI(s)");
					//course_fi.focus();
					return false;
				}
				if (pre == ""){
					window.alert("Please enter the course prerequisite(s)");
					//pre.focus();
					return false;
				}
	            var strUrl = "extend.php?cd="+course_code+"&ct="+course_title+"&cs="
					+semester+"&cy="+yr+"&cdes="+course_descrip+"&co="+course_obj+"&cm="+course_mat+
					"&dept="+course_dept+ "&cl="+course_lect+"&cfi="+course_fi+"&pc="+pre;
				var send=sendRequest(strUrl);
				prompt(strUrl);
				alert(send);
				if(send.result==1){
					alert(send.message);
					return;
				}
		}

		$(function(){
			$('#AddCourseForm').submit(function(e){
				//do form processing
				e.preventDefault();
				gothere();
			});
		});

		function addbt(){
			validateAddCourseForm();
			gothere();
		}