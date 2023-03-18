-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 05 2023 г., 15:57
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `prokat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Палатки'),
(2, 'Спальники'),
(3, 'Карематы'),
(8, 'Приколы');

-- --------------------------------------------------------

--
-- Структура таблицы `commentproduct`
--

CREATE TABLE `commentproduct` (
  `id` int NOT NULL,
  `idproduct` int DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `commentproduct`
--

INSERT INTO `commentproduct` (`id`, `idproduct`, `name`, `data`, `comment`) VALUES
(11, 5, 'Имяcc', '2023-01-29', 'Очень понравилось...');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moderation` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `data`, `comment`, `moderation`) VALUES
(12, 'Бимо', '2023-01-25', 'нуааааарррчик)', 'yes'),
(13, 'Джейк', '2023-01-25', 'Очень понравилось кушать крекеры в палатке', 'yes'),
(22, 'Имя', '2023-01-25', 'Очень понравилось...', 'yes'),
(23, 'Димасик', '2023-01-25', 'Брали в небольшой поход комплект снаряжения на двоих. Всё отлично! Хорошее состояние, всё чистое!!! Приятно порадовали цены. Спасибо большое!', 'yes'),
(24, 'Амогус Петрович', '2023-01-25', 'Очень понравилось...Брали в небольшой поход комплект снаряжения на двоих. Всё отлично! Хорошее состояние, всё чистое!!! Приятно порадовали цены. Спасибо большое!', 'yes'),
(34, 'Имятест', '2023-03-05', 'Очень понравилось...nttttt', 'no');

-- --------------------------------------------------------

--
-- Структура таблицы `modification`
--

