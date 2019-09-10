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
