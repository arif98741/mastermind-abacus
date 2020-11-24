#!/bin/bash
#https://gist.github.com/arif98741/6a3881ac7ca93d3e86c37bf676e3c016
echo \

if cd /var/www/html/mastermindabacusbd.com; then

	echo "=========================================================="
	echo "Welcome to Shell for Pulling"
	echo "Created By: Ariful Islam"
	echo "----Version: 1.0.0---"
	echo "--https://github.com/arif98741----"
	echo "=========================================================="
	echo "Using PHP Version : "
  php -v

	echo "Git Remote: "
	git remote -v
	echo \

 	sudo git branch
	#sudo git fetch --all
	sudo git checkout production
	sudo git  pull
	sudo git merge dev
	echo \
	echo "Getting data from branch: production"

	echo \
	echo "Thanks for using shell command"

else
	echo "could not run shell on var/www/html/mastermindabacusbd.com"
fi
