drop table if exists community;
create table community
(
    id          serial primary key,
    name        text not null,
    description text not null
)