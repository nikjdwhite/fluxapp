
$( "#savecard" ).click(function() {

	var cardtext = $( "#cardtext" ).val();
	var signature = $( "#signature" ).val();
	
	var html = '<li><img src="images/default.png"/><div class="container"><p class="cardtext">' + cardtext + '</p><p class="signature">' + signature + '</p></div></li>'
	
	$( "#slides-list" ).append(html);
	
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
