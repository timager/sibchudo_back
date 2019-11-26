drop table if exists color_code cascade ;
create table color_code
(
    code    varchar(2) primary key,
    name    text not null,
    name_ru text
)