alter table if exists owner
    drop constraint if exists fk_owner_avatar__media;
alter table if exists owner
    add constraint fk_owner_avatar__media foreign key (avatar) references media (id) on delete set null;