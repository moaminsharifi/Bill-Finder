<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/bigmpc/Bill-Finder/raw/master/doc/assets/bill_header.png" width="auto"></a></p>


## About Bill Finder
At first Let's check problem:
Think You must Bulk purchasing different item or buy different thing like usb drive and after 10 months You can't find how much and where you bought it?

# Bill Finder

Bill Finder is webapp help to save Bills and Receipts with specific metadata like :
- Bill Basic information
- building (location of buy) 
- category 
- items

When store such data like this then You Never forget where bought what and get some basic report.

##### About Laravel:
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


## Api Document


## Run Project (on local)
- Check [laravel server requirements](https://laravel.com/docs/8.x#server-requirements)
- Clone repo with
```shell script
git clone https://github.com/bigmpc/Bill-Finder
```
- copy `.env.example` file to `.env` and update it ([help about how to choose `.env` variables](#help-env)):
```shell script
cp .env.example .env
```
- Install Packages
```shell script
composer install
```
- Prepare Database And Migrate
```shell script
php artisan migrate
```
- Install Passport Keys:
```shell script
php artisan passport install
```
- Import Some Dumpy Data (optical):
```shell script
php artisan db:seed
```

### Todo

- [ ] Add Item Functionality and Tests
- [ ] Assert More complex on `BillManagerApiTest.php`
- [ ] Add Api Documentation
- [ ] Update Project Description
- [ ] Add `.env` Documentation
- [ ] Add FrontEnd Project Version


## License:
- The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
- Icon In Logo made by <a href="https://www.flaticon.com/authors/payungkead" title="Payungkead">Payungkead</a>
 
