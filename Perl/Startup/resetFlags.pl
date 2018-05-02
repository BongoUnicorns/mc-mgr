#!/usr/bin/perl
use strict;
use warnings;

open(my $fh, '>', '/Applications/MAMP/htdocs/php/serverStatus.txt');
print $fh "000\n";
close $fh;
print "done\n";
