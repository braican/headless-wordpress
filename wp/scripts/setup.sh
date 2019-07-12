#!/bin/bash

set -e

# Ensure MySQL connection is up before proceeding.
until mysql -u$WORDPRESS_DB_USER -p$WORDPRESS_DB_PASSWORD -h$WORDPRESS_DB_HOST $WORDPRESS_DB_NAME; do
  >&2 echo "Waiting for MySQL ..."
  sleep 1
done

# Configure WordPress
if [ ! -f wp-config.php ]; then
	echo "Configuring WordPress..."
	wp config create --dbname=$WORDPRESS_DB_NAME --dbuser=$WORDPRESS_DB_USER --dbpass=$WORDPRESS_DB_PASSWORD --dbhost=$WORDPRESS_DB_HOST --extra-php <<PHP
// This allows the WordPress site to run securly behind the ups-dock reverse proxy
if ( strpos( \$_SERVER['HTTP_X_FORWARDED_PROTO'], 'https' ) !== false ) {
	\$_SERVER['HTTPS'] = 'on';
}
define( 'WP_DEBUG', true );
PHP
fi
