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
	
	$(document).on('load',function(){
		$('select[data-linkage]').each(function(){
			var $select = $(this);
			var data = $select.data();
			if(data.target) {
				var target = $(data.target);
				var targetData = target.data();
				if(target && target.url) {
					$select.on('change',function(){
						$.get(target.url,function(res){
							if(res.code == 0 ) {
								target.remove().append(assembleOptions(res.data,target.val()));
							}
						});
					});
				}
			}
		});
	});

	
}(jQuery);