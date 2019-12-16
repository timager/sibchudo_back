alter table if exists cat
    drop constraint if exists fk_cat_avatar__media;
alter table if exists cat
    add constraint fk_cat_avatar__media foreign key (avatar) references media (id) on delete set null;