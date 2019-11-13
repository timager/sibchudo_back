alter table if exists color
    drop constraint if exists fk_color_base_color__base_color;
alter table if exists color
    add constraint fk_color_base_color__base_color foreign key (base_color) references base_color (code) on delete restrict;