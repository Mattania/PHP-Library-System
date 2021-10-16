# OHHS Library Management System

#### This is a Digital Library Management System to used by staff to Login, catalogue books in inventory and manage patrons accounts.

## Technologies
* Bootstrap 5
* PHP 8.0
* CSS3
* HTML5
* xampp

## Setup
To run this project, install xampp then git clone the repo inside xampp folder
```
$ cd C:\xampp\htdocs\Web_Individual
```
Start apache server and enter in url
```
localhost/Web_Individual/HSindex.php
```

## How it works?
Validates the user log in and book inputs, and if an error occurs it outputs an appropriate error message, or redirects to the appropriate page if valid.

All valid book data are displays in a table and is saved to HSbookdata.txt.

It uses sessions and cookies to  hold the data to display in the table and to store in the text file.
