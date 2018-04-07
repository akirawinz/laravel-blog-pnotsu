<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
</head>
<body>
	<form action="">
		@csrf
		<input type="text" placeholder="title" name="title">
		<input type="text" placeholder="content" name="content">
		<input type="submit">
	</form>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
 </script>
<script>
	$('form').submit(function(e){
		e.preventDefault();
		// console.log($('form').serialize());
	 	// $.ajaxSetup({
	 	// 	headers:{
	 	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	 	// 	}
	 	// })
	 	$.ajax({
	 		url : '{{ route('store') }}',
	 		method:'POST',
	 		data : $('form').serialize(),
	 		success : function(res){
	 			console.log(res);
	 			if(res.status === 'success'){
	 				alert('added information');
	 				window.location.href = "{{ url('blog') }}"
	 			}
	 		}
	 	})
	 });
</script>
	
</body>
</html>