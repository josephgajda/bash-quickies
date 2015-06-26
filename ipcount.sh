#!/bin/bash
zerosize() {
  if [ $(ls -l "$1" | awk '{print $5}') -eq 0 ]
  then return 1
  else return 0
  fi
}
RunDate=`date --date=today +%Y'-'%m'-'%d`
#echo $RunDate
`grep -hv 141.217 /iiidb/httpd/logs/access_log.$RunDate | awk '$9~/marc~/' | awk '{freq[$3]++} END { for (ip in freq)  printf "%d\t%s\n",  freq[ip] ,ip }' |sort -n |tail -n20 | sort -rn | awk '{if ($1 > 170) print $1,$2}' > /home/ellog/weblog/marcipcount.log`
lfile="/home/ellog/weblog/marcipcount.log"
if zerosize "$lfile" ; then awk < /home/ellog/weblog/marcipcount.log '{print $1," ",$2}' |  mail -s "Marc Ip count exceedes the threshhold" aa8288@wayne.edu,aa0344@wayne.edu,josephgajda@gmail.com
fi
awk '$9~/patroninfo/' /iiidb/httpd/logs/access_log.$RunDate | awk '{freq[$3]++} END { for (ip in freq)  printf "%d\t%s\n",  freq[ip] ,ip }' |sort -n |tail -n20 | sort -rn | awk '{if ($1 > 1000) print $1,$2}' > /home/ellog/weblog/patripcount.log
lfile="/home/ellog/weblog/patripcount.log"
if zerosize "$lfile" ; then awk < /home/ellog/weblog/patripcount.log '{print $1," ",$2}' |  mail -s "Patron Ip count exceedes the threshhold" aa8288@wayne.edu,aa0344@wayne.edu,josephgajda@gmail.com
fi
