alter table if exists media
    drop constraint if exists fk_media_cat__cat;
alter table if exists media
    add constraint fk_media_cat__cat foreign key (cat) references cat (id) on delete cascade;