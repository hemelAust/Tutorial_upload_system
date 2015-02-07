<!-- 
	Author : Md. Arman Ahmed
 -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Video Upload System</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php
			include 'database/connect.php';
		?>
		<div id="box">
			<form method="post" enctype="multipart/form-data">
			<?php
				if(isset($_FILES['video'])){
					$name = $_FILES['video']['name'];
					$type = explode('.', $name);
					$type = end($type);
					$size = $_FILES['video']['size'];
					$random_name = rand();
					$tmp = $_FILES['video']['tmp_name'];

					if($type != 'mp4' && $type != 'MP4' && type != 'flv'){
						$message = "Video formet is not supported!!";
					}else{
						move_uploaded_file($tmp, 'videos/'.$random_name.'.'.$type);
						mysql_query("INSERT INTO videos VALUES('','$name','videos/$random_name.$type')");
						$message = "Video Uploaded Successfully!!"; 
					}

					echo $message;
				}
			?>
				<label>Select Video</label><br /><br />
				<input type="file" name="video"><br /><br />
				<input type="submit" value="Upload">
			</form>
		</div>
		<div id="box">
			<?php
				$query = mysql_query("Select `id`,`name`,`url` from videos");
				$video_name = "";
				$video_url = "";
				while($run = mysql_fetch_array($query)){

					$video_id = $run['id'];
					$video_name = $run['name'];
					$video_url = $run['url'];
				}

			?>
			<a href='view.php?video=<?php echo $video_url ; ?>'></a>
			<div id="url">
				<?php
					echo $video_name;
				?>
			</div>

		</div>
	</body>
</html>