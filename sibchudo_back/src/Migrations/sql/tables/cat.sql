drop table if exists cat cascade;
create table cat
(
    id        serial primary key,
    name      text       not null,
    color     integer    not null,
    litter    integer    not null,
    status    cat_status not null,
    community integer    null,
    gender    gender     not null,
    owner     integer,
    title     integer,
    class     integer,
    avatar   integer
)