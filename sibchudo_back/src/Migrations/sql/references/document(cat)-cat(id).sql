alter table if exists document
    drop constraint if exists fk_document_cat__cat;
alter table if exists document
    add constraint fk_document_cat__cat foreign key (cat) references cat (id) on delete cascade;