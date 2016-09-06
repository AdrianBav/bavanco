# Bavanco

## Top Jobs
- ?

## Low Priority
- Add API auth?
- Cron job to update IP package
- header to change group colors each time it goes back to top (or just monopoly page?)
- update favicon with new font
- Meta descriptions in layout file



# GoDaddy Deployment

git pull origin master

composer install --no-dev -o (not every time)

php artisan vendor:publish (first time only)
php artisan geoip:update

php artisan assets:publish
