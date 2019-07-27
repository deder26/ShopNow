<!DOCTYPE html>
<html>
<head>
<meta name="_token" content="{{ csrf_token() }}">
<title>Live Search</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
<br>
<div class="container">
<div class="form-group">
	<input type="text" name="search" id="search" />
	<div id="product"></div>
</div>
@csrf
<script>
$(document).ready(function(){ 
$('#search').keyup(function(){
var query=$(this).val();
if(query !=''){
	var _token = $('#input[name = "_token"]').val();
$.ajax({
url: "{{route('search')}}",
method: "POST",
data:{query:query,_token:_token},
success:function(data){
	$('#product').fadeIn();
$('#product').html(data);
}
});
}

});

});
</script>
</div>
</body>
</html>