<html>
  <head>
    <title>Kent State University</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        margin: 0;
        padding: 0;
        height: 100%;
      }
    </style>
  </head>
  <body>
    <script type="text/javascript">
      var a=['iPad','iPod','iPhone','Android'];
      for(var i=0;i<a.length;i++)
      {
        var p=new RegExp(a[i],'i');
        if(!!p.test(navigator.userAgent))
        {
          document.location='<?php echo variable_get('kent_state_maps_url', '') ?>';
        }
      }
    </script>
    <iframe src="<?php echo variable_get('kent_state_maps_url', '') ?>" width="100%" height="1000px"  scrolling="no" border="0" frameBorder="0" style="border:0px solid #000; margin:0; padding:0;">
      <p>Your browser does not support iframes.</p>
    </iframe>
  </body>
</html>
