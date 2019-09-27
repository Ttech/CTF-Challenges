import socket
import threading
import random
#import ctypes
import timeit
#from time import sleep
from math import pow

flag = "flag{moremath4me2231232}"
delay=4 #540
base=2
min=20
max=40

class ThreadedServer(object):
	def __init__(self, host, port):
		self.host = host
		self.port = port
		self.sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
		self.sock.bind((self.host, self.port))

	def listen(self):
		self.sock.listen(5)
		while True:
			client, address = self.sock.accept()
			client.settimeout(60)
			threading.Thread(target = self.listenToClient,args = (client,address)).start()

	def clientError(self,client,address,type):
		try:
			client.send("Wrong answer... You are too human. Try being a faster android")
			print("Client Closed: %s" % str(type))
			client.close()
		except:
			client.close()
			return False
	
	def listenToClient(self, client, address):
		size = 1024
		# start out timer and sensor
		tried = False
		start = timeit.default_timer()
		# calculate the answer for thread. i have no idea if this works right... 
  		# threading in python is hard.
		challenge = {}
		challenge['t'] = random.randint(pow(base,min),pow(base,max))%10
		challenge['u'] = random.randint(pow(base,min),pow(base,max))%10
		challenge['v'] = random.randint(pow(base,min),pow(base,max))%100
		challenge['w'] = random.randint(pow(base,min),pow(base,max))%100
		challenge['x'] = random.randint(pow(base,min),pow(base,max))
 		challenge['y'] = random.randint(pow(base,min),pow(base,max))
		challenge['ans'] = (challenge['x']*challenge['t'])/challenge['w']+(challenge['u']*challenge['w'])-challenge['y']
		# (x*t)/w+(u*w)-y
		print("Client %s Connected! Providing (%d*%d)/%d+(%d*%d)-%d=%d" % (address,challenge['x'],challenge['t'],challenge['w'],challenge['u'],challenge['w'],challenge['y'],challenge['ans']))
		#(%d*%d)/%d + %d = %d" % (str(address),challenge['x'],challenge['y'],challenge['ans']))
		while True:
			try:
				currtime = timeit.default_timer()
				if not tried:	
					client.send("Data's Entry System -\r\n\tSolve in %d Seconds: (%d*%d)/%d+(%d*%d)-%d = ...\r\n" % (delay,challenge['x'],challenge['t'],challenge['w'],challenge['u'],challenge['w'],challenge['y']))
					answer = client.recv(size)
				else:
					self.clientError(client,address,"invalid answer")
				if answer and (currtime-start)<delay and not tried:
					tried=True
					if int(answer)==challenge['ans']:
						print("Correct answer from: %s" % str(address))
						client.send("Congratulations you might be an android... The flag is %s\r\n" % flag)
						return True
					else:
						self.clientError(client,address,"invalid answer")
				else:
					self.clientError(client,address,"invalid answer")
			except Exception,e:
				self.clientError(client,address,"invalid answer")
				return False

if __name__ == "__main__":
	ThreadedServer('',7676).listen()
