alter table if exists color
    drop constraint if exists fk_color_code_2__color_code;
alter table if exists color
    add constraint fk_color_code_2__color_code foreign key (code_2) references color_code (code) on delete restrict;