#!/usr/bin/php
<?php
require_once("config.php");
require_once("tmdb_v3.php");

$tmdb_V3 = new TMDBv3(TMDB_API_KEY);
$tmdb_V3->setLang("en");

$searchOption="";
$obj="";
$opts = getopt("i:n:",array());

if(isset($opts['n']))
{
	$obj = $tmdb_V3->searchMovie($opts['n']);

	echo str_pad("tmdb_id",8," ",STR_PAD_LEFT)." | ".str_pad("Release Date",12," ",STR_PAD_LEFT)." | Title\n";

	foreach($obj['results'] as $searchResult)
	{
		echo str_pad($searchResult['id'],8," ",STR_PAD_LEFT)." | ".str_pad($searchResult['release_date'],12," ",STR_PAD_LEFT)." | {$searchResult['title']}\n";
	}
}
elseif(isset($opts['i']))
{
	$obj = $tmdb_V3->movieDetail($opts['i']);
	
	$output = $outputTemplate;
	$output = str_replace( "%TMDB_ID%",			htmlentities($obj['id']), $output);
	$output = str_replace( "%IMDB_ID%",			htmlentities($obj['imdb_id']), $output);
	$output = str_replace( "%DATE_RELEASED%",	htmlentities($obj['release_date']), $output);
	$output = str_replace( "%TITLE%",			htmlentities($obj['title']), $output);
	$output = str_replace( "%ORIGINAL_TITLE%",	htmlentities($obj['original_title']), $output);

	print $output;
}
else
{
	echo "Specify -i for id or -n for name\n";
	exit(1);
}
exit(0);
?>
