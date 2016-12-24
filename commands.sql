create database nowall_login;

use nowall_login;

create table users (
	id int primary key auto_increment,
	name varchar(32),
	password varchar(32),
	created_at datetime
);
