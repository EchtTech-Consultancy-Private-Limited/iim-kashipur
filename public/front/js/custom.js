
//var baseurl=  window.location.origin + '/cms/public';
// var baseurl=  window.location.origin + '/office_project/app/public';  move in header
//alert(baseurl + "/set-language");
function setlang(value){
	//alert(baseurl + "/set-language");
  $.ajax({
  	url: baseurl + "/set-language",
  	data:{data:value},
  	success: function(result){
	    // alert(result.data);
        if(result.data == 'en')
         {
           alert('This will lead you to हिन्दी language. Are you sure to switch to this language?')
         }
        else
         {
            alert('यह आपको English भाषा में ले जाएगा। क्या आप वाकई इस भाषा में स्विच करना चाहते हैं?')
         }

   	 location.reload();
  }
});
}


function setvisitor(value){
  $.ajax({
  	url: baseurl + "/my-cms-mgmt",
  	success: function(result){
	//alert(result);
   	//location.reload();
 	 }
	});
}

setvisitor();


