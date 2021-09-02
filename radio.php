<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="source/jquery-radiocharm.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
   var $y = jQuery.noConflict();
   //alert("Version: "+$y.fn.jquery);
</script>
<script src="source/jquery-radiocharm.js"></script>
<script>
$y(document).ready(function(){
$y('input:radio').radiocharm();
});
</script>