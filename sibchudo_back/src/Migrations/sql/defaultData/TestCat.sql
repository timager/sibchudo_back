insert into owner(name, contacts, avatar)
values ('Гераймович Ирина Владимировна','+7(921)376-28-67',null);

insert into community(name, description, address, contacts, leader)
values ('Сибирское чудо', 'Коллективный питомник невских маскарадных и традиционных кошек', 'Проспект Героев 25 к 1',
        null, 1);

insert into color(breed, base_color, base_color_add, code_0, code_1, code_2, code_3, tail, eyes, ears)
values (21, 3, null, 3, null, null, null, null, null, null);

insert into cat(name, color, litter, status, community, gender, owner, title, class)
values ('Тестовый котик Вася', 1, 1, 'own', 1, 'male', 1, null, 4);