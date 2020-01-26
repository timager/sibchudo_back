alter table if exists color
    drop constraint if exists fk_color_code_1__color_code;
alter table if exists color
    add constraint fk_color_code_1__color_code foreign key (code_1) references color_code (id) on delete restrict;