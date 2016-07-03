<?php
/*  If a barcode has been submitted, initiate the API query   */
if (isset($_POST["barcode"])){
	$barcode=$_POST["barcode"];
	/*testing: */
	//$barcode="35209006573030";
	$ExlAPIKey="l7xx6ff17de53ac24c4495e0b5522e546b41";
	
	$apiQuery="https://api-na.hosted.exlibrisgroup.com/almaws/v1/items?item_barcode=$barcode&apikey=$ExlAPIKey";
	$xml=simplexml_load_file($apiQuery);
	$isbn=$xml->bib_data->isbn;
	$title=$xml->bib_data->title;
	$author=$xml->bib_data->author;
	
	
	
	$worldcatAPIKey="t6n2mJL58l0c7lpCktNPaSd44iPdUNOzYj0izGOXS7pyTQHTaFE95vGCFK18kpWYYR6xT7jQUhQAm1tx";
	
	
	$zip="97219";
	$wcApiQuery="http://www.worldcat.org/webservices/catalog/content/libraries/isbn/$isbn?location=$zip&wskey=$worldcatAPIKey";
	
	$wcXml=simplexml_load_file($wcApiQuery);
	
	foreach ($wcXml->holding as $holding){
		$location=$holding->physicalLocation;
		
		echo $location."<br/>";
	
	
	}
	
	
	/* */



}

?>


<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title></title>
 </head>
 <body>
 
 	<div id="input"> 
 		<form action='app.php' method='post'>
 		Enter Barcode: <input type='text' name='barcode' />  <input type='submit' id='submit' value='submit'>
 		</form> 	
 	</div>
 	
 	<div id="output"> 
 <?php
 var_dump($_REQUEST);
 if (!empty($xml)){
 
 echo "$title / $author / $isbn";
 
 var_dump($wcXml);
 
 echo $wcApiQuery;
 }
 ?>
 
 
 
 	</div>
 
 
 
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
 </body>
</html>
