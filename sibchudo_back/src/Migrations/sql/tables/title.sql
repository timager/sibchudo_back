drop table if exists title cascade;
create table title
(
    id          serial primary key,
    code        varchar(4)  not null unique,
    name        varchar(50) not null,
    name_ru     varchar(50) not null,
    description text
)