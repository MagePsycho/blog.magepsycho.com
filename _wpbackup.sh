#!/bin/bash
#@author		MagePsycho <magepsycho@gmail.com>
#@website		http://www.magepsycho.com
#@blog			http://www.blog.magepsycho.com
#@version		0.1.0

#/************************ EDIT VARIABLES ************************/
projectName=mpycho_blog
backupDir=/home3/mpycho/_backups429
#/************************ //EDIT VARIABLES **********************/

fileName=$projectName-$(date +"%Y-%m-%d")
host=$(grep DB_HOST "wp-config.php" |cut -d "'" -f 4)
username=$(grep DB_USER "wp-config.php" | cut -d "'" -f 4)
password=$(grep DB_PASSWORD "wp-config.php" | cut -d "'" -f 4)
dbName=$(grep DB_NAME "wp-config.php" |cut -d "'" -f 4)

printf "What kind of backup you would like?\n[ d ] DB backup only\n[ f ] Files backup only\n[ b ] Files backup with DB\n"
read backupType
if [[ $backupType = @(d|b) ]]; then
	echo "----------------------------------------------------"
	echo "Dumping MySQL..."
	mysqldump -h "$host" -u "$username" -p"$password" "$dbName" | gzip > $fileName.sql.gz
	echo "Done!"
fi

if [[ $backupType = @(f|b) ]]; then
	echo "----------------------------------------------------"
	echo "Archiving Files..."
	tar -zcf $fileName.tar.gz * .htaccess
	echo "Done!"
	echo "----------------------------------------------------"
	echo "Cleaning..."
	rm -f $fileName.sql.gz
	echo "Done!"
fi

if [[ $backupType = @(d|f|b) ]]; then
	echo "----------------------------------------------------"
	mkdir -p $backupDir;
	echo "Moving file to backup dir..."
	if [[ $backupType == d ]]; then
		mv $fileName.sql.gz $backupDir
	fi

	if [[ $backupType = @(f|b) ]]; then
		mv $fileName.tar.gz $backupDir
	fi
	echo "Done!"
else
	echo "Invalid selection!"
fi
