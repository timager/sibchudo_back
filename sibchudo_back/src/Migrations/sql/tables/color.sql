drop table if exists color;
create table color
(
    id             serial primary key,
    breed          varchar(3) not null,
    base_color     char       not null,
    base_color_add char,
    code_0         varchar(2) check ( substring(code_0, 1, 1) = '0' ),
    code_1         varchar(2) check ( substring(code_1, 1, 1) = '1' ),
    code_2         varchar(2) check ( substring(code_2, 1, 1) = '2' ),
    code_3         varchar(2) check ( substring(code_3, 1, 1) = '3' ),
    tail           varchar(2) check ( substring(tail, 1, 1) = '5' ),
    eyes           varchar(2) check ( substring(eyes, 1, 1) = '6' ),
    ears           varchar(2) check ( substring(ears, 1, 1) = '7' )
)
