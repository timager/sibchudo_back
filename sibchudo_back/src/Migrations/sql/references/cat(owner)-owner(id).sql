alter table if exists cat
    drop constraint if exists fk_cat_owner__owner;
alter table if exists cat
    add constraint fk_cat_owner__owner foreign key (owner) references owner (id) on delete set NULL;