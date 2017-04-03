<?php
list($lat, $lng) = explode(',', $villa->room_google_map);

echo "<script>
$(document).ready(function(){
     var map = new GMaps({
      div: '#map', lat: " . $lat .", lng: ". $lng ."
      });

     map.addMarker({
      lat: ". $lat .",
      lng: ". $lng .",
      title: 'Lima',
      click: function(e) {
        // alert('You clicked in this marker');
      },
      infoWindow: {
        content: '<p>" . $villa->google_map_title ."</p>'
      }
    });
  });
  </script>";
?>