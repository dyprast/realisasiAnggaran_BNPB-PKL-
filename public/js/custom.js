function dropdown(){
	var z = document.getElementById('child-dropdown');
	if(z.className === 'child-dropdown hide'){
		z.className = 'child-dropdown show';
	}
	else{
		z.className = 'child-dropdown hide';
	}
}
function sidenav(){
  var x = document.getElementById('sidenav-respons');
  if (x.className === "sidenav") {
    x.className += " show";
  }
  else{
    x.className = "sidenav";
  }
}
$(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    });