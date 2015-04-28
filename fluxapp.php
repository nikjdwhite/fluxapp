<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Fluxus Cards</title>

  <link rel="stylesheet" href="js/superslides/dist/stylesheets/superslides.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
 
</head>
<body>
  <div id="slides">
    <ul class="slides-container" id="slides-list">
		<li>
			<img src="images/first.png"/>
		</li>
		<li>
			<img src="images/second.png"/>
		</li>
		
		<?php 

			$xml = simplexml_load_file("cards.xml");
			foreach ($xml->card as $slide){
				print '<li>';
				print '<img src="images/default.png"/>';
				print '<div class="container">';
				print '<p class="cardtext">'.$slide->cardtext.'</p>';
				print '<p class="signature">'.$slide->signature.'</p>';
				print '</div>';
				print '</li>';
			}

		?>
		<li>
			<img src="images/default.png"/>
			<div class="container">
				<form id="addCard">
					<textarea id="cardtext" placeholder="Create a Fluxus Event."></textarea>
					<input type="text" id="signature" placeholder="Take credit."/>
					<input id="savecard" class="btn btn-default btn-lg" type="button" value="Add your event."/>
				</form>
			</div>
		</li>
    </ul>

    <nav class="slides-navigation">
      <a href="#" class="next">Next</a>
      <a href="#" class="prev">Previous</a>
    </nav>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="js/superslides/dist/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
  <script src="js/hammer/hammer.js" type="text/javascript" charset="utf-8"></script>
  
  <script>
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
   </script>
  
  <!---->
 
</body>
</html>