CREATE TABLE `modification` (
  `id` int NOT NULL,
  `idproduct` int DEFAULT NULL,
  `time` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `modification`
--

INSERT INTO `modification` (`id`, `idproduct`, `time`, `price`) VALUES
(2, 5, '2 дня', '300'),
(3, 5, '3 дня ', '350'),
(6, 5, '5 омлет', '4000'),
(7, 5, '5 недель', '1000'),
(8, 6, '6 дней', '50'),
(9, 5, '4 недели', '1000');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `img` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opisanie` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xar` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `img`, `title`, `opisanie`, `price`, `category`, `xar`) VALUES
(5, 'sledopyt_palatka.webp', 'Следопыт', 'Повседневная практика показывает, что начало повседневной работы по формированию позиции обеспечивает широкому кругу специалистов участие в формировании форм воздействия!', '450', 'Палатки', 'Размер (1.85x1.8x1.51 м) бело-синяя\r\nРазмером (Д-185хШ-180хВ-151)\r\nС договором + документ 500 руб.\r\nС договором без документа 7000 руб.'),
(6, 'higashi_2h.webp', 'HIGASHI', 'Дорогие друзья, дальнейшее развитие различных форм деятельности требует определения и уточнения системы обучения кадров, соответствующей насущным потребностям!\r\n\r\nСоображения высшего порядка, а также новая модель организационной деятельности играет важную роль вован.', '700', 'Палатки', ' \r\n\r\nСезонность: Зима\r\nПроизводитель:Higashi\r\nСерия:Comfort\r\nРазмер - Д см:150 - Ш, см:150 - В см:170\r\nТкань:NYLON 300D\r\nРазмер окон, см:69x31\r\nКоличество окон:4\r\nРазмер карманов, см:20x30\r\nКол-во карманов:1\r\nКол-во ввертышей / колышков:6\r\nКол-во люверсов:4\r\nВместимость:2\r\nСухой вес, кг:8\r\nТранспортный размер, см:20x20x110\r\nSKU: 04136'),
(7, 'tahoe_samo_3.webp', 'Tahoe Camo 3', 'Таким образом, курс на социально-ориентированный национальный проект играет важную роль в формировании соответствующих условий активизации?\r\n\r\nНе следует, однако, забывать о том, что постоянный количественный рост и сфера нашей активности обеспечивает', '650', 'Палатки', 'Ветрозащитная/снегозащитная юбка – нет;\r\nПротивомоскитная сетка – есть;\r\nУсиленные углы – есть;\r\nМатериал тента – полиэстер;\r\nМатериал дна - полиэтилен (RipStop);\r\nМатериал внутренней палатки – полиэстер;\r\nМатериал каркаса – стеклопластик;\r\nРазмеры внешней палатки (ДхШхВ) - 330 см;\r\nРазмеры внутренней палатки (ДхШхВ) - 210x210x135 см;\r\nРазмеры в упакованном виде (ДхШхВ) - 70x21x9 см;\r\nВес - 4.5 кг.'),
(8, 'Trek_Planet_Track_300_XL.webp', 'Мешок t -3', 'Практический опыт показывает, что начало повседневной работы по формированию позиции в значительной степени обуславливает создание экономической целесообразности принимаемых решений.', '350', 'Спальники', 'Температура комфорта - С°+10;\r\n\r\nТемпература лимит - С°-1;\r\n\r\nТемпература экстрим - С°-13;\r\n\r\nТип спальника – кокон;\r\n\r\nРазмер - 230х95х(60);\r\n\r\nТкань внешняя – полиэстер;\r\n\r\nТкань внутренняя – полиэстер;\r\n\r\nУтеплитель - 2х150 HF;\r\n\r\nВес - 1,90кг.'),
(9, '62759840299.jpg', 'Toronto +10', 'Повседневная практика показывает, что сложившаяся структура организации обеспечивает актуальность соответствующих условий активизации.\r\n\r\nРазнообразный и богатый опыт постоянное информационно-техническое обеспечение нашей деятельности создаёт предпосылки качественно новых шагов для существующих финансовых.', '250', 'Спальники', 'Габариты и вес\r\nВес, кг	\r\n1.1\r\nРазмер в сложенном виде (дл х шир х выс), см	\r\n41 х 20 х 20\r\nДлина, см	\r\n215\r\nШирина, см	\r\n85\r\nСостав\r\nНаполнитель	\r\nHollowfiber\r\nМатериал верха	\r\nПолиэстер\r\nМатериал подкладки	\r\nПолиэстер\r\nМатериал наполнителя	\r\nHollowFiber\r\nТолщина нитей верха	\r\n66 D 190 T\r\nТолщина нитей подкладки	\r\n75 D 100 T'),
(10, 'загрузка.webp', 'GREENHOUSE SP', 'С другой стороны дальнейшее развитие различных форм деятельности требует от нас анализа дальнейших направлений развития проекта.\r\n\r\nДорогие друзья, курс на социально-ориентированный национальный проект позволяет оценить значение системы масштабного изменения ряда.', '200', 'Спальники', 'Страна	Китай\r\nГарантия	6 месяцев\r\nОСНОВНЫЕ ХАРАКТЕРИСТИКИ\r\nТип спального мешка	Одеяло Другие товары\r\nНазначение	Кемпинговый Другие товары\r\nРазмер	S\r\nУДОБСТВА\r\nПодголовник	Есть\r\nВозможность состегивания	Есть\r\nТЕМПЕРАТУРА И ЗАЩИТА\r\nНижняя температура комфорта	5 ˚С Другие товары\r\nВерхняя температура комфорта	10 ˚С Другие товары\r\nВодоотталкивающее покрытие	Есть\r\nМАТЕРИАЛЫ\r\nМатериал внешней ткани	Полиэстер\r\nМатериал внутренней ткани	Полиэстер\r\nМатериал наполнителя	Холлофайбер Другие товары\r\nКоличество слоев наполнителя	1 Другие товары\r\nПлотность наполнителя	220 г/м²\r\nГАБАРИТЫ И ВЕС\r\nДлина	190 см Другие товары\r\nШирина в плечах	85 см\r\nШирина в ногах	85 см\r\nВес	1.5 кг'),
(11, 'kovrik_isolon_decor_kamuflyazh_1800kh550kh8mm_turisticheskiy_khaki.jpeg', 'Forest S10', 'Не следует, однако, забывать о том, что социально-экономическое развитие в значительной степени обуславливает создание экономической целесообразности принимаемых решений.\r\n\r\nЗначимость этих проблем настолько очевидна, что рамки и место обучения кадров напрямую.', '100', 'Карематы', 'Тип\r\nтуристический\r\nСамонадувающийся\r\nнет\r\nДвухслойный\r\nнет\r\nКоличество мест\r\n1\r\nВнешний материал\r\nППЭ (пенополиэтилен)\r\nДлина\r\n1800 мм\r\nШирина\r\n600 мм\r\nТолщина\r\n8 мм\r\nВес нетто\r\n0,242 кг'),
(12, '27425.970.jpg', 'Norfin ATLANTIC', 'Практический опыт показывает, что реализация намеченного плана развития требует определения и уточнения соответствующих условий активизации!\r\n\r\nРавным образом выбранный нами инновационный путь способствует подготовке и реализации форм воздействия.', '50', 'Карематы', 'Тип\r\nковрик\r\nСамонадувающийся\r\nнет\r\nДвухслойный\r\nнет\r\nКоличество мест\r\n1\r\nЦвет\r\nсиний\r\nВнешний материал\r\nполипропилен, нетканный эко-материал\r\nДлина\r\n1800 мм\r\nШирина\r\n900 мм\r\nТолщина\r\n3 мм\r\nВес нетто\r\n0,317 кг'),
(13, 'MATA-PIANKOWA-KARIMATA-SKLADANA-180x58x1-MFH-OLIVE.jpg', 'Gigant 2м', 'Дорогие друзья, рамки и место обучения кадров способствует повышению актуальности существующих финансовых и административных условий!\r\n\r\nТаким образом, сложившаяся структура организации способствует повышению актуальности системы обучения кадров, соответствующей насущным потребностям.', '150', 'Карематы', 'Тип\r\nковрик\r\nСамонадувающийся\r\nнет\r\nДвухслойный\r\nнет\r\nКоличество мест\r\n1\r\nЦвет\r\nкамуфляж\r\nВнешний материал\r\nОксфорд\r\nВнутренний материал\r\nвспененный полиэтилен\r\nДлина3\r\n2000 мм\r\nШирина\r\n700 мм\r\nТолщина\r\n10 мм\r\nВес нетто\r\n0,55 кг');

