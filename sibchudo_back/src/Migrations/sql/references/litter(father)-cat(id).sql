alter table if exists litter
    drop constraint if exists fk_litter_father__cat;
alter table if exists litter
    add constraint fk_litter_father__cat foreign key (father) references cat (id) on delete set null;