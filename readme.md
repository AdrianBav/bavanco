# Bavanco

## Top Jobs
- Rename leaderboard to popularity


## Low Priority
- Add geo stats to trait?
- Add API auth?
- header to change group colors each time it goes back to top (or just monopoly page?)
- update favicon with new font
- Meta descriptions in layout file



# GoDaddy Deployment

git pull origin master

composer install --no-dev -o (not every time)

php artisan vendor:publish (first time only)
php artisan geoip:update


## assets
rm -rf /home/adrianbav/public_html/staging.bavanco.co.uk/build/
rm -rf /home/adrianbav/public_html/staging.bavanco.co.uk/images/

cp -r public/build /home/adrianbav/public_html/staging.bavanco.co.uk/
cp -r public/images /home/adrianbav/public_html/staging.bavanco.co.uk/
