
# Book Store

All ecommerce project Features included in this project.

## What Features Include in this project
User Features
- Register Login Logout
- Add to cart system
- Search products (multiple search)
- Order system
- Contact with message
- Write review
- Delete own review
- Watch clientsʼ ordered history who wrote review
- Can subscribe to get new product notification

Admin Features
- Check all users
- Check products (crud)
- Check pending orders and completed orders
- Check income
- Check review
- Check messages
- Check subscribers

Real admin 
(username - julian , email - julian@gmail.com and password - professional)
- All admin features
- Can permit to be user as normal admin
- Check normal adminʼs posted products list
- Can search users
- Can delete normal admin's admin permit
## Build With
- Laravel (Laravel is a free, open-source PHP web framework.This framework is what i mainly use in this project)
- Html, Css, Javascript and Bootstrap
## Installation

 - Clone this repo 
 - database setup

```bash
  DB_DATABASE=your_db_name
  DB_USERNAME=your_db_username
  DB_PASSWORD=your_db_password // if no password ,u can leave as blank
```
 - U need to connect mailtrap
 
```bash
  MAIL_HOST=smtp.mailtrap.io
  MAIL_PORT=2525
  MAIL_USERNAME=your_mailtrap_project_username
  MAIL_PASSWORD=your_mailtrap_project_password
  MAIL_ENCRYPTION=null
  MAIL_FROM_ADDRESS=your_mailtrap_project_address
```
 - Run commands
  
```bash
  php artisan migrate 
  php artisan storage:link
```
- Now u can test this project by run this command.
  
```bash
  php artisan serve
```




