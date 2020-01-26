CREATE OR REPLACE FUNCTION delete_color() RETURNS trigger AS $color_trig_f$
BEGIN
    -- Проверить, что указаны имя сотрудника и зарплата
    DELETE FROM color where id = OLD.color;
    RETURN NEW;
END;
$color_trig_f$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS cat_color_trigger ON cat;
CREATE TRIGGER cat_color_trigger AFTER DELETE ON cat
    FOR EACH ROW EXECUTE PROCEDURE delete_color();