<body style="padding: 20px;">
    <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <header>
        <a id="inline" href="#inline1" >show map</a>
    </header>
    <div role="main">
        <div id="inline1" style="width:800px; height: 350px; display: none;">
            <div id="map_canvas" style="width: 100%; height: 100%"></div>
        </div>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

    <script src="js/plugins.js"></script>
    <script src="fancybox/libs/jquery.fancybox.pack.js"></script>
    <script src="fancybox/libs/jquery.mousewheel-3.0.6.pack.js"></script>
    <script src="js/script.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<?php include ("fancybox.html"); ?>
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.0.6"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.0.6" media="screen" />

    <script type="text/javascript">
    var map="";
    $(document).ready(function(){
     $("a#inline").fancybox({
      'hideOnContentClick': false, // so you can handle the map
      'overlayColor'      : '#ccffee',
      'overlayOpacity'    : 0.2,
      'autoDimensions': true, // the selector #mapcontainer HAS css width and height
      'beforeShow': function(){
        google.maps.event.trigger(map, "resize");
      },
      'onCleanup': function() {
       var myContent = this.href;
       $(myContent).unwrap();
      } // fixes inline bug
     });
     // map
     map = new google.maps.Map(
      document.getElementById("map_canvas"), {
      zoom: 9,
      center: new google.maps.LatLng(49.261226,-123.113928),
      mapTypeId: google.maps.MapTypeId.TERRAIN
      }   
     );
    }); // ready
</script>
</body>
