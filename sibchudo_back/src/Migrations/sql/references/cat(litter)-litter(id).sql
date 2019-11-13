alter table if exists cat
    drop constraint if exists fk_cat_litter__litter;
alter table if exists cat
    add constraint fk_cat_litter__litter foreign key (litter) references litter (id) on delete cascade;