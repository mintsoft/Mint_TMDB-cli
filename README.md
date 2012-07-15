Similiar to MintAutoNameTV, this is a script to wrap up a php class and provide a CLI for it.

Tagging
=======

Populate the template XML and output the result to stdout for the indicated TMDB ID.
```
tmdbcli -i <TMDB_ID>
```
* <code>-i <TMDB_ID> </code> specifies which ID
* <code>-l</code> can be used to omit the final/'extra' \n from the output

Searching
=========

Search by name for a film and returns a formatted table (designed for human consumption)
```
tmdbcli -n <Film> [-y <Year>] [-a]
```
* <code>-n</code> the name of the film
* <code>-y <Year></code> can be used to specify the year of release
* <code>-a</code> can be used to retrieve all results. WARNING - this may be very slow for large numbers of result pages.
	
Examples
========
Find Star Wars Films in 1999 (Star Wars: Episode I - The Phantom Menace)
```
tmdbcli -y 1999 -n 'Star Wars'
```

Find all "Star Wars" Films (approx 50 in tmdb)
```
tmdbcli -a -n 'Star Wars' 
```
