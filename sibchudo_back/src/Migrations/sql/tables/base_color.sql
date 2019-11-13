drop table if exists base_color;
create table base_color
(
    code    char primary key,
    name    text not null,
    name_ru text
)