# Instagram Fancybox PHP plugin wit count limited

I was on the look out for a simple instagram feed but couldn't find anything that was just a simple pull in of images. 

## Stuff I did find was:

 [Jquery instagram]:http://potomak.github.io/jquery-instagram/

 and 

[Instagram API + Fancybox Simplified]: http://www.blueprintinteractive.com/blog/how-instagram-api-fancybox-simplified

I'm using the fancybox with the small change of limiting the default count of 20

`$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}&count=6");`

You'll need your Client id and Access code for this to work but you can use a third party to access them.

[For example]: http://jelled.com/instagram/access-token


## Here's the code

				<?php
				// Supply a user id and an access token
				$accessToken = "YourAcessToken";
				$userid = "UserID";


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

				// Pulls and parses data.
				$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}&count=6");
				$result = json_decode($result);

				?>

				<?php $items=6; $i=0; ?>


				<?php foreach ($result->data as $post): ?>

				<a class="group" rel="group1" href="<?= $post->images->standard_resolution->url ?>"><img src="<?= $post->images->thumbnail->url ?>"></a> 

				<?php endforeach ?>
