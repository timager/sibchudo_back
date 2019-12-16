drop table if exists community cascade;
create table community
(
    id          serial primary key,
    name        text not null,
    description text not null,
    address     text,
    contacts    text,
    leader      integer
)