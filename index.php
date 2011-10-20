<!DOCTYPE script PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
	<title>AJAX Proxy Demo</title>
</head>
<body>
	<h1>AJAX Proxy Demo</h1>
	<form id="ajaxForm" onsubmit="return false">
	User 
	<input type="text" name="users" id="user"/>
	<button id="submit" value="Submit">Submit</button>
	</form>
	
	<div id="results" style="display: hidden">
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript">
	$('#submit').click(function (){
		$.ajax({
		  type: 'POST',
		  url: '/Post.php',
		  data: $('#ajaxForm').serialize(),
		  success: function(data){
			$('#results').show();
			if (data && data.users) {
				for (var i in data.users) {
					$('#results')
					console.log('name: ' + data.users[i].twitter_screen_name);
					console.log('score: ' + data.users[i].kscore);
					var str = 'Twitter User: <span>' + data.users[i].twitter_screen_name + '</span><br>';
					str += 'Klour Score: <span>' + data.users[i].kscore + '</span><br>';
				}
	
				$('#results').html(str);
			} else {
				alert('No Users in response');
			}			
		  },
		  dataType: "json"
		});
	});
</script>