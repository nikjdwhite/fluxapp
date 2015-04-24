$(document).ready(function() {
	var html = "";
	//console.log("in file");
	
	 $.getJSON("slides.js", function(result){
	//console.log("got slides");
        $.each(result, function(i, cards){
			$.each(cards, function(j, card){
				//console.log("in loop");
				//console.log(card);
				
				html += '<li>';
				html += '<img src="' + card.img + '"/>';
				html += '<div class="container"><div class="cardtext">' + card.txt + '</div></div>';
				html += '</li>';
				});
		});
		console.log(html);
		var target = document.getElementById("slides-list");
		target.innerHTML = html;
    });
	
	
	
	

});
