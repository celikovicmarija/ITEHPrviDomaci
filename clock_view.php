<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>What's the time?</title>
		<style type="text/css">
			body {
				margin: 0;
				padding: 0;
			}
			
			#wrapper {
				width: 50%
			}
			
			#clock {
				width: 60%;
				color: black;
				margin: 2px ;
				text-align: left;
				font-size: 25px;
			}
			}
		</style>
		<script type="text/javascript">
			var start_time;
			var current_time;
			
			//gets current server time
			var get_time = function () {
				$.ajax({
					type: 'GET',
					url: 'timestamp.php',
					data: ({ action : 'get_time' }),
					success: (function (data) {
						start_time = new Date(
							data.year, 
							data.month, 
							data.day, 
							data.hour, 
							data.minute, 
							data.second
						);
						$('#clock').html(current_time.toLocaleTimeString());
					}),
					dataType: 'json'
				});
			}
			
			//counts 0.25s
			var cnt_time = function () {
				current_time = new Date(start_time.getTime() + 250);
				$('#clock').html(current_time.toLocaleTimeString());
				start_time = current_time;
			}
			
			setInterval(cnt_time, 250); //add 250ms to current time every 250ms
			setInterval(get_time, 30250); //sync with server every 30,25 second
			get_time();
		</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="clock"></div>
			
		</div>
	</body>
</html>