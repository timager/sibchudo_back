delete
from cat
where true;
alter sequence cat_id_seq restart with 1;
insert into cat(name, color, litter, status, community, gender, owner, title, class, avatar)
values ('Гестовый котик Вася', 1, 1, 'own', 1, 'male', 1, null, null, null),
       ('Графиня Глаша', 2, 1, 'own', null, 'female', null, null, null, 2),
       ('Гермиона', 3, 1, 'own', null, 'female', null, null, null, 3),

       ('Ежевика', 4, 2, 'own', null, 'female', null, null, null, 4),
       ('Елизар', 5, 2, 'own', null, 'male', null, null, null, 5),
       ('Елизавета', 6, 2, 'own', null, 'female', null, null, null, null),
       ('Ерофей', 7, 2, 'own', null, 'male', null, null, null, null),
       ('Ефим', 8, 2, 'own', null, 'male', null, null, null, null),
       ('Е-Эльф', 9, 2, 'own', null, 'male', null, null, null, null),

       ('Золушка', 10, 3, 'own', null, 'female', null, null, null, null),
       ('Зурбаган', 11, 3, 'own', null, 'male', null, null, null, null),
       ('Задор', 12, 3, 'own', null, 'male', null, null, null, 23),
       ('Зиверт', 13, 3, 'own', null, 'male', null, null, null, null),
       ('Зендай', 14, 3, 'own', null, 'male', null, null, null, null),

       ('Изумруд', 15, 4, 'own', null, 'male', null, null, null, null),

       ('Полина', 16, 6, 'own', null, 'female', null, null, null, null),
       ('Пилона', 17, 6, 'own', null, 'female', null, null, null, null),
       ('Принц Саломон', 18, 6, 'own', null, 'male', null, null, null, null),
       ('Пурш', 19, 6, 'own', null, 'male', null, null, null, null),

       ('Северина', 20, 7, 'own', null, 'female', null, null, null, null),
       ('Сильвер', 21, 7, 'own', null, 'male', null, null, null, null),
       ('Солнышко', 22, 7, 'own', null, 'male', null, null, null, null),
       ('Сияна', 23, 7, 'own', null, 'female', null, null, null, null),
       ('Самсон', 24, 7, 'own', null, 'male', null, null, null, null),

       ('Омичка', 25, 8, 'own', null, 'female', null, null, null, null),
       ('Остап', 26, 8, 'own', null, 'male', null, null, null, null),
       ('Остин', 27, 8, 'own', null, 'male', null, null, null, null),
       ('Олбин', 28, 8, 'own', null, 'male', null, null, null, null),

       ('Рэмбо', 29, 9, 'own', null, 'male', null, null, null, null),

       ('Тапси', 30, 10, 'own', null, 'male', null, null, null, null),
       ('Топси', 31, 10, 'own', null, 'female', null, null, null, null),
       ('Типси', 32, 10, 'own', null, 'female', null, null, null, null),

       ('Чарльз Принц', 33, 11, 'own', null, 'male', null, null, null, null),

       ('Яровит', 34, 12, 'own', null, 'male', null, null, null, null),
       ('Яромир', 35, 12, 'own', null, 'male', null, null, null, 38),
       ('Ярополк', 36, 12, 'own', null, 'male', null, null, null, null),
       ('Ярославна', 37, 12, 'own', null, 'female', null, null, null, 13),

       ('Юла', 38, 13, 'own', null, 'female', null, null, null, null),
       ('Юнкер', 39, 13, 'own', null, 'male', null, null, null, null),

       ('Элисандра', 40, 14, 'own', null, 'female', null, null, null, null),
       ('Элис', 41, 14, 'own', null, 'female', null, null, null, null),
       ('Эйприл', 42, 14, 'own', null, 'female', null, null, null, null),
       ('Эшли', 43, 14, 'own', null, 'male', null, null, null, null),

       ('Брусника', 44, 15, 'own', null, 'female', null, null, null, null),
       ('Буран', 45, 15, 'own', null, 'male', null, null, null, null),
       ('Батист', 46, 15, 'own', null, 'male', null, null, null, 9),
       ('Бьерн', 47, 15, 'own', null, 'male', null, null, null, null),

       ('Вереск', 48, 16, 'own', null, 'male', null, null, null, null),
       ('Васёна', 49, 16, 'own', null, 'female', null, null, null, null),
       ('Влада', 50, 16, 'own', null, 'female', null, null, null, null),
       ('Волна', 51, 16, 'own', null, 'female', null, null, null, null),

       ('Апельсинка', 52, 17, 'own', null, 'female', null, null, null, null),

       ('Чарли', 53, 18, 'own', null, 'male', null, null, null, null),

       ('Гусар', 54, 19, 'own', null, 'male', null, null, null, null),
       ('Гардемарин', 55, 19, 'own', null, 'male', null, null, null, null),
       ('Гранд', 56, 19, 'own', null, 'male', null, null, null, null),
       ('Гейша', 57, 19, 'own', null, 'female', null, null, null, null),
       ('Гамма', 58, 19, 'own', null, 'female', null, null, null, null),
       ('Гайна', 59, 19, 'own', null, 'female', null, null, null, null),

       ('Даймонд Гел', 60, 20, 'own', null, 'female', null, null, null, null),
       ('Де Жужуа', 61, 20, 'own', null, 'female', null, null, null, null),
       ('Дивайс', 62, 20, 'own', null, 'female', null, null, null, null),
       ('Дримыч', 63, 20, 'own', null, 'male', null, null, null, null),
       ('Дигер', 64, 20, 'own', null, 'male', null, null, null, null),

       ('Жемчуг', 65, 21, 'own', null, 'male', null, null, null, null),

       ('Зея', 66, 22, 'own', null, 'female', null, null, null, null),
       ('Звезда', 67, 22, 'own', null, 'female', null, null, null, null),
       ('Зенит', 68, 22, 'own', null, 'male', null, null, null, null),
       ('Зевс', 69, 22, 'own', null, 'male', null, null, null, null),

       ('Иволга', 70, 23, 'own', null, 'female', null, null, null, null),
       ('Иньяна', 71, 23, 'own', null, 'female', null, null, null, null),
       ('Ириска', 72, 23, 'own', null, 'female', null, null, null, null),

       ('Лаура', 73, 24, 'own', null, 'female', null, null, null, null),
       ('Лайм', 74, 24, 'own', null, 'male', null, null, null, null),
       ('Лель', 75, 24, 'own', null, 'male', null, null, null, null),
       ('Лёвушка', 76, 24, 'own', null, 'male', null, null, null, null),

       ('Нектарин', 77, 25, 'own', null, 'male', null, null, null, null),
       ('Никита', 78, 25, 'own', null, 'male', null, null, null, null),
       ('Назар', 79, 25, 'own', null, 'male', null, null, null, null),
       ('Никстон', 80, 25, 'own', null, 'male', null, null, null, null),

       ('Оливия', 81, 26, 'own', null, 'female', null, null, null, null),

       ('Мартин', 82, 27, 'own', null, 'male', null, null, null, null),
       ('Мерлин', 83, 27, 'own', null, 'male', null, null, null, null),
       ('Моцарт', 84, 27, 'own', null, 'male', null, null, null, null),
       ('Маркиз', 85, 27, 'own', null, 'male', null, null, null, null),

       ('Ривьера', 86, 28, 'own', null, 'female', null, null, null, null),
       ('Роксана', 87, 28, 'own', null, 'female', null, null, null, null),
       ('Розмарин', 88, 28, 'own', null, 'male', null, null, null, null),

       ('Тайна', 89, 29, 'own', null, 'female', null, null, null, null),

       ('Феерия', 90, 30, 'own', null, 'female', null, null, null, null),
       ('Фелиция', 91, 30, 'own', null, 'female', null, null, null, 29),
       ('Фианит', 92, 30, 'own', null, 'male', null, null, null, null),
       ('Фараон', 93, 30, 'own', null, 'male', null, null, null, null),
       ('Флора', 94, 30, 'own', null, 'female', null, null, null, null),

       ('Уссури', 95, 31, 'own', null, 'female', null, null, null, null),
       ('Урсалина', 96, 31, 'own', null, 'female', null, null, null, null),
       ('Ульфина', 97, 31, 'own', null, 'female', null, null, null, null),
       ('Уголёк', 98, 31, 'own', null, 'male', null, null, null, null),
       ('Умка', 99, 31, 'own', null, 'male', null, null, null, null),
       ('Урсик', 100, 31, 'own', null, 'male', null, null, null, null),

       ('Боярин', 101, 34, 'own', null, 'male', null, null, null, null),
       ('Барин', 102, 34, 'own', null, 'male', null, null, null, null),

       ('Виринея', 103, 35, 'own', null, 'female', null, null, null, null),
       ('Василиса', 104, 35, 'own', null, 'female', null, null, null, null),

       ('Ася', 105, 36, 'own', null, 'female', null, null, null, null),
       ('Агата', 106, 36, 'own', null, 'female', null, null, null, 49),
       ('Аякс', 107, 36, 'own', null, 'male', null, null, null, null),
       ('Афанасий', 108, 36, 'own', null, 'male', null, null, null, null),

       ('Забава', 109, 37, 'own', null, 'female', null, null, null, null),
       ('Зимушка', 110, 37, 'own', null, 'female', null, null, null, null),
       ('Затея', 111, 37, 'own', null, 'female', null, null, null, null),
       ('Зафира', 112, 37, 'own', null, 'female', null, null, null, null),

       ('Дарлинг', 113, 38, 'own', null, 'male', null, null, null, null),
       ('Дженни', 114, 38, 'own', null, 'female', null, null, null, null),
       ('Джесси', 115, 38, 'own', null, 'female', null, null, null, null),

       ('Идони', 116, 39, 'own', null, 'female', null, null, null, null),
       ('Илана', 117, 39, 'own', null, 'female', null, null, null, null),
       ('Ива', 118, 39, 'own', null, 'female', null, null, null, null),
       ('Исси', 119, 39, 'own', null, 'female', null, null, null, null),

       ('Купидон', 120, 40, 'own', null, 'male', null, null, null, null),
       ('Каспиан', 121, 40, 'own', null, 'male', null, null, null, null),
       ('Карамелька', 122, 40, 'own', null, 'female', null, null, null, null),

       ('Марыся Солнышко', 123, 41, 'own', null, 'female', null, null, null, null),
       ('Марта', 124, 41, 'own', null, 'female', null, null, null, null),
       ('Митрофан', 125, 41, 'own', null, 'male', null, null, null, null),
       ('Мефодий', 126, 41, 'own', null, 'male', null, null, null, null),
       ('Мишка', 127, 41, 'own', null, 'male', null, null, null, null),

       ('Ника', 128, 42, 'own', null, 'female', null, null, null, null),
       ('Несси', 129, 42, 'own', null, 'female', null, null, null, null),
       ('Нора', 130, 42, 'own', null, 'female', null, null, null, null),
       ('Николас', 131, 42, 'own', null, 'male', null, null, null, null),
       ('Ники', 132, 42, 'own', null, 'male', null, null, null, null),
       ('Нильс', 133, 42, 'own', null, 'male', null, null, null, null),
       ('Нелли', 134, 42, 'own', null, 'female', null, null, null, 12),

       ('Оушен', 135, 43, 'own', null, 'male', null, null, null, null),
       ('Орсон', 136, 43, 'own', null, 'male', null, null, null, null),
       ('Онега', 137, 43, 'own', null, 'female', null, null, null, null),

       ('Павлина', 138, 44, 'own', null, 'female', null, null, null, null),
       ('Пантелеймон', 139, 44, 'own', null, 'male', null, null, null, null),
       ('Прохор', 140, 44, 'own', null, 'male', null, null, null, null),
       ('Персей', 141, 44, 'own', null, 'male', null, null, null, null),
       ('Принц', 142, 44, 'own', null, 'male', null, null, null, null),

       ('Ричард', 143, 45, 'own', null, 'male', null, null, null, null),
       ('Рауль', 144, 45, 'own', null, 'male', null, null, null, null),
       ('Розали', 145, 45, 'own', null, 'female', null, null, null, null),
       ('Рашель', 146, 45, 'own', null, 'female', null, null, null, null),

       ('Улисс', 147, 46, 'own', null, 'male', null, null, null, null),
       ('Ундервуд', 148, 46, 'own', null, 'male', null, null, null, null),
       ('Ульма', 149, 46, 'own', null, 'female', null, null, null, null),

       ('Саяна', 150, 47, 'own', null, 'female', null, null, null, null),
       ('Серафима', 151, 47, 'own', null, 'female', null, null, null, null),
       ('Самурай', 152, 47, 'own', null, 'male', null, null, null, 31),
       ('Симба', 153, 47, 'own', null, 'male', null, null, null, null),
       ('Селенга', 154, 47, 'own', null, 'female', null, null, null, null),

       ('Ватсон', 155, 48, 'own', null, 'male', null, null, null, null),
       ('Венди', 156, 48, 'own', null, 'female', null, null, null, null),

       ('Филипп', 157, 49, 'own', null, 'male', null, null, null, null),
       ('Филимон', 158, 49, 'own', null, 'male', null, null, null, null),
       ('Феликс', 159, 49, 'own', null, 'male', null, null, null, null),
       ('Франсуаза', 160, 49, 'own', null, 'female', null, null, null, null),

       ('Юстина', 161, 50, 'own', null, 'female', null, null, null, null),
       ('Юаника', 162, 50, 'own', null, 'female', null, null, null, null),
       ('Юрчелло', 163, 50, 'own', null, 'male', null, null, null, null),
       ('Юджин', 164, 50, 'own', null, 'male', null, null, null, null),

       ('Алиса', 165, 51, 'own', null, 'female', null, null, null, 50),
       ('Азарт', 166, 51, 'own', null, 'male', null, null, null, 46),
       ('Атаман', 167, 51, 'own', null, 'male', null, null, null, null),
       ('Адмирал', 168, 51, 'own', null, 'male', null, null, null, 47),
       ('Агнесса', 169, 51, 'own', null, 'female', null, null, null, 48),

       ('Бусинка', 170, 52, 'own', null, 'female', null, null, null, null),
       ('Бирюза', 171, 52, 'own', null, 'female', null, null, null, null),

       ('Дорофей', 172, 53, 'own', null, 'male', null, null, null, null),

       ('Еланга', 173, 54, 'own', null, 'female', null, null, null, null),
       ('Ероша', 174, 54, 'own', null, 'male', null, null, null, null),
       ('Енисей', 175, 54, 'own', null, 'male', null, null, null, null),

       ('Закарий', 176, 55, 'own', null, 'male', null, null, null, null),
       ('Захарий', 177, 55, 'own', null, 'male', null, null, null, null),
       ('Зефира', 178, 55, 'own', null, 'female', null, null, null, null),

       ('Иванка', 179, 56, 'own', null, 'female', null, null, null, null),
       ('Иртыш', 180, 56, 'own', null, 'male', null, null, null, null),
       ('Ирбис', 181, 56, 'own', null, 'male', null, null, null, null),
       ('Ивита', 182, 56, 'own', null, 'female', null, null, null, null),

       ('Жульен', 183, 57, 'own', null, 'male', null, null, null, null),
       ('Жиган', 184, 57, 'own', null, 'male', null, null, null, null),
       ('Жерар', 185, 57, 'own', null, 'male', null, null, null, null),
       ('Жафрей', 186, 57, 'own', null, 'male', null, null, null, null),
       ('Жаклин', 187, 57, 'own', null, 'female', null, null, null, null),

       ('Ларс', 188, 58, 'own', null, 'male', null, null, null, null),
       ('Лемурка', 189, 58, 'own', null, 'female', null, null, null, null),
       ('Лармура', 190, 58, 'own', null, 'female', null, null, null, null),

       ('Нордин', 191, 59, 'own', null, 'male', null, null, null, null),
       ('Нахал', 192, 59, 'own', null, 'male', null, null, null, 38),
       ('Норстон', 193, 59, 'own', null, 'male', null, null, null, null),
       ('Неваляшка', 194, 59, 'own', null, 'female', null, null, null, null),

       ('Мироша', 195, 60, 'own', null, 'male', null, null, null, null),
       ('Мишка', 196, 60, 'own', null, 'male', null, null, null, null),
       ('Маняша', 197, 60, 'own', null, 'female', null, null, null, null),
       ('Матрёша', 198, 60, 'own', null, 'female', null, null, null, null),

       ('Одиссей', 199, 61, 'own', null, 'male', null, null, null, null),
       ('Орфей', 200, 61, 'own', null, 'male', null, null, null, null),
       ('Онегин', 201, 61, 'own', null, 'male', null, null, null, null),
       ('Офелия', 202, 61, 'own', null, 'female', null, null, null, null),

       ('Паулина', 203, 62, 'own', null, 'female', null, null, null, null),
       ('Пандора', 204, 62, 'own', null, 'female', null, null, null, null),
       ('Платоний', 205, 62, 'own', null, 'male', null, null, null, null),
       ('Пифагор', 206, 62, 'own', null, 'male', null, null, null, null),

       ('Сияна', 207, 63, 'own', null, 'female', null, null, null, null),
       ('Северина', 208, 63, 'own', null, 'female', null, null, null, null),

       ('Тигран', 209, 64, 'own', null, 'male', null, null, null, null),
       ('Тайга', 210, 64, 'own', null, 'female', null, null, null, null),
       ('Тиффани', 211, 64, 'own', null, 'female', null, null, null, null),
       ('Таис', 212, 64, 'own', null, 'female', null, null, null, null),

       ('Услада', 213, 65, 'own', null, 'female', null, null, null, null),
       ('Урфин', 214, 65, 'own', null, 'male', null, null, null, null),
       ('Ульяна', 215, 65, 'own', null, 'female', null, null, null, null),

       ('Хлоя', 216, 66, 'own', null, 'female', null, null, null, null),
       ('Халиф', 217, 66, 'own', null, 'male', null, null, null, null),
       ('Хотей', 218, 66, 'own', null, 'male', null, null, null, null),
       ('Халвуша', 219, 66, 'own', null, 'female', null, null, null, null),

       ('Эверест', 220, 67, 'own', null, 'male', null, null, null, null),
       ('Эльбрус', 221, 67, 'own', null, 'male', null, null, null, null),
       ('Эйва', 222, 67, 'own', null, 'female', null, null, null, null),
       ('Эйнштейн', 223, 67, 'own', null, 'male', null, null, null, null),

       ('Черемуха', 224, 68, 'own', null, 'female', null, null, null, null),
       ('Черничка', 225, 68, 'own', null, 'female', null, null, null, null),
       ('Чаплин', 226, 68, 'own', null, 'male', null, null, null, null),
       ('Чехов', 227, 68, 'own', null, 'male', null, null, null, null),
       ('Чародейка', 228, 68, 'own', null, 'female', null, null, null, null),
       ('Черешенка', 229, 68, 'own', null, 'female', null, null, null, null),
       ('Чапаев', 230, 68, 'own', null, 'male', null, null, null, null),

       ('Ярофей Котофеевич', 231, 69, 'own', null, 'male', null, null, null, null),
       ('Ярослав Мудрый', 232, 69, 'own', null, 'male', null, null, null, null),
       ('Янтарь', 233, 69, 'own', null, 'male', null, null, null, null),
       ('Яндекс', 234, 69, 'own', null, 'male', null, null, null, null),
       ('Яснолика', 235, 69, 'own', null, 'female', null, null, null, null),
       ('Ярослава', 236, 69, 'own', null, 'female', null, null, null, null),

       ('Юрко', 237, 70, 'own', null, 'male', null, null, null, null),
       ('Юрата', 238, 70, 'own', null, 'female', null, null, null, null),
       ('Юлика', 239, 70, 'own', null, 'female', null, null, null, null),
       ('Юраш', 240, 70, 'own', null, 'male', null, null, null, null),
       ('Юлбарс', 241, 70, 'own', null, 'male', null, null, null, null),

       ('Аляска', 242, 71, 'own', null, 'female', null, null, null, null),
       ('Айвори', 243, 71, 'own', null, 'female', null, null, null, 41),
       ('Аделина', 244, 71, 'own', null, 'female', null, null, null, 42),
       ('Аиша', 245, 71, 'own', null, 'female', null, null, null, 43),
       ('Алекса', 246, 71, 'own', null, 'female', null, null, null, 44),
       ('Айрис', 247, 71, 'own', null, 'female', null, null, null, 45),
       ('Анфиса', 248, 71, 'own', null, 'female', null, null, null, null),
       ('Амир', 249, 71, 'own', null, 'male', null, null, null, null),
       ('Альф', 250, 71, 'own', null, 'male', null, null, null, null),

       ('Багира', 251, 72, 'own', null, 'female', null, null, null, null),
       ('Базилика', 252, 72, 'own', null, 'female', null, null, null, null),
       ('Белла', 253, 72, 'own', null, 'female', null, null, null, null),

       ('Жозефина', 254, 73, 'own', null, 'female', null, null, null, null),

       ('Зариша', 255, 74, 'own', null, 'female', null, null, null, null),

       ('Иннокентий', 256, 76, 'own', null, 'male', null, null, null, null),
       ('Игнат', 257, 76, 'own', null, 'male', null, null, null, null),
       ('Изюминка', 258, 76, 'own', null, 'female', null, null, null, null),

       ('Грейси', 259, 75, 'own', null, 'female', null, null, null, null),
       ('Грация', 260, 75, 'own', null, 'female', null, null, null, null),
       ('Грей', 261, 75, 'own', null, 'male', null, null, null, null),
       ('Гранд', 262, 75, 'own', null, 'male', null, null, null, null),

       ('Кристалл', 263, 77, 'own', null, 'male', null, null, null, null),
       ('Карат', 264, 77, 'own', null, 'male', null, null, null, null),
       ('Кот де Нуар', 265, 77, 'own', null, 'male', null, null, null, null),
       ('Кот да Винчи', 266, 77, 'own', null, 'male', null, null, null, null),

       ('Леонардо', 267, 78, 'own', null, 'male', null, null, null, null),
       ('Леопольд', 268, 78, 'own', null, 'male', null, null, null, null),
       ('Лео', 269, 78, 'own', null, 'male', null, null, null, null),

       ('Микаела', 270, 79, 'own', null, 'female', null, null, null, null),
       ('Марсель', 271, 79, 'own', null, 'male', null, null, null, null),
       ('Мариус', 272, 79, 'own', null, 'male', null, null, null, null),

       ('Немо', 273, 80, 'own', null, 'male', null, null, null, null),
       ('Ниагара', 274, 80, 'own', null, 'female', null, null, null, null),
       ('Нева', 275, 80, 'own', null, 'female', null, null, null, null),
       ('Невада', 276, 80, 'own', null, 'female', null, null, null, null),

       ('Рейчел', 277, 81, 'own', null, 'female', null, null, null, null),
       ('Ребекка', 278, 81, 'own', null, 'female', null, null, null, null),
       ('Роксана', 279, 81, 'own', null, 'female', null, null, null, null),

       ('Пумба', 280, 82, 'own', null, 'male', null, null, null, null),
       ('Причуда', 281, 82, 'own', null, 'female', null, null, null, null),

       ('Савелий', 282, 83, 'own', null, 'male', null, null, null, null),

       ('Фиалина', 283, 84, 'own', null, 'female', null, null, null, null),

       ('Челси', 284, 85, 'own', null, 'female', null, null, null, null),
       ('Черчиль', 285, 85, 'own', null, 'male', null, null, null, null),
       ('Честер', 286, 85, 'own', null, 'male', null, null, null, null),
       ('Чилита', 287, 85, 'own', null, 'female', null, null, null, null),
       ('Черути', 288, 85, 'own', null, 'female', null, null, null, null),

       ('Ярчик', 289, 86, 'own', null, 'male', null, null, null, null),
       ('Ярсик', 290, 86, 'own', null, 'male', null, null, null, null),
       ('Якимка', 291, 86, 'own', null, 'male', null, null, null, null),
       ('Ясенка', 292, 86, 'own', null, 'female', null, null, null, null),
       ('Янинка', 293, 86, 'own', null, 'female', null, null, null, null),

       ('Беата', 294, 87, 'own', null, 'female', null, null, null, null),
       ('Бажена', 295, 87, 'own', null, 'female', null, null, null, null),
       ('Барин Кузьма', 296, 87, 'own', null, 'male', null, null, null, null),
       ('Барсент', 297, 87, 'own', null, 'male', null, null, null, null),
       ('Бавария', 298, 87, 'own', null, 'female', null, null, null, null),
       ('Бруно', 299, 87, 'own', null, 'male', null, null, null, null),

       ('Диана', 300, 88, 'own', null, 'female', null, null, null, null),
       ('Дульсинея', 301, 88, 'own', null, 'female', null, null, null, null),
       ('Дориан', 302, 88, 'own', null, 'male', null, null, null, null),
       ('Д''Артаньян', 303, 88, 'own', null, 'male', null, null, null, null),

       ('Оливия', 304, 89, 'own', null, 'female', null, null, null, null),

       ('Лапушка', 305, 90, 'own', null, 'female', null, null, null, null),
       ('Лорд', 306, 90, 'own', null, 'male', null, null, null, null),
       ('Левентина', 307, 90, 'own', null, 'female', null, null, null, null),
       ('Лукреция', 308, 90, 'own', null, 'female', null, null, null, null),
       ('Лаура', 309, 90, 'own', null, 'female', null, null, null, null),
       ('Лучинэль', 310, 90, 'own', null, 'female', null, null, null, null),

       ('Марчелло', 311, 91, 'own', null, 'male', null, null, null, null),
       ('Милана', 312, 91, 'own', null, 'female', null, null, null, null),
       ('Максимус', 313, 91, 'own', null, 'male', null, null, null, null),
       ('Мариус', 314, 91, 'own', null, 'male', null, null, null, null),

       ('Нельсон-Адмирал', 315, 92, 'own', null, 'male', null, null, null, null),
       ('Николь', 316, 92, 'own', null, 'female', null, null, null, null),
       ('Нэнси', 317, 92, 'own', null, 'female', null, null, null, null),

       ('Плутон', 318, 93, 'own', null, 'male', null, null, null, null),
       ('Персей', 319, 93, 'own', null, 'male', null, null, null, null),

       ('Тринити', 320, 94, 'own', null, 'female', null, null, null, null),
       ('Тор', 321, 94, 'own', null, 'male', null, null, null, null),
       ('Тайсон', 322, 94, 'own', null, 'male', null, null, null, null),

       ('Симона', 323, 95, 'own', null, 'female', null, null, null, null),
       ('Саймон', 324, 95, 'own', null, 'male', null, null, null, null),
       ('Софья', 325, 95, 'own', null, 'female', null, null, null, null),

       ('Радуга', 326, 96, 'own', null, 'female', null, null, null, null),
       ('Рафаэлка', 327, 96, 'own', null, 'female', null, null, null, null),

       ('Христофор', 328, 97, 'own', null, 'male', null, null, null, null),
       ('Хлоя', 329, 97, 'own', null, 'female', null, null, null, null),
       ('Холли', 330, 97, 'own', null, 'female', null, null, null, null),

       ('Фенечка', 331, 98, 'own', null, 'female', null, null, null, null),
       ('Фомка', 332, 98, 'own', null, 'male', null, null, null, null),

       ('Шарлиз', 333, 99, 'own', null, 'female', null, null, null, null),
       ('Шани', 334, 99, 'own', null, 'female', null, null, null, null),
       ('Шейли', 335, 99, 'own', null, 'female', null, null, null, null),
       ('Шоколадка', 336, 99, 'own', null, 'female', null, null, null, null),

       ('Эвелинка', 337, 100, 'own', null, 'female', null, null, null, null),
       ('Эрик', 338, 100, 'own', null, 'male', null, null, null, null),
       ('Эмиль', 339, 100, 'own', null, 'male', null, null, null, null),
       ('Эль-Дарий', 340, 100, 'own', null, 'male', null, null, null, null),
       ('Эзлат', 341, 100, 'own', null, 'male', null, null, null, null),

       ('Чилита', 342, 101, 'own', null, 'female', null, null, null, 24),
       ('Чаровница', 343, 101, 'own', null, 'female', null, null, null, 25),
       ('Чингиз', 344, 101, 'own', null, 'male', null, null, null, 26),
       ('Чивас', 345, 101, 'own', null, 'male', null, null, null, 27),
       ('Чингай', 346, 101, 'own', null, 'male', null, null, null, 28),

       ('Феодор', 347, 102, 'own', 7, 'male', null, null, null, null),
       ('Фаина', 348, 102, 'own', 7, 'female', null, null, null, null),

       ('Айя', 349, 103, 'own', null, 'female', null, null, null, 40),
       ('А-Партос', 350, 103, 'own', null, 'male', null, null, null, null),
       ('Атос', 351, 103, 'own', null, 'male', null, null, null, null),
       ('Арамис', 352, 103, 'own', null, 'male', null, null, null, null),

       ('Бонифаций', 353, 104, 'own', null, 'male', null, null, null, null),

       ('Викинг', 354, 105, 'own', null, 'male', null, null, null, null),
       ('Витязь', 355, 105, 'own', null, 'male', null, null, null, null),

       ('Грация', 356, 106, 'own', null, 'female', null, null, null, null),

       ('Любава', 357, 107, 'own', null, 'female', null, null, null, null),
       ('Любомир', 358, 107, 'own', null, 'male', null, null, null, null),

       ('Жозефина', 359, 108, 'own', null, 'female', null, null, null, null),
       ('Жасмин', 360, 108, 'own', null, 'female', null, null, null, null),
       ('Жорж', 361, 108, 'own', null, 'male', null, null, null, null),

       ('Енисей', 362, 109, 'own', null, 'male', null, null, null, null),
       ('Ева', 363, 109, 'own', null, 'female', null, null, null, null),
       ('Есмин', 364, 109, 'own', null, 'female', null, null, null, null),
       ('Ефросиния', 365, 109, 'own', null, 'female', null, null, null, null),
       ('Есения Енита', 366, 109, 'own', null, 'female', null, null, null, null),

       ('Зевс', 367, 110, 'own', null, 'male', null, null, null, null),

       ('Лея', 368, 111, 'own', null, 'female', null, null, null, null),
       ('Лолита', 369, 111, 'own', null, 'female', null, null, null, null),
       ('Лэйла', 370, 111, 'own', null, 'female', null, null, null, null),
       ('Леопольд', 371, 111, 'own', null, 'male', null, null, null, null),

       ('Карнил', 372, 112, 'own', null, 'male', null, null, null, null),
       ('Келебросс', 373, 112, 'own', null, 'male', null, null, null, null),
       ('Кармагор', 374, 112, 'own', null, 'male', null, null, null, null),
       ('Конкордия', 375, 112, 'own', null, 'female', null, null, null, null),

       ('Милания', 376, 113, 'own', null, 'female', null, null, null, null),
       ('Милан', 377, 113, 'own', null, 'male', null, null, null, null),

       ('Норис', 378, 114, 'own', null, 'male', null, null, null, null),
       ('Несмеяна', 379, 114, 'own', null, 'female', null, null, null, null),
       ('Наслада', 380, 114, 'own', null, 'female', null, null, null, null),
       ('Награда', 381, 114, 'own', null, 'female', null, null, null, null),

       ('Олли', 382, 115, 'own', null, 'female', null, null, null, null),
       ('Офелия', 383, 115, 'own', null, 'female', null, null, null, null),
       ('Онега', 384, 115, 'own', null, 'female', null, null, null, null),
       ('Оникс', 385, 115, 'own', null, 'male', null, null, null, null),

       ('Ряженка', 386, 116, 'own', null, 'female', null, null, null, null),
       ('Руся', 387, 116, 'own', null, 'female', null, null, null, null),
       ('Риджина', 388, 116, 'own', null, 'female', null, null, null, null),
       ('Радость', 389, 116, 'own', null, 'female', null, null, null, null),

       ('Паскаль', 390, 117, 'own', null, 'male', null, null, null, null),
       ('Пелагея', 391, 117, 'own', null, 'female', null, null, null, null),
       ('Пересвет', 392, 117, 'own', null, 'male', null, null, null, null),
       ('Проша', 393, 117, 'own', null, 'male', null, null, null, null),

       ('Сюзанна', 394, 118, 'own', null, 'female', null, null, null, null),
       ('Сюзерен', 395, 118, 'own', null, 'male', null, null, null, null),

       ('Тимоша', 396, 119, 'own', null, 'male', null, null, null, null),
       ('Тоша', 397, 119, 'own', null, 'male', null, null, null, null),
       ('Тиша', 398, 119, 'own', null, 'male', null, null, null, null),
       ('Тарас', 399, 119, 'own', null, 'male', null, null, null, null),
       ('Топаз', 340, 119, 'own', null, 'male', null, null, null, null),

       ('Феофан', 401, 120, 'own', null, 'male', null, null, null, null),
       ('Фёдор', 402, 120, 'own', null, 'male', null, null, null, null),

       ('Улисс', 403, 121, 'own', null, 'male', null, null, null, null),
       ('Ундиния', 404, 121, 'own', null, 'female', null, null, null, null),
       ('Уильям', 405, 121, 'own', null, 'male', null, null, null, null),

       ('Хикс', 406, 122, 'own', null, 'male', null, null, null, null),
       ('Холли', 407, 122, 'own', null, 'female', null, null, null, null),
       ('Хатико', 408, 122, 'own', null, 'male', null, null, null, null),
       ('Ханна', 409, 122, 'own', null, 'female', null, null, null, null),
       ('Хантер', 410, 122, 'own', null, 'male', null, null, null, null),

       ('Чаплин', 411, 123, 'own', null, 'male', null, null, null, null),
       ('Челисия', 412, 123, 'own', null, 'female', null, null, null, null),
       ('Челси', 413, 123, 'own', null, 'female', null, null, null, null),

       ('Цветана', 414, 124, 'own', null, 'female', null, null, null, null),
       ('Цунами', 415, 124, 'own', null, 'female', null, null, null, null),
       ('Цап-Таврик', 416, 124, 'own', null, 'male', null, null, null, null),
       ('Цзейн', 417, 124, 'own', null, 'male', null, null, null, null),
       ('Цветик', 418, 124, 'own', null, 'male', null, null, null, null),

       ('Шеви', 419, 125, 'own', null, 'female', null, null, null, null),
       ('Шерлок', 420, 125, 'own', null, 'male', null, null, null, null),
       ('Шелдон', 421, 125, 'own', null, 'male', null, null, null, null),
       ('Шейх', 422, 125, 'own', null, 'male', null, null, null, null),
       ('Шервуд', 423, 125, 'own', null, 'male', null, null, null, null),

       ('Вилли', 424, 126, 'own', null, 'male', null, null, null, null),
       ('Василиса', 425, 126, 'own', null, 'female', null, null, null, null),
       ('Виктория', 426, 126, 'own', null, 'female', null, null, null, null),
       ('Вулли', 427, 126, 'own', null, 'female', null, null, null, null),
       ('Венера', 428, 126, 'own', null, 'female', null, null, null, null),

       ('Аврора', 429, 127, 'own', null, 'female', null, null, null, 39),
       ('Астерикс', 430, 127, 'own', null, 'male', null, null, null, null),

       ('Бармалей', 431, 128, 'own', null, 'male', null, null, null, null),
       ('Бонифаций', 432, 128, 'own', null, 'female', null, null, null, null),
       ('Беатрис', 433, 128, 'own', null, 'male', null, null, null, null),

       ('Герман', 434, 129, 'own', null, 'male', null, null, null, null),
       ('Гетсби', 435, 129, 'own', null, 'male', null, null, null, null),
       ('Германика', 436, 129, 'own', null, 'female', null, null, null, null),
       ('Гелиона', 437, 129, 'own', null, 'female', null, null, null, null),

       ('Гарри Поттер', 438, 130, 'own', null, 'male', null, null, null, null),
       ('Глория', 439, 130, 'own', null, 'female', null, null, null, null),
       ('Гордей', 440, 130, 'own', null, 'male', null, null, null, null),

       ('Демьян', 441, 131, 'own', null, 'male', null, null, null, null),
       ('Даймонд', 442, 131, 'own', null, 'male', null, null, null, null),
       ('Дин', 443, 131, 'own', null, 'male', null, null, null, null),
       ('Дива', 444, 131, 'own', null, 'female', null, null, null, null),

       ('Ёко', 445, 132, 'own', null, 'male', null, null, null, 20),
       ('Ёханес', 446, 132, 'own', null, 'female', null, null, null, 21),

       ('Алтай', 447, 133, 'own', null, 'male', null, null, null, null),
       ('Аякс', 448, 133, 'own', null, 'male', null, null, null, null),
       ('Амур', 449, 133, 'own', null, 'male', null, null, null, null),
       ('Антей', 450, 133, 'own', null, 'male', null, null, null, null),

       ('Жасмин', 451, 134, 'own', null, 'female', null, null, null, 18),
       ('Жуан', 452, 134, 'own', null, 'male', null, null, null, 19),
       ('Жулиана', 453, 134, 'own', null, 'female', null, null, null, null),

       ('Индиана', 454, 135, 'own', null, 'female', null, null, null, 14),
       ('Иветта', 455, 135, 'own', null, 'female', null, null, null, 15),
       ('Иннокентий', 456, 135, 'own', null, 'male', null, null, null, 16),
       ('Изюминка', 457, 135, 'own', null, 'female', null, null, null, 17),
       ('Ириска', 458, 135, 'own', null, 'female', null, null, null, null),

       ('Зак', 459, 136, 'own', null, 'male', null, null, null, null),
       ('Зенит', 460, 136, 'own', null, 'male', null, null, null, null),
       ('Зорро', 461, 136, 'own', null, 'male', null, null, null, null),
       ('Зефирка', 462, 136, 'own', null, 'female', null, null, null, null),

       ('Нерон', 463, 137, 'own', null, 'male', null, null, null, null),
       ('Нора', 464, 137, 'own', null, 'female', null, null, null, null),

       ('Морган', 465, 138, 'own', null, 'male', null, null, null, null),
       ('Манон', 466, 138, 'own', null, 'female', null, null, null, null),
       ('Маркус', 467, 138, 'own', null, 'male', null, null, null, null),
       ('Марно', 468, 138, 'sale', null, 'female', null, null, null, null),
       ('Молли', 469, 138, 'own', null, 'female', null, null, null, null),
       ('Мосмос', 470, 138, 'own', null, 'male', null, null, null, null),

       ('Прохор Петрович', 471, 139, 'sale', null, 'male', null, null, null, null),

       ('Алтай', 472, 140, 'own', null, 'male', null, null, null, null),
       ('Аякс', 473, 140, 'own', null, 'male', null, null, null, null),
       ('Амур', 474, 140, 'own', null, 'male', null, null, null, null),
       ('Антей', 475, 140, 'own', null, 'male', null, null, null, null),

       ('Расмус', 476, 141, 'own', null, 'male', null, null, null, 10),
       ('Ромашка', 477, 141, 'own', null, 'female', null, null, null, null),
       ('Руфус', 478, 141, 'own', null, 'male', null, null, null, null),

       ('Уггис', 479, 142, 'own', null, 'male', null, null, null, 8),
       ('Утреннее Солнышко', 480, 142, 'own', null, 'male', null, null, null, 6),
       ('Уран', 481, 142, 'own', null, 'male', null, null, null, 7),

       ('Файер', 482, 143, 'sale', null, 'male', null, null, null, null),
       ('Фишер', 483, 143, 'own', null, 'male', null, null, null, null),

       ('Даль', 484, 144, 'own', null, 'female', null, null, null, 1),
       ('Далия', 485, 144, 'own', null, 'female', null, null, null, null),
       ('Демид', 486, 144, 'own', null, 'male', null, null, null, null),
       ('Дозор', 487, 144, 'sale', null, 'male', null, null, null, null),
       ('Драгомир', 488, 144, 'sale', null, 'male', null, null, null, null),

       ('Ульма', 489, 146, 'own', null, 'female', null, null, null, 22),
       ('Оскар', 490, 147, 'own', null, 'male', null, null, null, null),
       ('Стефани', 491, 148, 'own', null, 'female', null, null, null, null),
       ('Дымок', 492, 149, 'own', null, 'male', null, null, null, 30),
       ('Фея', 493, 150, 'own', null, 'female', null, null, null, null),
       ('Шерлок', 494, 151, 'own', null, 'male', null, null, null, null),
       ('Егор', 495, 152, 'own', null, 'male', null, null, null, null),
       ('Марабелла', 496, 153, 'own', null, 'female', null, null, null, null),
       ('Ред Бейрон', 497, 154, 'own', null, 'male', null, null, null, null),
       ('Ясное солнышко', 498, 155, 'own', null, 'female', null, null, null, null),
       ('Николь', 499, 156, 'own', null, 'female', null, null, null, null),
       ('Зодиак', 500, 145, 'own', null, 'male', null, null, null, 11)

