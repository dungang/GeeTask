+function($){
	
	function assembleOptions(data,value) {
		var options = '';
		for(var p in data ) {
			var txt = data[p];
			if(p == value) {
				options += "<option value='"+p+"' selected >"+txt+"</option>";
			} else {
				options += "<option value='"+p+"'>"+txt+"</option>";
			}
		}
		return options;
	}
	
	function process(){
		var $select = $(this);
		var data = $select.data();
		var name = data.name;
		if(data.target && data.name ) {
			var target = $(data.target).empty();
			var targetData = target.data();
			if(target && targetData.url && $select.val() != '') {
				var param = {};
				param[name] = $select.val();
				$.getJSON(targetData.url,param,function(res){
					if(res.code == 0 ) {
						target.append(assembleOptions(res.data,targetData.value));
					}
				});
			}
		}
	}

	$.fn.linkageSelect = function(){
		$(document).off('change.site.linkage').on('change.site.linkage','select[data-linkage]',process);
		$('select[data-linkage]').each(process);
	}
}(jQuery);