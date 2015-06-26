#!/bin/bash

free=`free -mt | grep Total | awk '{print $4}'`

if [ $free -lt 48000 ]; then
        ps -eo %mem,pid,user,args >/root/processes.txt
        echo 'Warning, free memory is '$free'mb' | mail -s "Elib Memory alert" aa0344@wayne.edu < /root/processes.txt
fi

