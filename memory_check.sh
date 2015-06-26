#!/bin/bash
ps -eo %mem,pid,user,args >/root/processes.txt
