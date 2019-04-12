#!C:\Python36\python.exe

import socket
import cgi
import sys
from time import sleep

def isOpenUDP(ip, port):
	flag = False
	sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

	try:
		sock.settimeout(0.05)
		sock.sendto("group 2", ((ip, port)))
		time_UDP = datetime.datetime.now()
		key, addr = sock.recvfrom(1024)
		flag = True
	except socket.error:
		flag = False

	sock.close()
	return flag

form = cgi.FieldStorage()

ip = ""
dport = 0
uport = 0

if len(form) > 0:
	ip = form["ip"].value
	dport = form["dport"].value
	uport = form["uport"].value

print("Content-Type: text/html")
print("""

"""
)
print("""
	Running scan on: 
"""
)
print(
	ip
)
print("""
	.<br /> <strong>PORT</strong> &nbsp;&nbsp;&nbsp;&nbsp; <strong>STATE</strong> &nbsp;&nbsp;&nbsp;&nbsp; <strong>SERVICE</strong><br /> 
""" 
)

for port in xrange(dport, uport):
	print(
		port
	)
	if isOpenUDP(ip, port) == True:
		print("""
		/udp &nbsp;&nbsp;&nbsp;&nbsp; open &nbsp;&nbsp;&nbsp;&nbsp;
		"""
		)
	else:
		print("""
			/udp &nbsp;&nbsp;&nbsp;&nbsp; closed &nbsp;&nbsp;&nbsp;&nbsp;
		"""
		)