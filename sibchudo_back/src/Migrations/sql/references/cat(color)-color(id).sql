alter table if exists cat
    drop constraint if exists fk_cat_color__color;
alter table if exists cat
    add constraint fk_cat_color__color foreign key (color) references color (id) on delete restrict;