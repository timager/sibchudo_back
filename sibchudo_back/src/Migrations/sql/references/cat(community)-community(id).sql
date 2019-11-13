alter table if exists cat
    drop constraint if exists fk_cat_community__litter;
alter table if exists cat
    add constraint fk_cat_community__litter foreign key (community) references community (id) on delete restrict;