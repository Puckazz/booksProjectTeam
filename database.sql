use quanlisach;
create table customers(
ID_customer nvarchar(20) primary key,
name_customer nvarchar(30),
username nvarchar(20),
password_customer nvarchar(20),
email nvarchar(20),
number_phone varchar(11),
address nvarchar(50)
);

create table authors(
ID_tacgia  varchar(10) primary key,
author_name nvarchar(30),
birthOfDay date,
birthOfDay_die date,
address nvarchar(50)
);
create table store(
ID_book varchar(20) primary key,
book_count int
);

create table publishers(
name_publisher nvarchar(50) primary key
);

create table TYPEBOOK(
name_typeBook nvarchar(20) primary key
);

create table bill(
ID_bill varchar(20) primary key,
name_customer nvarchar(20),
date_of_bill date,
total double
);
create table category(
name_category_book nvarchar(20) primary key
);


create table BOOK(
ID_Book varchar(20) primary key,
name_book nvarchar(60),
discount double,
name_category_book nvarchar(20),
name_typeBook nvarchar(20),
buyPrice double,
salePrice double,
edition int,
name_publisher nvarchar(50),
year_publish int,
constraint fk_ID_book foreign key(ID_Book) references store(ID_Book),
constraint fk_name_category_book foreign key(name_category_book) references category(name_category_book),
constraint fk_name_typeBook foreign key(name_typeBook) references TYPEBOOK(name_typeBook),
constraint fk_name_publisher foreign key(name_publisher) references publishers(name_publisher)
);
alter table BOOK
add ID_tacgia varchar(20);
alter table BOOK
add constraint fk_id_tacgia foreign key(id_tacgia) references authors(id_tacgia)
;
create table detail_bill(
ID_bill varchar(20),
ID_Book varchar(20),
quantity int,
price double,
total_price double,
constraint fk_ID_bill foreign key(ID_bill) references bill(ID_bill),
constraint fk_ID_Book_detail foreign key(ID_book) references BOOK(ID_Book)
);