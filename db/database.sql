create database if not exists ensc_ecommerce character set utf8 collate utf8_unicode_ci;
use ensc_ecommerce;

grant all privileges on ensc_ecommerce.* to 'ensc_ecommerce_user'@'localhost' identified by 'ensc';
