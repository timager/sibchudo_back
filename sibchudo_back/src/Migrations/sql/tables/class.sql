drop table if exists class cascade;
create table class
(
    id serial primary key,
    name varchar(50) unique not null,
    name_ru varchar(50) not null,
    description text
)