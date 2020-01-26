alter table if exists color
    drop constraint if exists fk_color_ears__color_code;
alter table if exists color
    add constraint fk_color_ears__color_code foreign key (ears) references color_code (id) on delete restrict;