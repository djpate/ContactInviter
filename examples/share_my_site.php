<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	</head>
	<body>
		<div id="provider_container">
			<div class="provider">
				<a class="provider_launch" rel="gmail" href="#" >Invite my Gmail contacts</a>
			</div>
			<div class="provider">
				<a class="provider_launch" rel="yahoo" href="#">Invite my Yahoo! contacts</a>
			</div>
			<div class="provider">
				<a class="provider_launch" rel="live" href="#">Invite my Windows live contacts</a>
			</div>
		</div>
		<script>
		
		function popupcenter(pageURL, title,w,h) {
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		}
		
			$(document).ready(function(){
				$(".provider_launch").click(function(){
					popupcenter("../contactInvite/handle.php?provider="+$(this).attr('rel'),'provider',600,600);
				});
			});
		</script>
	</body>
</html>
