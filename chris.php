<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>tap demo</title>
  <link rel="stylesheet" href="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.css">
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script>
  <style>
  html, body { padding: 0; margin: 0; }
  html, .ui-mobile, .ui-mobile body {
    height: 85px;
  }
  .ui-mobile, .ui-mobile .ui-page {
    min-height: 85px;
  }
  #nav {
    font-size: 200%;
    width:17.1875em;
    margin:17px auto 0 auto;
  }
  #nav a {
    color: #777;
    border: 2px solid #777;
    background-color: #ccc;
    padding: 0.2em 0.6em;
    text-decoration: none;
    float: left;
    margin-right: 0.3em;
  }
  #nav a:hover {
    color: #111;
    border-color: #111;
    background: #eee;
  }
  #nav a.selected,
  #nav a.selected:hover {
    color: #0a0;
    border-color: #0a0;
    background: #afa;
  }
  div.box {
    width: 8em;
    height: 8em;
    background-color: #108040;
  }
  div.box.tap {
    background-color: #7ACEF4;
  }
  </style>
</head>
<body>
 
<h3>Tap the green square to see the above code applied:</h3>
<div class="box"></div>
 
<script>
$(function(){
  $( "div.box" ).bind( "tap", tapHandler );
 
  function tapHandler( event ){
    $( event.target ).addClass( "tap" );
  }
});
</script>
 
</body>
</html>