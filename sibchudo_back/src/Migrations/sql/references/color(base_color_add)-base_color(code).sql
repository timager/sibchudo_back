alter table if exists color
    drop constraint if exists fk_color_base_color_add__base_color;
alter table if exists color
    add constraint fk_color_base_color_add__base_color foreign key (base_color_add) references base_color (id) on delete set null;