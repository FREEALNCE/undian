
<h1>Step Configuration CMS Laravel</h1>
<br><br>

## Setting .env

Set `.env` database (`DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)


## Open PHP Folder and Open php.ini file

`php.ini -> active extension: exif & gd2`

## Open Terminal or Command Prompt, type:

`php artisan db:seed --class=UserTable`

Then:
`composer install`

Then:
`composer update`

Then:
`php artisan storage:link`

Finally:
`php artisan serve`

