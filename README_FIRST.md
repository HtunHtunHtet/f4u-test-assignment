##INSTALLATION

- Clone Repo
- perform ```composer install``` to install vendors
- run dbdump.sql
- run `php App.php` 

##TEST RUN COMMAND

```./vendor/bin/phpunit --bootstrap vendor/autoload.php UnitTestFiles/Test/AddressTest.php```

```./vendor/bin/phpunit --bootstrap vendor/autoload.php UnitTestFiles/Test/ClientsTest.php```