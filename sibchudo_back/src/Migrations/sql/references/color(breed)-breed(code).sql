alter table if exists color
    drop constraint if exists fk_color_breed__breed;
alter table if exists color
    add constraint fk_color_breed__breed foreign key (breed) references breed (code) on delete restrict;