
//var baseurl=  window.location.origin + '/cms/public';
var baseurl=  window.location.origin + '';
//alert(baseurl + "/set-language");
function setlang(value){
	//alert(baseurl + "/set-language");
  $.ajax({
  	url: baseurl + "/set-language",
  	data:{data:value},
  	success: function(result){
		//alert(result);
   	location.reload();
  }
});
}



