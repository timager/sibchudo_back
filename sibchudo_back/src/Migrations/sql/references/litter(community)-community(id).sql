alter table if exists litter
    drop constraint if exists fk_litter_community__community;
alter table if exists litter
    add constraint fk_litter_community__community foreign key (community) references community (id) on delete set null;