alter table if exists color
    drop constraint if exists fk_color_tail__color_code;
alter table if exists color
    add constraint fk_color_tail__color_code foreign key (tail) references color_code (code) on delete restrict;