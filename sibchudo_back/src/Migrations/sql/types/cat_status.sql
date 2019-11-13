drop type if exists cat_status;
create type cat_status as enum ('sale', 'dead','reserved','own','other');
