## ccwc.php command line tool

The unix wc tool challenge is provided by [John Crickett](https://www.linkedin.com/in/johncrickett)

wc is a command line tool built to generate file metric like:

- Number of lines
- Number of words
- Number of bytes
- Number of characters

Usage: wc [options] FILE [FILE...]


Print newline, word and byte for each file

positional arguments:  
FILE        take a file or a list of files

optional arguments:  
-h, --help  show this help message and exit  
-l, --line  print the line counts  
-c, --byte  print the byte counts  
-m, --char  print the character counts  
-w, --word  print the word counts

i.e:

> wc -m test.txt

*output:*  
    339292 test.txt

> php ccwc.php -m test.txt

*output:*  
339292 test.txt


[Link to assignment](https://codingchallenges.fyi/challenges/challenge-wc)