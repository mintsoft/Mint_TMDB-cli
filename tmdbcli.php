#!/usr/bin/php
<?php
require_once("config.php");
require_once("tmdb_v3.php");

$tmdb_V3 = new TMDBv3(TMDB_API_KEY);
$tmdb_V3->setLang("en");

$searchOption="";
$obj="";
$opts = getopt("y:i:n:lap",array());

function renderSearchResults($obj)
{
	foreach($obj['results'] as $searchResult)
	{
		echo str_pad($searchResult['id'],8," ",STR_PAD_LEFT)."|".str_pad($searchResult['release_date'],10," ",STR_PAD_LEFT)."|{$searchResult['title']}\n";
	}
}

if(isset($opts['n']))
{
	$obj = $tmdb_V3->searchMovie($opts['n'], isset($opts['y'])?$opts['y']:-1);
	echo str_pad("tmdb_id",8," ",STR_PAD_LEFT)."|".str_pad("Release",10," ",STR_PAD_LEFT)."|Title\n";
	renderSearchResults($obj);
	if(isset($opts['a']))
	{
		//add more pages!
		for($pageNum=2;$pageNum<=$obj['total_pages'];++$pageNum)
		{
			$obj = $tmdb_V3->searchMovie($opts['n'], isset($opts['y'])?$opts['y']:-1,$pageNum);
			renderSearchResults($obj);
		}
	}
	else if($obj['total_pages']>1)
		echo "# Multiple Pages of results ({$obj['total_pages']}) returned - only the first is displayed, use -a for all\n";

}
elseif(isset($opts['i']))
{
	if(isset($opts['p']))
	{
		echo str_pad("Size",9," ",STR_PAD_LEFT)."|".str_pad("w/h",4," ",STR_PAD_LEFT)."|Rating|URL\n";
		$obj = $tmdb_V3->moviePoster($opts['i']);
		foreach($obj as $posterObj)
		{
			echo str_pad("{$posterObj['width']}x{$posterObj['height']}",9," ",STR_PAD_LEFT)."|".
					number_format($posterObj['aspect_ratio'],2)."|".number_format($posterObj['vote_average'],4)."|".
					$tmdb_V3->getImageURL().$posterObj['file_path'] . "\n" ;
		}
	}
	else
	{
		$obj = $tmdb_V3->movieDetail($opts['i']);

		$output = $outputTemplate;
		$output = str_replace( "%TMDB_ID%",			htmlentities($obj['id']), $output);
		$output = str_replace( "%IMDB_ID%",			htmlentities($obj['imdb_id']), $output);
		$output = str_replace( "%DATE_RELEASED%",	htmlentities($obj['release_date']), $output);
		$output = str_replace( "%TITLE%",			htmlentities($obj['title']), $output);
		$output = str_replace( "%ORIGINAL_TITLE%",	htmlentities($obj['original_title']), $output);

		print $output;
		//-l means don't include the extra \n on the end of the file
		if(!isset($opts['l']))
		{
			echo "\n";
		}
	}
}
else
{
	echo "Specify -i for id or -n for search by name\n";
	exit(1);
}

exit(0);
?>
