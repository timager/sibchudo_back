drop table if exists cat cascade;
create table cat
(
    id        serial primary key,
    name      text       not null,
    color     integer    not null,
    litter    integer    not null CHECK (lower(substring(name from 1 for 1)) = lower(get_litter_letter(litter)) ),
    status    cat_status not null,
    community integer    null,
    gender    gender     not null,
    owner     integer,
    title     integer,
    class     integer,
    avatar   integer,
    constraint cat_uniq UNIQUE (name, litter)
)