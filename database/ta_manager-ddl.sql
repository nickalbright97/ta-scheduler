--ta_manager.ddl
create database ta_manager;
use ta_manager;
create user 'ta_manager_app'@'localhost' identified by '$3kuDoG';
grant all privileges on ta_manager.* to 'ta_manager_app'@'localhost';

create table people (
    id int not null auto_increment,
    eid varchar(8) not null unique,
    pass varchar(64) not null unique, --64 chars is length of sha 256 hash
    roleStr varchar(10)
    primary key (id)
);
create table feedback (
    id int not null auto_increment,
    course_code varchar(10),
    prof varchar(30),
    session_start_time datetime,
    session_end_time datetime,
    primary key (id)
);
create table shift_request (
    id int not null auto_increment,
    dropper int not null, --may not be needed
    picker int,
    comments varchar(200),
    shift int not null,
    foreign key (shift) references shift(id),
    foreign key (dropper) references people(id),
    foreign key (picker) references people(id),
    primary key (id)
);
create table shift (
    id int not null auto_increment,
    shift_owner int not null,
    session_start_time datetime not null,
    session_end_time datetime not null,
    foreign key (shift_owner) references people(id),
    primary key (id)
);
