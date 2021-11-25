<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About This Project

This is a sample project user subscription 

## API Routes

### Website listing
Get -- /api/website-list

### Subscribe user to a website
GET -- /api/subscribe-to-website 
parameter => user_id[int], website_id[int]

### Creating Post
PUT -- /api/create-post
parameters => website_id[int], post_title[text], post_description[text], post_content[text]

## Command to send emails
php artisan sendMail

## Create user
PUT -- /api/user
parameters => name[string], email[email]