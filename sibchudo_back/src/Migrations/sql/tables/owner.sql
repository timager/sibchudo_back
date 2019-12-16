drop table if exists owner cascade;
create table owner
(
    id       serial primary key,
    name     varchar(100) not null,
    contacts text,
    avatar   integer
)