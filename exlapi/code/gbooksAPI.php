<?php	
	$isbn="9781592968503";
	
	/* construct my REST request URL */
	$url = "https://www.googleapis.com/books/v1/volumes?q=isbn:$isbn";
	
	/* query the API */
	$json = file_get_contents($url);
	
	/* Turns JSON data into an "object" that PHP can use */
	$data = json_decode($json);

	/* Targets the "thumbnail" field in the response, and creates 
	variable "$image" that contains the thumbnail value */	
	$image=$data->items[0]->volumeInfo->imageLinks->thumbnail;
	
	/* create $html variable with HTML to display image */
	$html="<img src='$image'>";
	
	/* outputs the image */
	echo $html;
?>