alter table if exists color
    drop constraint if exists fk_color_code_3__color_code;
alter table if exists color
    add constraint fk_color_code_3__color_code foreign key (code_3) references color_code (id) on delete restrict;