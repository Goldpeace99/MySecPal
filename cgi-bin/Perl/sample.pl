#!C:\Perl64\bin\perl.exe
use strict;
use warnings;

print "Content-type: text/html \n\n";

print "<html> <head> <title> Sample Program </title> </head><body>";
print "<br/>","Server Name: ",$ENV{'SERVER_NAME'};
print "<h1> Holy Shit , It Works ! </h1> ";
print " </body> </html>";
