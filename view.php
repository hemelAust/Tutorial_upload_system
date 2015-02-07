<!-- 
	Author : Md. Arman Ahmed
 -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Video Upload System</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="//vjs.zencdn.net/4.11/video-js.css" rel="stylesheet">
		<script src="//vjs.zencdn.net/4.11/video.js"></script>
	</head>
	<body>
		<?php
			include 'database/connect.php';
		?>
		<div id="box">
			<?php
				$video = "";
				$video = $_GET['video'];
			?>
			<video id="example_video_1" class="video-js vjs-default-skin"
			  controls preload="auto" width="100%" height="450"
			  poster="http://video-js.zencoder.com/oceans-clip.png"
			  data-setup='{"example_option":true}'>
			 	<source src="videos/<?php echo $video; ?>" type='video/mp4' />
			 	
			</video>


		</div>
	</body>
</html>