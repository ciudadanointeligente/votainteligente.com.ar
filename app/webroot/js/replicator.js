function addAnother(idFieldset, newLabel){
    var maxId = 0;
    var currentId = 0;
    $('['+idFieldset+']').each(function(index,fieldset){
	currentId = $(fieldset).attr(idFieldset);
	if (currentId>maxId) {
	    maxId = currentId;
	}
    });
    var newId = parseInt(maxId)+1;
    var lastFieldSet = $('['+idFieldset+'="'+currentId+'"]');
    var newElement = lastFieldSet.clone();
    var remainingIdsOfThePrevious = 'input[type="hidden"][name^="data['+idFieldset+']"][name$="[id]"]';
    $(remainingIdsOfThePrevious,newElement).remove();
    $(":input, label",newElement).each(function(index,element){
	prepareInput(element,currentId,newId,idFieldset);
	resetValue(element);
    });
    newElement.filter('fieldset').attr(idFieldset,newId);
    appendDeleter(newElement,idFieldset,newId);
    newElement.find('legend').html(newLabel);
    if(typeof ensureConsistencyForANewElement == "function"){
	ensureConsistencyForANewElement(newElement);
    }
    newElement.insertAfter(lastFieldSet).hide().toggle(2000);
}
function appendDeleter(newElement,idFieldset,newId){
    $('a[href^="javascript:deleteFieldset(\''+idFieldset+'\',"]',newElement).remove();
    $('a[href^="javascript:deleteARemoteElement(\'"]',newElement).remove();
    newElement.append('<a href="javascript:deleteFieldset(\''+idFieldset+'\','+newId+')">Eliminar</a>');
}
function deleteFieldset(attr,value){
    $('fieldset['+attr+'="'+value+'"]').toggle(2000,function(){
	$(this).remove();
    });
}
function deleteARemoteElement(url,fielsetName,idFieldset){
    $.post(url,{},function(data,textStatus) {
      if(data.success){
	  deleteFieldset(fielsetName,idFieldset);
      }
    },
    'json'
);
}
function resetValue(input) {
    if (!$(input).is('input')) {
	return;
    }
    var type = $(input).attr('type').toLowerCase();
    var checkableElements = ['radio','checkbox'];
    var elementsWithValue = ['password','select-multiple','select-one','text','textarea'];
    if ($.inArray(type,checkableElements)>-1) {
	$(input).attr('checked',false);
	return;
    }
    if ($.inArray(type,elementsWithValue)>-1) {
	$(input).val('');
	return;
    }
}
function prepareInput(input,currentId,newId,idFieldset) {
    var attrs = input.attributes;
    var newNodeName = '';
    var regex = null;
    var name = null;
    var matches = null;
    for(var i=0;i<attrs.length;i++) {
	if(attrs[i].nodeName.toLowerCase() != "type") {
	    newNodeValue = attrs[i].nodeValue.replace('['+currentId+']','['+newId+']');
	    regex = new RegExp(idFieldset+currentId+"\\D");
	    matches = newNodeValue.match(regex);
	    if ( matches != null && matches.length > 0 ) {
		name = matches[0].substr(0,matches[0].length-1);
		newNodeValue = newNodeValue.replace(name,idFieldset+newId);
	    }
	    $(input).attr(attrs[i].nodeName,newNodeValue);
	}
    }
}