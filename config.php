<?php

include_once 'config.private.php';
//define('TMDB_API_KEY' ,'');

//output tags XML
$outputTemplate = <<<END
<?xml version='1.0' encoding='UTF-8'?>
<!DOCTYPE Tags SYSTEM 'matroskatags.dtd'>
<Tags>
	<Tag>
		<Simple>
			<Name>TITLE</Name>
			<String>%TITLE%</String>
		</Simple>
		<Simple>
			<Name>DATE_RELEASED</Name>
			<String>%DATE_RELEASED%</String>
		</Simple>
		<Simple>
			<Name>IMDB_ID</Name>
			<String>%IMDB_ID%</String>
		</Simple>
		<Simple>
			<Name>TMDB_ID</Name>
			<String>%TMDB_ID%</String>
		</Simple>
		<Simple>
			<Name>ORIGINAL_TITLE</Name>
			<String>%ORIGINAL_TITLE%</String>
		</Simple>
		<Simple>
			<Name>IMDBURL</Name>
			<String>%IMDBURL%</String>
		</Simple>
		<Simple>
			<Name>TMDBURL</Name>
			<String>%TMDBURL%</String>
		</Simple>
	</Tag>
</Tags>
END;

$outputNfoTemplate = <<<END
<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>
<movie>
    <title>%TITLE%</title>
    <originaltitle>%ORIGINAL_TITLE%</originaltitle>
    <userrating>%USER_RATING%</userrating>
    <uniqueid type="tmdb" default="true">%TMDB_ID%</uniqueid> <!-- add a value to type="" eg imdb, tmdb, home, sport, docu, see sample below -->
    <country>%COUNTRY%</country>
    <director>%DIRECTOR%</director>
    <premiered>%PREMIERED%</premiered> <!-- yyyy-mm-dd -->
    <studio>%STUDIO%</studio>
</movie>
END;
