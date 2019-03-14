# Installation
To use this application, you have to create a database and import `db.sql` into it.

Then, you have to insert your database informations in `bin/PDO/PDOConnections.php`

```php
const USER = "<user>";
const PASSWORD = "<password>";
const DNS = 'mysql:host=<host>;dbname=<dbname>';
```

# Description

_Project given during the AIS Hackathon (03/13/2019)_

>A groupe of friends who are in love with space and code used to make space observation nights. But now, they grew up and dispersed worldwide. 
>
>In order to reunite these friends once a year to make space observation like the good old times, we want you to make an application to know which person is the closest to the ISS (International Space Station) at a given date.
>
>To access the web plateform, you have to create an account including your city and country.

Technologies used :
  * PHP (>5.0)
  * MySQL
  * Javascript



Contributors
  * Samy VERA
  * Adrien VAUCARD

