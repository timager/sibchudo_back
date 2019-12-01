drop table if exists base_color cascade;
create table base_color
(
    id      serial primary key,
    code    char unique,
    name    text not null,
    name_ru text
)