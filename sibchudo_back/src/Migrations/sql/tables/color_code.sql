drop table if exists color_code cascade;
create table color_code
(
    id      serial primary key,
    code    varchar(2) unique,
    name    text not null,
    name_ru text
)