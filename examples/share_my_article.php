<?php
$article_title = "My article title";
$article_content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at nunc vel mauris aliquam porta vel sit amet sapien. Nulla sem neque, iaculis egestas porttitor ac, mollis bibendum elit. Aliquam sit amet dui at felis dictum accumsan a sed augue. Sed eget turpis non odio posuere sodales. Nulla rutrum blandit posuere. Suspendisse at urna ipsum, a condimentum ipsum. Vestibulum elementum enim ut quam tincidunt placerat. Morbi fringilla egestas pellentesque. Etiam lacinia arcu eu lacus interdum a tempus libero semper. Praesent a nisi tortor. Sed magna quam, lacinia at facilisis ut, scelerisque non metus.
			
Pellentesque vestibulum, magna sit amet posuere suscipit, ligula odio commodo risus, eget eleifend augue diam in ante. Sed condimentum velit ac urna condimentum ut porttitor arcu ullamcorper. Fusce ornare, velit quis dictum sagittis, erat eros convallis neque, sed vulputate magna elit sit amet elit. Donec auctor arcu a augue sollicitudin ut ornare nunc faucibus. In quis dui id arcu sodales fermentum. Proin sollicitudin commodo pretium. Donec non mattis purus. Aenean sit amet eros at risus adipiscing varius egestas at justo. Phasellus in diam non libero sagittis ultricies sit amet eu turpis. Integer rhoncus pulvinar tellus et rutrum. Vestibulum eros nulla, convallis vel ornare vel, mattis quis eros. Sed dolor sapien, feugiat varius dictum consectetur, pellentesque et nibh. Phasellus imperdiet lacus a odio mollis eu blandit nisl bibendum. Nunc ut diam sit amet dolor viverra auctor. Donec porta metus vel justo tempor sodales. Nulla vulputate tristique neque id laoreet. Morbi volutpat adipiscing enim id fringilla.

Vivamus id purus risus. Ut lorem nunc, sollicitudin dapibus porta at, lobortis vel tellus. Vestibulum nec eros lacus, eget luctus nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed imperdiet posuere ante, quis consequat turpis viverra non. Fusce posuere lectus sed turpis dapibus commodo a vel turpis. In eleifend lectus diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec eu risus in dolor gravida accumsan at vel orci. Donec molestie tempor tristique. ";

$link_to_article = "http://foo.com/article";

$share_message = "Hey !
I've just discovered an article called $article_title on MyWebsite.com !

Come check it out !

$link_to_article";
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	</head>
	<body>
		<div id="my_article">
			<h1><?php echo $article_title;?></h1>
			<span>
				<?php echo $article_content;?>
			</span>
		</div>
		<br />
		Share to my contacts
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
					popupcenter("../contactInvite/handle.php?default_message=<?php echo urlencode($share_message);?>&provider="+$(this).attr('rel'),'provider',600,600);
				});
			});
		</script>
	</body>
</html>
