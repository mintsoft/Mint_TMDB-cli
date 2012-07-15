Similiar to MintAutoNameTV this is a script to wrap up a php class and provide a CLI for it.

filmTag -i <TMDB_ID> will populate the template XML and output the result to stdout
fimTag -l -i <TMDB_ID> will not have the "extra" \n on the end

==Searching==
filmTag -n <Film> allows you to search by name for a film and returns a table formatted like so:
	TMDB_ID | Release Date | Film Name

filmTag -y 1999 can be used to specify the year of release
filmTag -a can be used to retrieve all results. WARNING - this may be very slow for large numbers
	of result pages.
	
===Examples===
filmTag -y 1999 -n 'Star Wars'
	should find Star Wars: Episode I - The Phantom Menace
filmTag -a -n 'Star Wars' 
	should find all "Star Wars" films (approx 50 in tmdb)
