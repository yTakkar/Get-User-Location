<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Using HTML5 Geolocation For User's Location</title>
  </head>
  <body>
    <a href="#" id="get_location">Get Location</a><br>
    <iframe src="https://maps.google.co.in?output=embed" width="600" height="400" frameborder="0" scrolling="0" marginheight="0" marginwidth="0" id="google_maps"></iframe>

    <script type="text/javascript" src="modernizr.js">  </script>
    <script type="text/javascript">
      if (!Modernizr.geolocation) {
        console.log('Geolocation not supported!');
      } else {
        var c = function(pos){
          var lat = pos.coords.latitude,
              lon = pos.coords.longitude,
              coords = lat+", "+lon;
          document.getElementById('google_maps').setAttribute('src', 'https://maps.google.co.in/?q='+ coords +'&z=60&output=embed');
        }

        var link = document.getElementById('get_location');
        link.onclick = function(e){
          navigator.geolocation.getCurrentPosition(c, function(err){
            if (err.code === 1) {
              console.log('Unable to get Location');
            }
          });
          return false;
        }
      }
    </script>
  </body>
</html>
