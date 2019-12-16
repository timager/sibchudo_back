alter table if exists cat
    drop constraint if exists fk_cat_class__class;
alter table if exists cat
    add constraint fk_cat_class__class foreign key (class) references class (id) on delete restrict;