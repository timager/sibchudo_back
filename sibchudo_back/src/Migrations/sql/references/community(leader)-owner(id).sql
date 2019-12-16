alter table if exists community
    drop constraint if exists fk_community_leader__owner;
alter table if exists community
    add constraint fk_community_leader__owner foreign key (leader) references owner (id) on delete set null;