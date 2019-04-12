#!C:\Perl64\bin\perl.exe

use CGI;
use strict;
use warnings;
use HTTP::Request;
use LWP::UserAgent;

$q = CGI->new();
#my $site = $q->param('url');   # Initialsi it to be equal to the input box

print "Content-type: text/plain; charset=iso-8859-1\n\n";
#print $q->header("text/plain");
print "Hello";