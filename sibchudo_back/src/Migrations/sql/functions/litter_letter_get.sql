create or replace function get_litter_letter(litter_id integer)
    returns char AS
    $$
begin
    return
    (select letter from litter where id = litter_id);
end;
$$ language plpgsql;
