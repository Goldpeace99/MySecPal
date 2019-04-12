#!/home/mculabeu/python36/python

# encoding: utf-8

import socket
import cgi
import sys
from time import sleep

def isOpen(ip,port):
   s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
   try:
      s.connect((ip, int(port)))
      s.shutdown(2)
      return True
   except:
      return False


form = cgi.FieldStorage()

print("Content-Type: text/html")
print("""

"""
)

ip = ""
port = 0
way = ""

if len(form) > 0:
    ip = form["ip"].value
    port = int(form["port"].value)


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

print(
	port
)

if isOpen(ip, port) == True:
	print("""
		/tcp &nbsp;&nbsp;&nbsp;&nbsp; open &nbsp;&nbsp;&nbsp;&nbsp;
	"""
	)
else:
	print("""
		/tcp &nbsp;&nbsp;&nbsp;&nbsp; closed &nbsp;&nbsp;&nbsp;&nbsp;
	"""
	)