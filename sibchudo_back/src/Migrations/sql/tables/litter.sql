drop table if exists litter cascade;
create table litter
(
    id        serial primary key,
    mather    integer CHECK ('female' = get_cat_gender(mather)),
    father    integer CHECK ('male' = get_cat_gender(mather)),
    birthday  date,
    community integer,
    letter    varchar(1) not null
)