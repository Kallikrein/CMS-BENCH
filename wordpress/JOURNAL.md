### documentation

wordpress plans are directed to

- personal use
- freelancers (personal "PRO")
- small businesses ( physical stores)
- eCommerce (online stores)

easy to bootstrap, it proves challenging to maintain, version, test, redeploy, etc.

Wordpress business model is based on paid hosting, CDN register, automatic updates, etc.

The application is open source, but the cost of interfacing with its implementation is high, and there is no incentive to produce an easily managed solution.

### start

website "quick start" tunnel asks for account, backtracking

### source

- github sources are SVN sync replication
- there are only zipped packages

curl https://wordpress.org/latest.tar.gz | tar xz -C ./server --strip=1

### start server

one by one

docker run --name test-mysql --rm -it --env-file db.env -v $PWD/db:/var/lib/mysql mysql
docker run --name test-php --rm -it --env-file wordpress.env -p 80:80 -v $PWD/server:/var/www/html php:7.2-apache

`docker-compose up`

### server

open localhost:8080

Change language

### connection to DB

setup creation of config does not manage to connect.
I created a config.php from the sample, the site now throws a fatal error where DB user and password are logged with no precaution

`Fatal error: Uncaught Error: Call to undefined function mysql_connect() in /var/www/html/wp-includes/wp-db.php:1643 Stack trace: #0 /var/www/html/wp-includes/wp-db.php(639): wpdb->db_connect() #1 /var/www/html/wp-includes/load.php(427): wpdb->__construct('wordpress', 'abcdef', 'wpdb', 'mysql') #2 /var/www/html/wp-settings.php(120): require_wp_db() #3 /var/www/html/wp-config.php(90): require_once('/var/www/html/w...') #4 /var/www/html/wp-load.php(37): require_once('/var/www/html/w...') #5 /var/www/html/wp-blog-header.php(13): require_once('/var/www/html/w...') #6 /var/www/html/index.php(17): require('/var/www/html/w...') #7 {main} thrown in /var/www/html/wp-includes/wp-db.php on line 1643`

### dependencies

All wordpress dependencies have to be installed globally on the system.
There is no equivalent to npm dependencies
