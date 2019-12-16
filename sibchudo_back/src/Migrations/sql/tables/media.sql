drop table if exists media cascade;
create table media
(
    id          serial primary key,
    type        media_type,
    destination text,
    upload_date date,
    description text,
    cat integer
)