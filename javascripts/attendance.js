function getclass(str) {	
if (str == "") {
document.getElementById("list1").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} 
else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
   {
         document.getElementById("list1").innerHTML =
         xmlhttp.responseText;
   }
};
xmlhttp.open("GET","getclass.php?",true);
xmlhttp.send();
}
}
//////////////////////////////////////////////////////////////////////
function getbatch(str) {	
if (str == "") {
document.getElementById("list1").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} 
else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
   {
         document.getElementById("list1").innerHTML =
         xmlhttp.responseText;
   }
};
xmlhttp.open("GET","getbatch.php?",true);
xmlhttp.send();
}
}
-->
///////////////////////////////////////////////////////////////////////
function getsems(str) {
if (str == "") {
document.getElementById("list2").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
{
document.getElementById("list2").innerHTML =
xmlhttp.responseText;
}
};

xmlhttp.open("GET","getsems.php?q="+str,true);
xmlhttp.send();
}
}
-->
///////////////////////////////////////////////////////////////////////
function getsem(str,str1) {
if (str == "") {
document.getElementById("list2").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
{
document.getElementById("list2").innerHTML =
xmlhttp.responseText;
}
};

xmlhttp.open("GET","getsem.php?q="+str+"|"+str1,true);
xmlhttp.send();
}
}
/////////////////////////////////////////////////////////////////////////
function getcourse(str,str1) {	
if (str == "" || str1=="") {
document.getElementById("list3").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} 
else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
   {
         document.getElementById("list3").innerHTML =
         xmlhttp.responseText;
   }
};
xmlhttp.open("GET","getcourse.php?q="+str+"|"+str1,true);
xmlhttp.send();
}
}
//////////////////////////////////////////////////////////////////////////////////////////
function getdate(str,str1,str2) {	
if (str == "" || str1=="" || str2=="") {
document.getElementById("list4").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} 
else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
   {
         document.getElementById("list4").innerHTML =
         xmlhttp.responseText;
   }
};
xmlhttp.open("GET","getdates.php?q="+str+"|"+str1+"|"+str2,true);
xmlhttp.send();
}
}/////////////////////////////////////////////////////////////////////////////////////////
function getname(str) {
if (str == "") {
document.getElementById("list2").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
{
document.getElementById("list2").innerHTML =
xmlhttp.responseText;
}
};

xmlhttp.open("GET","getname.php?q="+str,true);
xmlhttp.send();
}
}
/////////////////////////////////////////////////////////////////////////////////////////
function getnames(str) {
if (str == "") {
document.getElementById("list1").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
{
document.getElementById("list1").innerHTML =
xmlhttp.responseText;
}
};

xmlhttp.open("GET","getnames.php?q="+str,true);
xmlhttp.send();
}
}
//////////////////////////////////////////////////////////////////////////////////////////
function getstaff(str) {	
if (str == "") {
document.getElementById("staffid").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} 
else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
   {
         document.getElementById("staffid").innerHTML =
         xmlhttp.responseText;
   }
};
xmlhttp.open("GET","getstaff.php?q="+str,true);
xmlhttp.send();
}
}
//////////////////////////////////////////////////////////////////////////////////////////
function getorder(str) {	
if (str == "") {
document.getElementById("orderid").innerHTML = "";
return;
} else {
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} 
else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function()
{
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
   {
         document.getElementById("orderid").innerHTML =
         xmlhttp.responseText;
   }
};
xmlhttp.open("GET","getorder.php?q="+str,true);
xmlhttp.send();
}
}
////////////////////////////////////////////////////////////////////
function getstaffkey(str) {
			if (str == "") {
			document.getElementById("stafid").innerHTML = "";
			return;
			} else {
			if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
			} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
			document.getElementById("stafid").innerHTML =
			xmlhttp.responseText;
			}
			};
            
			xmlhttp.open("GET","getstaffkey.php?q="+str,true);
			xmlhttp.send();
			}
			}
////////////////////////////////////////////////////////////
			function getstudkey(str) {
			if (str == "") {
			document.getElementById("studkeyid").innerHTML = "";
			return;
			} else {
			if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
			} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
			document.getElementById("studkeyid").innerHTML =
			xmlhttp.responseText;
			}
			};

			xmlhttp.open("GET","getstudkey.php?q="+str,true);
			xmlhttp.send();
			}
			}
//////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#hours0').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.thours0').each(function() { //loop through each checkbox
                
				
				this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.thours0').each(function() { //loop through each checkbox
                 
				this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
$(document).ready(function(){ 
    $("#hours0").change(function(){
      $(".thours0").prop('checked', $(this).prop("checked"));
      });
});
//////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
	
    $('#hours1').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.thours1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.thours1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
$(document).ready(function(){ 
    $("#hours1").change(function(){
      $(".thours1").prop('checked', $(this).prop("checked"));
      });
});
///////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#hours2').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.thours2').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.thours2').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
$(document).ready(function(){ 
    $("#hours2").change(function(){
      $(".thours2").prop('checked', $(this).prop("checked"));
      });
});
///////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#hours3').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.thours3').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.thours3').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
$(document).ready(function(){ 
    $("#hours3").change(function(){
      $(".thours3").prop('checked', $(this).prop("checked"));
      });
});
///////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#hours4').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.thours4').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.thours4').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
$(document).ready(function(){ 
    $("#hours4").change(function(){
      $(".thours4").prop('checked', $(this).prop("checked"));
      });
});
///////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#hours5').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.thours5').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.thours5').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
$(document).ready(function(){ 
    $("#hours5").change(function(){
      $(".thours5").prop('checked', $(this).prop("checked"));
      });
});
///////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#hours6').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.thours6').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.thours6').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
$(document).ready(function(){ 
    $("#hours6").change(function(){
      $(".thours6").prop('checked', $(this).prop("checked"));
      });
});
///////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $('#hoursoverall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.thoursoverall').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.thoursoverall').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
$(document).ready(function(){ 
    $("#hoursoverall").change(function(){
      $(".thoursoverall").prop('checked', $(this).prop("checked"));
      });
});
///////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(
function(){
$("#datepicker").datepicker({
changeMonth:true,
changeYear:true
});
});
            jQuery(function(){
                	jQuery("#title").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter the event title"
				});
				jQuery("#detail").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please enter the event detail"
				});
				jQuery("#date").validate({
					expression:"if(VAL) return true; else return false;",
					message: "please select the date"
				});
			});
////////////////////////////////////////////////////////////////////////////////////////////