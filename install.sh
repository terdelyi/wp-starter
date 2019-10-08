#!/usr/bin/env bash
# WordPress install script by Tamas Erdelyi <terdelyi@gmail.com> (c) 2019

# Setup WP CLI path
WP_CMD="vendor/bin/wp";

# Check is Composer installed
if [ ! -d "vendor" ] || [ ! -f "${WP_CMD}" ]; then
	printf -- "\e[101mERROR: We need WP CLI, run composer install first!\033[0m\n"
    exit 1
fi

# Include env file
. .env

# Starts a new block
startblock () {
	printf -- "\e[95m===== $1\033[0m\n"
}

# Ends a block
endblock () {
	printf -- "\n";
}

# Download WP core files into the wp-cli path
clear
startblock "Download WordPress files"
	${WP_CMD} core download
	if [ ! -d "$PWD/wp-content" ]; then
		mv ${WP_PATH}/wp-content ./
		ln -s $PWD/wp-content $PWD/${WP_PATH}
	fi
endblock

# Install WP to the database
startblock "Install WordPress into the database"
	${WP_CMD} core install --url=${SITE_URL} --title="${SITE_TITLE}" --admin_name=${ADMIN_USER} --admin_password=${ADMIN_PASSWORD} --admin_email=${ADMIN_EMAIL}
endblock

# Install required plugins
PLUGINS='wp-plugins.txt';
if [ -f "${PLUGINS}" ] && [ ! -z "${PLUGINS}" ]; then
	startblock "Install plugins defined in plugins.txt"
	    ${WP_CMD} plugin install --activate $(<"${PLUGINS}")
	endblock
fi

# Bye-bye!
exit 0;