drop table if exists cat cascade;
create table cat
(
    id        serial PRIMARY KEY,
    name      text    not null,
    color     integer not null,
    litter    integer not null,
    status    integer not null,
    community integer null
)