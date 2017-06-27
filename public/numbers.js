var HOST = 'http://' + window.location.host;


var integerToRoman = function () {
	$.post(HOST + '/numbertoroman', {integer: $('input[name=integer]').val() }).done(function(data){
		//console.log(data);
		
		if (data.data){
			$('#roman').html(data.data.roman);
		} 
	}).fail(function(err) {
		$('#roman').html("Out of range.");
	});	
};

var getLastValues = function () {
	
	$.get(HOST + '/numbertoroman', function(data){
		//console.log(data);
		
		if (data.data){
			var list = '<ul>';
			for(var i=0; i<data.data.length; i++) {
				list += '<li>' + data.data[i].integer + ' - ' + data.data[i].roman + '</li>';
			}
			list += '</ul>';
			$('#results').html(list);
		}
	});	
};

var getTop10 = function () {
	$.get(HOST + '/numbertoroman/top10', function(data){
		//console.log(data);
				
		if (data.data) {
			var list = '<ol>';
			for(var i in data.data){
				list += '<li>' + data.data[i].integer + ' - ' + data.data[i].roman + '</li>';
			}
			list += '</ol>';
			$('#results').html(list);
		}
	});	
};
