#!/bin/bash

#VARIALBLES
sync_directory="/global/pub/cgi_blogsdir"
sync_list_dir="/tmp/"
sync_command="echo bob"

new_list="/${sync_list_dir}blog_img_new_list.txt"
old_list="/${sync_list_dir}blog_img_old_list.txt"

function sync_dir {
	$sync_command
	#Log sync & time
	echo "Synced directory: $sync_directory at "$(date);
}

#Get current listing of directory
ls -lR "$sync_directory" > "$new_list"

#Make sure old list is there and writable
if [ -w "$old_list" ]
	then
		#compare with last listing using diff
		diff --brief "$new_list" "$old_list" > /dev/null 2>/dev/null
		
		#if different then there's something new, so trigger sync
		if [ "$?" -eq 1 ]
		then 
			#run custom sync command
			sync_dir
		fi
		
		#Remove old listing
		rm "$old_list"
	else
		#run custom sync command
		sync_dir

fi

#make new listing into last listing 
mv "$new_list" "$old_list"
