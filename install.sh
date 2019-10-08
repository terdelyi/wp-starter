#!/usr/bin/env bash
# WordPress install script
# Tamas Erdelyi <terdelyi@gmail.com>
# (c) 2019

# Exit on error
set -o errexit

if [ ! -d "vendor" ]; then
	echo -e "\e[101mERROR: Run composer install first!\033[0m"
    exit 1
fi

# Setup WP CLI path
WP_CMD='vendor/bin/wp'

# Include env file
. .env

# Starts a new block
startblock () {
	echo -e "\e[95m===== $1\033[0m"
}

# Ends a block
endblock () {
	echo
}

# Download WP core files into the wp-cli path
clear
startblock "Download WordPress files"
	${WP_CMD} core download
	mv ${WP_PATH}/wp-content ./
	ln -s $PWD/wp-content $PWD/${WP_PATH}
endblock

# Install WP to the database
startblock "Install WordPress into the database"
	${WP_CMD} core install --url=${SITE_URL} --title="${SITE_TITLE}" --admin_name=${ADMIN_USER} --admin_password=${ADMIN_PASSWORD} --admin_email=${ADMIN_EMAIL}
endblock

# Install required plugins
if [ -f "plugins.txt" ]; then
	startblock "Install plugins defined in plugins.txt"
	    ${WP_CMD} plugin install --activate $(<plugins.txt)
	endblock
fi