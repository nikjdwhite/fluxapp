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
	
	$(function() {
      var $slides = $('#slides');

      Hammer($slides[0]).on("swipeleft", function(e) {
        $slides.data('superslides').animate('next');
      });

      Hammer($slides[0]).on("swiperight", function(e) {
        $slides.data('superslides').animate('prev');
      });

      $slides.superslides({
        hashchange: true
      });
    });
	
	

});
