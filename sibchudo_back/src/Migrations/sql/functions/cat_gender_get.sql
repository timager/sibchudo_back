create or replace function get_cat_gender(catId integer)
    returns admin_sibchudo.public.gender AS
$$
begin
   return (select gender from cat where id=catId);
end;
$$ language plpgsql;
