#!/bin/sh -x
if [ "$1" = "build" ]; then
	screen -dmS build1 docker build -t mathtimer1-challenge mathy
	docker build -t ssh-nsh1-challenge sshy
	docker build -t http-pingbuster ./pingbuster/
	docker build -t http-cookietime ./cookietime/
	docker build -t http-hackerzone ./hackerzone/
	docker build -t http-mainlogin ./mainlogin/
	docker build -t http-dirbuster ./dirbuster/
	docker build -t http-putmore ./putmore
	docker build -t ssh-brute-challenge ./sshbrute/
	docker build -t pwn-babysfirst ./babysfirst
	docker build -t pwn-birdsandbees ./birdsandbees
	docker build -t pwn-countingbackwards ./countingbackwards
	docker build -t pwn-learntoread ./learntoread
	docker build -t pwn-learntowrite ./learntowrite
	docker build -t pwn-oneblock ./oneblock
	docker build -t pwn-slowmotion ./slowmotion
	docker build -t http-bacon ./bacon
	docker build -t http-bookreader ./bookreader
	docker build -t http-ishare ./ishare
	docker build -t http-webinator ./webinator/
elif [ "$1" = "activate" -o "$1" = "run" ]; then
	docker run -dp 7676:7676 mathtimer1-challenge
	docker run -dp 8888:80 http-pingbuster
	docker run -dp 8080:80 http-mainlogin
	docker run -dp 7000:80 http-cookietime
	docker run -dp 7070:80 http-dirbuster
	docker run -dp 5000:80 http-putmore
	docker run -dp 2222:22 ssh-nsh1-challenge
	docker run -dp 4312:22 ssh-brute-challenge
	docker run -dp 6001:5555 pwn-babysfirst
	docker run -dp 6002:5555 pwn-birdsandbees
	docker run -dp 6003:5555 pwn-countingbackwards
	docker run -dp 6004:5555 pwn-learntoread
	docker run -dp 6005:5555 pwn-learntowrite
	docker run -dp 6007:5555 pwn-oneblock
	docker run -dp 6008:5555 pwn-slowmotion
	docker run -dp 8484:80 http-bacon
	docker run -dp 8877:80 http-bookreader
	docker run -dp 8444:80 http-ishare
	docker run -dp 6644:80 http-webinator
	#mv /var/www/notindex.html /var/www/index.html 2>/dev/null || error 0
elif [ "$1" = "clean" ]; then
	docker stop $(docker ps -a -q)
	docker rm $(docker ps -a -q)
else
	echo "Error: Valid Options: build, activate, clean"
fi
