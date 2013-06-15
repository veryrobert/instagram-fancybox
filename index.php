<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="jquery.fancybox-1.3.4.css" type="text/css">
	<script type='text/javascript' src='jquery.min.js'></script>
	<script type='text/javascript' src='jquery.fancybox-1.3.4.pack.js'></script>
	<script type="text/javascript">
		$(function() {
			$("a.group").fancybox({
				'nextEffect'	:	'fade',
				'prevEffect'	:	'fade',
				'overlayOpacity' :  0.8,
				'overlayColor' : '#000000',
				'arrows' : false,
			});			
		});
	</script>

	<?php
		// Supply a user id and an access token
		$accessToken = "3035988.ab103e5.c15ad0bb5bca4941b6f94a127329915f";
		$userid = "3035988";
		

		// Gets our data
		function fetchData($url){
		     $ch = curl_init();
		     curl_setopt($ch, CURLOPT_URL, $url);
		     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		     curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		     $result = curl_exec($ch);
		     // $result = 10;
		     curl_close($ch); 
		     return $result;

		}
		
		$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}&count=6");
		$result = json_decode($result);

	?>

<?php $items=6; $i=0; ?>


	<?php foreach ($result->data as $post): ?>

<a class="group" rel="group1" href="<?= $post->images->standard_resolution->url ?>"><img src="<?= $post->images->thumbnail->url ?>"></a> 

	<?php endforeach ?>


</html>