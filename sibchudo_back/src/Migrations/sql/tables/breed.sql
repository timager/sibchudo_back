drop table if exists breed cascade;
create table breed
(
    id      serial primary key,
    code    varchar(3) unique,
    name    text not null,
    name_ru text
)