# Bavanco

## record user activity
- Add geo stats to trait?
- Complete cards specific stats
- Add API auth?
- Move api into queued events?


## Low Priority
- update favicon with new font
- header to change group colors each time it goes back to top
- Merge normalize.css into app.css
- Meta description



# GoDaddy Deployment

git pull origin master

composer install --no-dev -o

php artisan vendor:publish
php artisan geoip:update


## main app
rm -rf /home/adrianbav/public_html/staging.bavanco.co.uk/css/
rm -rf /home/adrianbav/public_html/staging.bavanco.co.uk/images/

cp -r public/css /home/adrianbav/public_html/staging.bavanco.co.uk/
cp -r public/images /home/adrianbav/public_html/staging.bavanco.co.uk/
