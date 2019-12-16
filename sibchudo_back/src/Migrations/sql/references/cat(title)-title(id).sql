alter table if exists cat
    drop constraint if exists fk_cat_title__title;
alter table if exists cat
    add constraint fk_cat_title__title foreign key (title) references title (id) on delete set null;