<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 80%;
    width : 80%;
    margin-left: 150px;
    margin-bottom: 300px;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    width:100%;
    padding: 0;
  }                       
</style>                                      
</head>                                           
  <body>                                            
    <div id="map"></div>
    <script>
      var map; 
      var labels = "123456789";
      var labelIndex = 0;

      function initMap(){

        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo($_SESSION['lati']); ?>, 
          lng: <?php echo($_SESSION['long']); ?>},
          zoom: 14
        });

        var myLatLng = {lat:<?php echo($_SESSION['lati']); ?>, 
        lng: <?php echo($_SESSION['long']); ?>};

        var image = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon : image,
          title: 'My Location'
        });

        <?php
          $k=0;
          foreach ($map_array as $map){
          ++$k;
        ?>
            var myLatLng<?= $k; ?> = { lat: <?= $map['Lat']; ?>, 
            lng: <?= $map['Lon']; ?>};

            var marker_<?= $k; ?> = new google.maps.Marker({
                                        position: myLatLng<?=$k?>,
                                        label: labels[labelIndex++ % labels.length],
                                        map: map,
                                        title: "<?= $map['NAME']; ?>",
                                      });
        <?php } ?>
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo14MKAm0mz7__d57f_g4knXgw9jhpe5U&callback=initMap"
    async defer></script>
