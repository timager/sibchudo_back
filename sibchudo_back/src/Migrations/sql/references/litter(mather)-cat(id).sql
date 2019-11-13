alter table if exists litter
    drop constraint if exists fk_litter_mather__cat;
alter table if exists litter
    add constraint fk_litter_mather__cat foreign key (mather) references cat (id) on delete set null;