-- --------------------------------------------------------

--
-- Структура таблицы `promokods`
--

CREATE TABLE `promokods` (
  `id` int NOT NULL,
  `promokod` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `promokods`
--

INSERT INTO `promokods` (`id`, `promokod`, `sale`) VALUES
(1, 'sale20', '20'),
(3, 'sale30', '30'),
(4, 'sale15', '15'),
(7, 'sale99', '99');

-- --------------------------------------------------------

--
-- Структура таблицы `promologin`
--

CREATE TABLE `promologin` (
  `id` int NOT NULL,
  `login` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `shopidzakazidprod`
--

CREATE TABLE `shopidzakazidprod` (
  `id` int NOT NULL,
  `idzakaz` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idproduct` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idmodification` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colvo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shopidzakazidprod`
--

INSERT INTO `shopidzakazidprod` (`id`, `idzakaz`, `idproduct`, `idmodification`, `colvo`) VALUES
(3, '6', '12', '1day', '1'),
(5, '6', '7', '1day', '2'),
(6, '6', '10', '1day', '6'),
(12, '12', '5', '7', '1'),
(13, '12', '6', '8', '2'),
(19, '17', '5', '3', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `shoppincart`
--

CREATE TABLE `shoppincart` (
  `id` int NOT NULL,
  `login` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idproduct` int DEFAULT NULL,
  `idmodification` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colvo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shoppincart`
--

INSERT INTO `shoppincart` (`id`, `login`, `idproduct`, `idmodification`, `colvo`) VALUES
(38, '1111', 5, '6', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES
(1, 'Дмитрий Ротнов', 'dimarotnov', 'rotnov'),
(10, 'Имя Фам', '1111', '1111'),
(13, 'Мышь Крысова', 'login', 'password'),
(14, 'Шрекс', 'shrek', 'shrek');

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE `zakaz` (
  `id` int NOT NULL,
  `data` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promokod` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `data`, `status`, `login`, `adress`, `name`, `mobile`, `promokod`) VALUES
(6, '2023-03-04', 'Поступил в работу', '1111', 'Адрес доставки', 'Имя Фамилия', 'Номер телефона', '99'),
(12, '2023-03-05', 'Приходите забирайте', 'login', 'двинская пять', 'Мышь Крысова', '9999900099484', '0'),
(17, '2023-03-05', 'Собирается', 'shrek', 'e', 'shrek', 'e4', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `commentproduct`
--
ALTER TABLE `commentproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduct` (`idproduct`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduct` (`idproduct`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `promokods`
--
ALTER TABLE `promokods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `promologin`
--
ALTER TABLE `promologin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shopidzakazidprod`
--
ALTER TABLE `shopidzakazidprod`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shoppincart`
--
ALTER TABLE `shoppincart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `commentproduct`
--
ALTER TABLE `commentproduct`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `promokods`
--
ALTER TABLE `promokods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `promologin`
--
ALTER TABLE `promologin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `shopidzakazidprod`
--
ALTER TABLE `shopidzakazidprod`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `shoppincart`
--
ALTER TABLE `shoppincart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `commentproduct`
--
ALTER TABLE `commentproduct`
  ADD CONSTRAINT `commentproduct_ibfk_1` FOREIGN KEY (`idproduct`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `modification_ibfk_1` FOREIGN KEY (`idproduct`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
