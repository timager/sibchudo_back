drop table if exists litter cascade;
create table litter
(
    id        serial primary key,
    mother    integer CHECK ('female' = get_cat_gender(mother)),
    father    integer CHECK ('male' = get_cat_gender(father)),
    birthday  date,
    community integer,
    letter    varchar(1) not null,
    constraint letter_uniq unique (letter, birthday)
)