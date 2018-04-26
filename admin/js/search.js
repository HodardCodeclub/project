$('#search').keyup(function(){
var search_term=$(this).val();
/* post in few details has three parameters 1. file we ll use to send result  
											2. value we want to send 
											3. call back function
											*/
$.post('php/getStates.php',{search_term: search_term},function(data){
	$('#search_results').html(data); 
});
});
