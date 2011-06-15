# Quri URL Shortener (CakePHP 1.3)

URL shortening platform written in CakePHP 1.3. Takes a URL, adds it to a database and gives the user a short URL with a unique hash (slug) which lets them access it later. Any traffic passing through the shortened URL is logged for end user statistics.

## Installation
1) Download the source code from the repo and extract to your web server.
2) Create the database tables from the included quri.sql file.
3) Edit app/config/core.php
	3a Change The Security.salt (Line 204) value to a random sequence of integers and characters.
	3b Change The Security.cipherSeed (Line 209) value to a random sequence of integers.
4) Edit app/config/database.php
	4b Set your database auth information as required
	
## Features
* Generates a base 16 slug for a given URL.
* Redirects to the home page if no slug is given.
* Creates a new URL row in the database for each instance of a URL so stats can remain independant.
* Fetches a QR code for a given short URL for use with mobile.
* Features detailed statistics for URLS, including but not limited to.
	* Visitors by country (displayed in a pie chart).
	* User agents (pie chart).
	* Total clicks.
	* Total unique clicks.
	* Latest visitors, with IP address, date accessed, user agent and referer.
	
## To be added
* Disregard anything other than alphanumerics in the slug.
* Clicks over days statistic.
* User account system.
* API for use with other software.
* Integration with social media services (Ie share with..)
* [DONE] Publicly available information (prepend the slug with /stat/ to show the original URL and other data, know what you're clicking before you click)

## Change log

### 0.15
* Public information now available at foob.ar/i/slug
* Made prefixes for information and statistics on URLs shorter, they're now /s/ for statistics and /i/ for information.
* Added validation to the add page to ensure only URLs are entered.

_— [Ben](benanderton@gmail.com)_


