$(document).ready(function(){
    $('#addAnotherCategory').click(function(event){
	 event.preventDefault();
	 var url = $(this).attr('href');
	 var dialog = $("#dialog");
	 if ($("#dialog").length == 0) {
	    dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
	 }
	 dialog.load(
	     url,
	     {},
	     function(responseText, textStatus, XMLHttpRequest) {
		dialog.dialog();
	     }
	 );
    });
});
function closeDialog(data){
    $('#idCategoryForNewQuestion option').remove();
    $('#idCategoryForNewQuestion').append(data);
    var dialog = $("#dialog");
    dialog.dialog( "close" );
}