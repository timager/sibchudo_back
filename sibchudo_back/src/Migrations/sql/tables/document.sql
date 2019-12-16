drop table if exists document cascade;
create table document
(
    id          serial primary key,
    name        varchar(50),
    destination text,
    upload_date date,
    description text,
    cat integer
)