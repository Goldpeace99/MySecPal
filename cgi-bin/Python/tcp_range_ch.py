#!/usr/bin/python

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

ip    = ""
dport = 0
uport = 0

if len(form) > 0:
	ip    = form["ip"].value
	dport = int(form["dport"].value)
	uport = int(form["uport"].value)

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
	.<br /><strong><z>PORT</z></strong><strong><z>STATE<z></strong><br /><x>
""" 
)

uport += 1

for port in range(dport, uport):
	print(
		port
	)
	if isOpen(ip, int(port)) == True:
		print("""
		 </x><z>open</z><br /><x>
		"""
		)
	else:
		print("""
			</x><z>closed</z><br /><x>
		"""
		)