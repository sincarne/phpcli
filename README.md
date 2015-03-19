phpcli
======

PHP Command Line Scripts

webloc2md.php
-------------

Point the script at a directory containing `.webloc` files, and it will create a markdown unordered list with the names of the files linked to the URL inside. Requires files to be in XML format, not binary. They can be converted with [plutil](https://developer.apple.com/library/mac/#documentation/Darwin/Reference/ManPages/man1/plutil.1.html)

makeul.php
----------

Gets input via `stdin`. Converts each line of what's input into a separate list item in an unordered list. On a Mac, recommended usage is:

    pbpaste | makeul.php | pbcopy

forecast.php
------------

Get a quick summary of the current weather conditions from http://forecast.io. Before use, you'll need to get an API key from http://developer.forecast.io.
