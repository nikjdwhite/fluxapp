<!DOCTYPE html>

<?php

	if (isset($_POST["cardtext"])) {
		$cards = simplexml_load_file("cards.xml");
		$card = $cards->addChild("card");
		$card->addChild("cardtext", $_POST["cardtext"]);
		$card->addChild("signature", $_POST["signature"]);
		$cards->asXML("cards.xml");
	}

?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <title>Fluxus Cards</title>

  <link rel="stylesheet" href="js/superslides/dist/stylesheets/superslides.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
 
</head>
<body>
  <div id="slides">
    <ul class="slides-container" id="slides-list">
		<li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1134.jpg" />
		</li><li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1156.jpg" />
		</li><li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1160.jpg" />
		</li><li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1162.jpg" />
		</li><li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1164.jpg" />
		</li><li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1167.jpg" />
		</li><li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1168.jpg" />
		</li><li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1169.jpg" />
		</li><li>
			<img src="http://thestudio.uiowa.edu/fluxus/sites/default/files/fluxus1155.jpg" />
		</li>

		
		<?php 

			$xml = simplexml_load_file("cards.xml");
			foreach ($xml->card as $slide){
				print '<li>';
				print '<img src="images/template.jpg" />';
				print '<div class="container">';
				print '<p class="cardtext">'.$slide->cardtext.'</p>';
				print '<p class="signature">'.$slide->signature.'</p>';
				print '</div>';
				print '</li>';
			}

		?>
		<li>
			<img src="images/template.jpg"/>
			<div class="container">
				<form id="addCard" action="fluxapp.php" method="post">
					<textarea class="input-lg" id="cardtext" name="cardtext" cols="40" placeholder="Create a Fluxus Event."></textarea>
					<br/>
					<br/>
					<input class="input-lg" type="text" id="signature" name="signature" size="50" placeholder="Take credit."/>
					<br/>
					<input id="savecard" class="btn btn-lg" type="submit" value="Add your event."/>
				</form>
			</div>
		</li>
    </ul>

    <nav class="slides-navigation">
      <a href="#" class="next">
		<button type="button" class="btn btn-default btn-lg">
			<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
		</button>
	  </a>
      <a href="#" class="prev">
	    <button type="button" class="btn btn-default btn-lg">
			<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
		</button>
	  </a>
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
