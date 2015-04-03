-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mar 24 Mars 2015 à 17:56
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `thatsthespirit`
--

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
`id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `authors`
--

INSERT INTO `authors` (`id`, `fullname`, `slug`, `photo`, `total`) VALUES
(1, 'Abraham Lincoln', 'abraham-lincoln', NULL, 2),
(2, 'Adrian Forty', 'adrian-forty', NULL, 1),
(3, 'Alan Cooper', 'alan-cooper', NULL, 1),
(4, 'Albert Einstein', 'albert-einstein', NULL, 7),
(5, 'Aldous Huxley', 'aldous-huxley', NULL, 1),
(6, 'Alice Kahn', 'alice-kahn', NULL, 1),
(7, 'Amelia Earhart', 'amelia-earhart', NULL, 1),
(8, 'Anais Nin', 'anais-nin', NULL, 1),
(9, 'Andy Warhol', 'andy-warhol', NULL, 2),
(10, 'anonymous', 'anonymous', NULL, 2),
(11, 'Antoine de Saint-Exupery', 'antoine-de-saint-exupery', NULL, 1),
(12, 'Bill Bernbach	', 'bill-bernbach', NULL, 1),
(13, 'Bill Buxton', 'bill-buxton', NULL, 1),
(14, 'Bill Moggridge', 'bill-moggridge', NULL, 2),
(15, 'Bob Dole', 'bob-dole', NULL, 1),
(16, 'Brian Reed', 'brian-reed', NULL, 1),
(17, 'Bruce Sterling', 'bruce-sterling', NULL, 1),
(18, 'Buckminster Fuller', 'buckminster-fuller', NULL, 1),
(19, 'Charles Eames', 'charles-eames', NULL, 1),
(20, 'Charles Mingus', 'charles-mingus', NULL, 1),
(21, 'Chinese Proverb', 'chinese-proverb', NULL, 1),
(22, 'Colin Wright', 'colin-wright', NULL, 1),
(23, 'Colm Tuite', 'colm-tuite', NULL, 1),
(24, 'Confusius', 'confusius', NULL, 5),
(25, 'Craig Villamor', 'craig-villamor', NULL, 1),
(26, 'Curt Cloninger', 'curt-cloninger', NULL, 1),
(27, 'Daniel Eatock', 'daniel-eatock', NULL, 1),
(28, 'David Lewis', 'david-lewis', NULL, 1),
(29, 'Derrick de Kerckhove', 'derrick-de-kerckhove', NULL, 1),
(30, 'Dieter Rams', 'dieter-rams', NULL, 2),
(31, 'Donald Norman', 'donald-norman', NULL, 1),
(32, 'Douglas Englebart', 'douglas-englebart', NULL, 1),
(33, 'Dr. Ralph Speth, CEO Jaguar', 'dr-ralph-speth-ceo-jaguar', NULL, 1),
(34, 'Edward Tufte', 'edward-tufte', NULL, 4),
(35, 'Eliel Saarinen', 'eliel-saarinen', NULL, 1),
(36, 'Ellen Lupton', 'ellen-lupton', NULL, 3),
(37, 'Emil Ruder', 'emil-ruder', NULL, 1),
(38, 'Erik Adigard', 'erik-adigard', NULL, 1),
(39, 'Franck Chimero', 'franck-chimero', NULL, 1),
(40, 'Frank Chimero', 'frank-chimero', NULL, 3),
(41, 'Frank Lloyd Wright', 'frank-lloyd-wright', NULL, 3),
(42, 'Frank Zappa', 'frank-zappa', NULL, 1),
(43, 'Friedrich Nietzsche', 'friedrich-nietzsche', NULL, 5),
(44, 'George Bernard Shaw', 'george-bernard-shaw', NULL, 1),
(45, 'Gidsy.com', 'gidsy-com', NULL, 1),
(46, 'Groucho Marx', 'groucho-marx', NULL, 1),
(47, 'Henry Ford', 'henry-ford', NULL, 1),
(48, 'Hillman Curtis', 'hillman-curtis', NULL, 1),
(49, 'Howard Thurman', 'howard-thurman', NULL, 1),
(50, 'James Dyson', 'james-dyson', NULL, 1),
(51, 'James wilson', 'james-wilson', NULL, 1),
(52, 'Jared M. Spool', 'jared-m-spool', NULL, 1),
(53, 'Jared Spool', 'jared-spool', NULL, 1),
(54, 'Jason Fried', 'jason-fried', NULL, 2),
(55, 'Jeff Veen', 'jeff-veen', NULL, 1),
(56, 'Jeffrey Veen', 'jeffrey-veen', NULL, 1),
(57, 'Jeffrey Zeldman', 'jeffrey-zeldman', NULL, 1),
(58, 'Jerry Seinfeld', 'jerry-seinfeld', NULL, 1),
(59, 'Jim Wicks', 'jim-wicks', NULL, 1),
(60, 'Joe Di Stefano', 'joe-di-stefano', NULL, 1),
(61, 'Joe Sparano', 'joe-sparano', NULL, 1),
(62, 'John Gruber', 'john-gruber', NULL, 1),
(63, 'John Maeda', 'john-maeda', NULL, 5),
(64, 'Jon Wozencraft', 'jon-wozencraft', NULL, 1),
(65, 'Jonathan Ive', 'jonathan-ive', NULL, 1),
(66, 'Josh Clark', 'josh-clark', NULL, 2),
(67, 'Julian Assange', 'julian-assange', NULL, 1),
(68, 'Kevin Barnett', 'kevin-barnett', NULL, 1),
(69, 'La vida de AdÃ¨le', 'la-vida-de-ada-le', NULL, 0),
(70, 'Le Corbusier', 'le-corbusier', NULL, 1),
(71, 'Leisa Reichelt', 'leisa-reichelt', NULL, 1),
(72, 'Leo Frankowski', 'leo-frankowski', NULL, 1),
(73, 'Leonardo da Vinci', 'leonardo-da-vinci', NULL, 1),
(74, 'Louis Rosenfeld & Peter Morville', 'louis-rosenfeld-peter-morville', NULL, 1),
(75, 'Ludovico Einaudi', 'ludovico-einaudi', NULL, 1),
(76, 'Mahatma Gandhi', 'mahatma-gandhi', NULL, 1),
(77, 'Marcus Aurelius', 'marcus-aurelius', NULL, 1),
(78, 'Mark Boulton', 'mark-boulton', NULL, 1),
(79, 'Marshall mac Luhan', 'marshall-mac-luhan', NULL, 1),
(80, 'Martin Luther King Jr.', 'martin-luther-king-jr', NULL, 1),
(81, 'Maya Angelou', 'maya-angelou', NULL, 5),
(82, 'Meagan Fisher', 'meagan-fisher', NULL, 1),
(83, 'Michael Babwahsingh', 'michael-babwahsingh', NULL, 1),
(84, 'Michael Porter', 'michael-porter', NULL, 1),
(85, 'miss alabama 1994', 'miss-alabama-1994', NULL, 1),
(86, 'Mohandas K. Gandhi', 'mohandas-k-gandhi', NULL, 1),
(87, 'Mother Teresa', 'mother-teresa', NULL, 1),
(88, 'Napoleon Hill', 'napoleon-hill', NULL, 1),
(89, 'Nelson Mandela', 'nelson-mandela', NULL, 1),
(90, 'Nicolas Boileau-DesprÃ©aux', 'nicolas-boileau-despra-aux', NULL, 0),
(91, 'Noreen Morioka', 'noreen-morioka', NULL, 1),
(92, 'Oliver Reichenstein', 'oliver-reichenstein', NULL, 1),
(93, 'Oscar Wilde', 'oscar-wilde', NULL, 2),
(94, 'Otl Aicher', 'otl-aicher', NULL, 1),
(95, 'Pablo Picasso', 'pablo-picasso', NULL, 4),
(96, 'Paul Jarvis', 'paul-jarvis', NULL, 1),
(97, 'Paul Rand', 'paul-rand', NULL, 8),
(98, 'Peter Morville', 'peter-morville', NULL, 1),
(99, 'Pew Internet & American Life Project', 'pew-internet-american-life-project', NULL, 1),
(100, 'Philo', 'philo', NULL, 1),
(101, 'Plato', 'plato', NULL, 1),
(102, 'Plutarch', 'plutarch', NULL, 1),
(103, 'Ralph Waldo Emerson', 'ralph-waldo-emerson', NULL, 1),
(104, 'Rebekah Cox', 'rebekah-cox', NULL, 1),
(105, 'Richard C. Maclaurin', 'richard-c-maclaurin', NULL, 1),
(106, 'Richard Saul Wurman', 'richard-saul-wurman', NULL, 2),
(107, 'Rob Curedale', 'rob-curedale', NULL, 1),
(108, 'Rob Fitzpatrick', 'rob-fitzpatrick', NULL, 1),
(109, 'Robert Browning', 'robert-browning', NULL, 1),
(110, 'Robert L. Peters', 'robert-l-peters', NULL, 1),
(111, 'Robert M. Pirsig', 'robert-m-pirsig', NULL, 1),
(112, 'Rumi', 'rumi', NULL, 1),
(113, 'Sahil Lavingia', 'sahil-lavingia', NULL, 2),
(114, 'Sam Levenson', 'sam-levenson', NULL, 1),
(115, 'Saul Bass', 'saul-bass', NULL, 1),
(116, 'Scott Francis', 'scott-francis', NULL, 1),
(117, 'Sebastiaan De With', 'sebastiaan-de-with', NULL, 1),
(118, 'Seth Godin', 'seth-godin', NULL, 1),
(119, 'Sir Alec Issigonis', 'sir-alec-issigonis', NULL, 1),
(120, 'Sir James Dewar', 'sir-james-dewar', NULL, 1),
(121, 'Stephanie Rieger', 'stephanie-rieger', NULL, 1),
(122, 'Steve Jobs', 'steve-jobs', NULL, 3),
(123, 'Steve Rogers', 'steve-rogers', NULL, 1),
(124, 'Steven Johnson', 'steven-johnson', NULL, 1),
(125, 'Tate Linden', 'tate-linden', NULL, 1),
(126, 'Terence Mckenna', 'terence-mckenna', NULL, 2),
(127, 'Theodore Roosevelt', 'theodore-roosevelt', NULL, 1),
(128, 'Thomas Edison', 'thomas-edison', NULL, 1),
(129, 'Thomas J. Watson Jr.', 'thomas-j-watson-jr', NULL, 1),
(130, 'Tim Berners-Lee', 'tim-berners-lee', NULL, 2),
(131, 'Tim Hibbetts', 'tim-hibbetts', NULL, 1),
(132, 'Tim Parsey', 'tim-parsey', NULL, 1),
(133, 'unknown', 'unknown', NULL, 1),
(134, 'Unknown source', 'unknown-source', NULL, 2),
(135, 'Victor Papanek', 'victor-papanek', NULL, 1),
(136, 'Walt Whitman', 'walt-whitman', NULL, 1),
(137, 'Walter Bagehot', 'walter-bagehot', NULL, 1),
(138, 'Wayne Dyer', 'wayne-dyer', NULL, 1),
(139, 'Wernher von Braun', 'wernher-von-braun', NULL, 2),
(140, 'William Gibson', 'william-gibson', NULL, 1),
(141, 'William McDonough', 'william-mcdonough', NULL, 1),
(142, 'Wim Crouwel', 'wim-crouwel', NULL, 1),
(143, 'Winston Churchill', 'winston-churchill', NULL, 1),
(144, 'Woody Allen', 'woody-allen', NULL, 7);

-- --------------------------------------------------------

--
-- Structure de la table `design_quotes`
--

CREATE TABLE `design_quotes` (
`id` int(11) NOT NULL,
  `quote` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `source` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `popularity` int(11) NOT NULL DEFAULT '0',
  `status` set('pending','online') CHARACTER SET latin1 NOT NULL DEFAULT 'online',
  `img_portrait` text COMMENT 'Path to portrait image',
  `popularity_last_checked` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=utf8 COMMENT='My favourite design quotes';

--
-- Contenu de la table `design_quotes`
--

INSERT INTO `design_quotes` (`id`, `quote`, `author`, `author_id`, `source`, `popularity`, `status`, `img_portrait`, `popularity_last_checked`) VALUES
(16, 'The greatest pleasure in life is doing what people say you cannot do.', 'Walter Bagehot', 137, '', 3, 'online', '', '2013-01-11 23:00:02'),
(14, 'The essence of strategy is choosing what <strong>not</strong> to do.', 'Michael Porter', 84, '', 1, 'online', '', '2013-01-11 23:05:02'),
(15, 'For a list of all the ways technology has failed to improve the quality of life, please press three.', 'Alice Kahn', 6, '', 1, 'online', '', '2013-01-11 23:10:01'),
(13, 'The medium is the message.', 'Marshall mac Luhan', 79, '', 1, 'online', '', '2013-01-11 23:15:02'),
(12, 'The surest way to corrupt a youth is to instruct him to hold in higher esteem those who think alike than those who think differently.', 'Friedrich Nietzsche', 43, '', 1, 'online', '', '2013-01-11 23:20:02'),
(11, 'Without a problem, there is no project.', 'Joe Di Stefano', 60, '', 0, 'online', '', '2013-01-11 23:25:02'),
(10, 'Findability Precedes Usability<br/>In the Alphabet and on the Web<br/>You Can''t Use What You Can''t Find.', 'Peter Morville', 98, '', 2, 'online', '', '2013-01-11 23:30:02'),
(17, 'I have learned to use the word ''impossible'' with the greatest caution.', 'Wernher von Braun', 139, '', 1, 'online', '', '2013-01-11 23:35:05'),
(18, 'TV is chewing gum for the eyes.', 'Frank Lloyd Wright', 41, '', 0, 'online', '', '2013-01-11 23:40:02'),
(19, 'I find television very educational. Every time someone switches it on I go into another room and read a good book.', 'Groucho Marx', 46, '', 0, 'online', '', '2013-01-11 23:45:01'),
(20, 'To do is to be.', 'Friedrich Nietzsche', 43, '', 1, 'online', '', '2013-01-11 23:50:02'),
(21, 'It takes a long time to become young.', 'Pablo Picasso', 95, '', 0, 'online', '', '2013-01-11 23:55:04'),
(22, 'Gravitation is not responsible for people falling in love.', 'Albert Einstein', 4, '', 0, 'online', '', '2013-01-12 00:00:02'),
(23, 'Reality is merely an illusion, albeit a very persistent one.', 'Albert Einstein', 4, '', 0, 'online', '', '2013-01-12 00:05:02'),
(24, 'Anyone who has never made a mistake has never tried anything new.', 'Albert Einstein', 4, '', 0, 'online', '', '2013-01-12 00:10:01'),
(25, 'The important thing is not to stop questioning. Curiosity has its own reason for existing.', 'Albert Einstein', 4, '', 0, 'online', '', '2013-01-12 00:15:02'),
(26, 'Fashion is a form of ugliness so intolerable that we have to alter it every six months.', 'Oscar Wilde', 93, '', 0, 'online', '', '2013-01-12 00:20:02'),
(27, 'We don''t see things as they are, we see things as we are.', 'Anais Nin', 8, '', 0, 'online', '', '2013-01-12 00:25:02'),
(28, 'How can I believe in God when just last week I got my tongue caught in the roller of an electric typewriter?', 'Woody Allen', 144, '', 0, 'online', '', '2013-01-12 00:30:02'),
(29, 'I don''t want to achieve immortality through my work... I want to achieve it through not dying !', 'Woody Allen', 144, '', 0, 'online', '', '2013-01-12 00:35:02'),
(30, 'If only God would give me some clear sign! Like... making a large deposit in my name in a Swiss bank.', 'Woody Allen', 144, '', 0, 'online', '', '2013-01-12 00:40:02'),
(31, 'Opinions are like assholes, everybody has one...', 'anonymous', 10, '', 0, 'online', '', '2013-01-12 00:45:01'),
(32, 'Good girls go to heaven, bad girls go everywhere', 'anonymous', 10, '', 0, 'online', '', '2013-01-12 00:50:02'),
(33, 'I would not live forever, because we should not live forever, because, if we were supposed to live forever, then we would live forever, but we cannot live forever, which is why I would not live forever.', 'miss alabama 1994', 85, '', 0, 'online', '', '2013-01-12 00:55:01'),
(34, 'Information is power', 'Unknown source', 134, '', 0, 'online', '', '2013-01-12 01:00:02'),
(35, 'Simplicity of device is always the sign of the master, whether in science or in art.', 'Richard C. Maclaurin', 105, '', 0, 'online', '', '2013-01-12 01:05:01'),
(36, 'The secret to creativity is knowing how to hide your sources.', 'Albert Einstein', 4, '', 0, 'online', '', '2013-01-12 01:10:02'),
(37, 'Simplicity is the ultimate sophistication.', 'Leonardo da Vinci', 73, '', 0, 'online', '', '2013-01-12 01:15:02'),
(38, 'A reasonable man adapts himself to suit his environment. An unreasonable man persists in attempting to adapt his environment to suit himself. Therefore, all progress depends on the unreasonable man.', 'George Bernard Shaw', 44, '', 0, 'online', '', '2013-01-12 01:20:02'),
(39, 'In anything at all, perfection is finally attained not when there is no longer anything to add, but when there is no longer anything to take away.', 'Antoine de Saint-Exupery', 11, '', 0, 'online', '', '2013-01-12 01:25:01'),
(40, 'Less is more.', 'Robert Browning', 109, '', 0, 'online', '', '2013-01-12 01:30:01'),
(41, 'Research is what I''m doing when I don''t know what I''m doing.', 'Wernher von Braun', 139, '', 1, 'online', '', '2013-01-12 01:35:01'),
(42, 'The public is more familiar with bad design than good design. It is, in effect, conditioned to prefer bad design, because that is what it lives with. The new becomes threatening, the old reassuring.', 'Paul Rand', 97, '', 1, 'online', '', '2013-01-12 01:40:01'),
(43, 'I do believe that there are some universal cognitive tasks that are deep and profound - indeed, so deep and profound that it is worthwhile to understand them in order to design our displays in accord with those tasks.', 'Edward Tufte', 34, '', 0, 'online', '', '2013-01-12 01:45:02'),
(44, 'I think it is important for software to avoiding imposing a cognitive style on workers and their work.', 'Edward Tufte', 34, '', 0, 'online', '', '2013-01-12 01:50:02'),
(45, 'Rather, the point is to recognize the tightness between seeing and thinking on an intellectual level not just a metaphorical level.', 'Edward Tufte', 34, '', 0, 'online', '', '2013-01-12 01:55:03'),
(46, 'The key argument is that cognitive tasks should be turned into design principles.', 'Edward Tufte', 34, '', 2, 'online', '', '2013-01-12 02:00:01'),
(47, 'Many people fear nothing more terribly than to take a position which stands out sharply and clearly from the prevailing opinion. The tendency of most is to adopt a view that is so ambiguous that it will include everything and so popular that it will include everybody. Not a few men who cherish lofty and noble ideals hide them under a bushel for fear of being called different.', 'Martin Luther King Jr.', 80, '', 0, 'online', '', '2013-01-12 02:05:02'),
(48, 'The museum of the living world is always open for business. Admission is free.', 'John Maeda', 63, '', 0, 'online', '', '2013-01-12 02:10:02'),
(49, 'The internet is a great way to get on the net.', 'Bob Dole', 15, '', 2, 'online', '', '2013-01-12 02:15:02'),
(50, 'The future is here. It''s just not evenly distributed yet.', 'William Gibson', 140, '', 1, 'online', '', '2013-01-12 02:20:01'),
(51, 'The fundamental failure of most graphic, product, architectural, and even urban design is its insistence on serving the God of Looking-Good rather than the God of Being-Good.', 'Richard Saul Wurman', 106, '', 1, 'online', '', '2013-01-12 02:25:01'),
(52, 'Designing a product is designing a relationship.', 'Steve Rogers', 123, '', 0, 'online', '', '2013-01-12 02:30:01'),
(53, 'Art is an idea that has found its perfect visual expression. And design is the vehicle by which this expression is made possible. Art is a noun, and design is a noun and also a verb. Art is a product and design is a process. Design is the foundation of all the arts.', 'Paul Rand', 97, '', 0, 'online', '', '2013-01-12 02:35:02'),
(55, 'Our opportunity, as designers, is to learn how to handle the complexity, rather than shy away from it, and to realize that the big art of design is to make complicated things simple.', 'Tim Parsey', 132, '', 0, 'online', '', '2013-01-12 02:45:02'),
(56, 'The only important thing about design is how it relates to people.', 'Victor Papanek', 135, '', 1, 'online', '', '2013-01-12 02:50:02'),
(57, 'No design works unless it embodies ideas that are held common by the people for whom the object is intended.', 'Adrian Forty', 2, '', 0, 'online', '', '2013-01-12 02:55:02'),
(58, 'Always design a thing by considering it in its next larger context - a chair in a room, a room in a house, a house in an environment, an environment in a city plan.', 'Eliel Saarinen', 35, '', 2, 'online', '', '2013-01-12 03:00:02'),
(59, 'Good design is all about making other designers feel like idiots because that idea wasn&rsquo;t theirs.', 'Frank Chimero', 40, '', 5, 'online', '', '2013-01-12 03:05:01'),
(60, 'Many desperate acts of design (including gradients, drop shadows, and the gratuitous use of transparency) are perpetuated in the absence of a strong concept. A good idea provides a framework for design decisions, guiding the work.', 'Noreen Morioka', 91, '', 0, 'online', '', '2013-01-12 03:10:02'),
(61, 'Art is like masturbation. It is selfish and introverted and done for you and you alone. Design is like sex. There is someone else involved, their needs are just as important as your own, and if everything goes right, both parties are happy in the end.', 'Colin Wright', 22, '', 0, 'online', '', '2013-01-12 03:15:01'),
(62, 'A designer can mull over complicated designs for months. Then suddenly the simple, elegant, beautiful solution occurs to him. When it happens to you, it feels as if God is talking! And maybe He is.', 'Leo Frankowski', 72, '', 3, 'online', '', '2013-01-12 03:20:02'),
(63, 'It''s art if it can''t be explained. It''s fashion if no one asks for an explanation. It''s design if it doesn''t <em>need</em> an explanation.', 'unknown source', 134, '', 0, 'online', '', '2013-01-12 03:25:02'),
(64, 'Design is an opportunity to continue telling the story, not just to sum everything up.', 'Tate Linden', 125, '', 0, 'online', '', '2013-01-12 03:30:02'),
(65, 'Content precedes design. Design in the absence of content is not design, it&rsquo;s decoration.', 'Jeffrey Zeldman', 57, '', 1, 'online', '', '2013-01-12 03:35:02'),
(66, 'Design is as much an act of spacing as an act of marking.', 'Ellen Lupton', 36, '', 1, 'online', '', '2013-01-12 03:40:02'),
(67, 'Good design is obvious. Great design is transparent.', 'Joe Sparano', 61, '', 1, 'online', '', '2013-01-12 03:45:02'),
(68, 'People ignore design that ignores people.', 'Frank Chimero', 40, '', 8, 'online', '', '2013-01-12 03:50:01'),
(69, 'good art inspires, good design motivates.', 'Otl Aicher', 94, '', 1, 'online', '', '2013-01-12 03:55:01'),
(70, 'Design is the method of putting form and content together. Design, just as art, has multiple definitions; there is no single definition. Design can be art. Design can be aesthetics. Design is so simple, that''s why it is so complicated.', 'Paul Rand', 97, '', 0, 'online', '', '2013-01-12 04:00:02'),
(71, 'You will learn most things by looking, but reading gives understanding. Reading will make you free.', 'Paul Rand', 97, '', 0, 'online', '', '2013-01-12 04:05:02'),
(72, 'Don''t try to be original; just try to be good.', 'Paul Rand', 97, '', 1, 'online', '', '2013-01-12 04:10:01'),
(73, 'Without aesthetic, design is either the humdrum repetition of familiar clich&eacute;s or a wild scramble for novelty. Without the aesthetic, the computer is but a mindless speed machine, producing effects without substance. Form without relevant content, or content without meaningful form.', 'Paul Rand', 97, '', 0, 'online', '', '2013-01-12 04:15:02'),
(74, 'Simplicity will stand out, while complexity will get lost in the crowd.', 'Kevin Barnett', 68, '', 1, 'online', '', '2013-01-12 04:20:02'),
(75, 'The typeface doesn''t really matter, as long as the text is good.', 'John Maeda', 63, '', 0, 'online', '', '2013-01-12 04:25:03'),
(76, 'Find the simple story in the product, and present it in an articulate and intelligent, persuasive way.', 'Bill Bernbach	', 12, '', 1, 'online', '', '2013-01-12 04:30:02'),
(77, 'Design is an art of situations. Designers respond to a need, a problem, a circumstance, that arises in the world. The best work is produced in relation to interesting situations &#8212; an open-minded client, a good cause, or great content.', 'Ellen Lupton', 36, '', 1, 'online', '', '2013-01-12 05:25:07'),
(78, 'Design is a set of decisions about a product. It''s not an interface or an aesthetic, it''s not a brand or a color. Design is the actual decisions.', 'Rebekah Cox', 104, 'http://www.quora.com/Rebekah-Cox/Posts/Design-Quora-Web2-0-Expo-Presentation', 1, 'online', '', '2013-01-12 05:30:01'),
(79, 'There is a way to do it better. Find it.', 'Thomas Edison', 128, '', 0, 'online', '', '2013-01-12 05:35:02'),
(80, 'The details are not the details. They make the design.', 'Charles Eames', 19, 'http://ishback.com/', 2, 'online', '', '2013-01-12 05:40:02'),
(81, 'Truly elegant design incorporates top-notch functionality into a simple, uncluttered form.', 'David Lewis', 28, '', 0, 'online', '', '2013-01-12 05:45:02'),
(82, 'If at first the idea is not absurd, then there is no hope for it.', '', 0, '', 0, 'online', '', '2013-01-11 05:00:02'),
(83, 'Design covers so much more than the aesthetic. Design is fundamentally more. Design is usability. It is Information Architecture. It is Accessibility. This is all design.', 'Mark Boulton', 78, '', 1, 'online', '', '2013-01-11 05:05:01'),
(84, 'Everything is designed. Few things are designed well.', 'Brian Reed', 16, '', 0, 'online', '', '2013-01-11 05:10:02'),
(85, 'Design is the application of intent - the opposite of happenstance, and an antidote to accident.', 'Robert L. Peters', 110, '', 1, 'online', '', '2013-01-11 05:15:01'),
(86, 'Don''t design for everyone; it''s impossible. All you end up doing is designing something that makes everyone unhappy.', 'Leisa Reichelt', 71, '', 1, 'online', '', '2013-01-11 05:20:01'),
(87, 'A camel is a horse designed by a committee.', 'Sir Alec Issigonis', 119, '', 0, 'online', '', '2013-01-11 05:25:02'),
(88, 'At a meta level, design connects the dots between mere survival and humanism.', 'Erik Adigard', 38, '', 2, 'online', '', '2013-01-11 05:30:02'),
(90, 'Great design will not sell an inferior product, but it will enable a great product to achieve its maximum potential.', 'Thomas J. Watson Jr.', 129, '', 0, 'online', '', '2013-01-11 05:40:01'),
(91, 'Designers can make life more bearable by producing stuff that touches its audience rather than fucks them in the head.', 'Jon Wozencraft', 64, '', 0, 'online', '', '2013-01-11 05:45:01'),
(92, 'I never design a building before I''ve seen the site and met the people who will be using it.', 'Frank Lloyd Wright', 41, '', 1, 'online', '', '2013-01-11 05:50:01'),
(93, 'Design is the first signal of human intention.', 'William McDonough', 141, '', 0, 'online', '', '2013-01-11 05:55:01'),
(94, 'Eighty percent of success is showing up.', 'Woody Allen', 144, '', 0, 'online', '', '2013-01-11 06:00:01'),
(95, 'I want to tell you a terrific story about oral contraception. I asked this girl to sleep with me and she said ''No.''', 'Woody Allen', 144, '', 3, 'online', '', '2013-01-11 06:05:02'),
(96, 'If you''re not failing every now and again, it''s a sign you''re not doing anything very innovative.', 'Woody Allen', 144, 'http://www.brainyquote.com/quotes/authors/w/woody_allen_2.html', 0, 'online', '', '2013-01-11 06:10:01'),
(97, 'Some guy hit my fender, and I told him, ''Be fruitful and multiply,'' but not in those words.', 'Woody Allen', 144, '', 0, 'online', '', '2013-01-11 06:15:01'),
(98, 'No matter how cool your interface is, it would be better if there were less of it.', 'Alan Cooper', 3, '', 0, 'online', '', '2013-01-11 06:20:01'),
(99, 'Descriptions are like skirts, they should be long enough to cover the subject, but short enough to keep things interesting.', 'Gidsy.com', 45, 'http://gidsy.com/handbooks/making-the-perfect-listing/#languages', 0, 'online', '', '2013-01-11 06:25:01'),
(142, 'Understanding precedes action.', 'Richard Saul Wurman', 106, 'https://twitter.com/johnmaeda/status/220975402628292608', 0, 'online', '', '2013-01-11 06:30:02'),
(143, 'The mind is not a vessel to be filled but a fire to be kindled.', 'Plutarch', 102, 'http://www.brainyquote.com/quotes/quotes/p/plutarch161334.html', 1, 'online', '', '2013-01-11 06:35:01'),
(101, 'The power of the grid is to lift the designer outside of the protective capriciousness of the "self" by providing an existing set of possibilities, a set of rules. ', 'Ellen Lupton', 36, '', 0, 'online', '', '2013-01-11 06:40:02'),
(102, 'Order is the actual key of life.', 'Le Corbusier', 70, '', 0, 'online', '', '2013-01-11 06:45:02'),
(103, 'It is very easy to be different, but very difficult to be better.', 'Jonathan Ive', 65, '', 0, 'online', '', '2013-01-11 06:50:01'),
(104, 'A design should have some tension and some expression in itself. I like to compare it with the lines on a football field. It is a strict grid.\r\nIn this grid you play a game and these can be nice games or very boring games.', 'Wim Crouwel', 142, '', 0, 'online', '', '2013-01-11 06:55:01'),
(105, 'If I''d asked people what they wanted, they would have said a faster horse.', 'Henry Ford', 47, '', 0, 'online', '', '2013-01-11 07:00:02'),
(106, 'Most people make the mistake of thinking design is what it looks like. People think it''s this veneer - that the designers are handed this box and told, "Make it look good!" That''s not what we think design is. It''s not just what it looks like and feels like. Design is how it works.', 'Steve Jobs', 122, '', 0, 'online', '', '2013-01-11 07:05:02'),
(107, 'Making the simple complicated is commonplace; making the complicated simple, awesomely simple, that''s creativity.', 'Charles Mingus', 20, '', 0, 'online', '', '2013-01-11 07:10:02'),
(108, 'The design instinct, above all, is about viewing the world around you as a place filled with opportunities to add more thoughtfulness and care.', 'Sahil Lavingia', 113, 'http://www.fastcodesign.com/1669189/pinterests-founding-designer-shares-his-dead-simple-design-philosophy', 0, 'online', '', '2013-01-11 07:15:02'),
(109, 'Design is shrinking the gap between what a product does and why it exists. ', 'Sahil Lavingia', 113, '', 1, 'online', '', '2013-01-11 07:20:02'),
(110, 'When you eliminate quality as a requirement, the entire design process becomes a whole lot easier.\r\n', 'Jared M. Spool', 52, '', 0, 'online', '', '2013-01-11 07:25:02'),
(111, 'I know the price of success: dedication, hard work & an unremitting devotion to the things you want to see happen.', 'Frank Lloyd Wright', 41, '', 0, 'online', '', '2013-01-11 07:30:02'),
(112, 'Design is creativity with strategy.', 'Rob Curedale', 107, '', 0, 'online', '', '2013-01-11 07:35:01'),
(113, 'Typography has one plain duty before it and that is to convey information in writing. No argument or consideration can absolve typography from this duty.', 'Emil Ruder', 37, '', 1, 'online', '', '2013-01-11 07:40:02'),
(114, 'Action without vision is only passing time,\r\nvision without action is merely day dreaming,\r\nbut vision with action can change the world.', 'Nelson Mandela', 89, '', 0, 'online', '', '2013-01-11 07:45:01'),
(115, 'In matters of user experience the whole is greater than the sum of its parts.', 'Stephanie Rieger', 121, 'http://stephanierieger.com/not-in-my-best-interest/', 4, 'online', '', '2013-01-11 07:50:02'),
(116, 'I''ve learned that people will forget what you said, people will forget what you did, but people will never forget how you made them feel.', 'Maya Angelou', 81, '', 0, 'online', '', '2013-01-11 07:55:02'),
(117, 'Difference between "features" and "intents"\r\nConsider a user talking about your app saying, “it can do this, it can do that”. Now compare that to them saying that with your creation “I can do this, I can do that”. The difference is syntactically small but incredibly important from an application design and implementation perspective. In the latter case of a user saying that with your app they can do this or they can do that, you have successfully interlocked the users intentions with the features your app possesses.', 'James wilson', 51, 'http://scotchandcode.com/2011/11/23/356/', 0, 'online', '', '2013-01-11 08:00:02'),
(118, 'It is foolish to think that you will get the design right the first time. It is also foolish to think that there won’t be changes to a design once development begins. And on a larger scale, software products are never done unless they are dead. Life is better when you stop kidding yourself and your team and admit that there is no “done”.', 'Craig Villamor', 25, 'http://cvil.ly/2011/12/13/design-is-never-done/', 2, 'online', '', '2013-01-11 08:05:02'),
(119, 'Be <strong>clear</strong> first and <strong>clever</strong> second. If you have to throw one of those out, throw out\r\n<strong>clever</strong>.', 'Jason Fried', 54, '', 4, 'online', '', '2013-01-11 08:10:02'),
(120, 'Those who tell the stories rule society.', 'Plato', 101, '', 1, 'online', '', '2013-01-11 08:15:01'),
(121, 'Our understanding of the world is largely determined by our ability to organise information.', 'Louis Rosenfeld & Peter Morville', 74, '', 0, 'online', '', '2013-01-11 08:20:02'),
(122, 'Success is not final, failure is not fatal: it is the courage to continue that counts.', 'Winston Churchill', 143, '', 0, 'online', '', '2013-01-11 08:25:03'),
(123, 'When it is obvious that the goals cannot be reached, don''t adjust the goals, adjust the action steps.', 'Confusius', 24, '', 0, 'online', '', '2013-01-11 08:30:01'),
(124, 'It does not matter how slowly you go as long as you do not stop.', 'Confusius', 24, '', 1, 'online', '', '2013-01-11 08:35:02'),
(125, 'I hear and I forget. I see and I remember. I do and I understand.', 'Confusius', 24, '', 1, 'online', '', '2013-01-11 08:40:02'),
(126, 'Wheresoever you go, go with all your heart.', 'Confusius', 24, '', 1, 'online', '', '2013-01-11 08:45:02'),
(127, 'Success depends upon previous preparation, and without such preparation there is sure to be failure.', 'Confusius', 24, '', 0, 'online', '', '2013-01-11 08:50:02'),
(128, 'You have your way. I have my way. As for the right way, the correct way, and the only way, it does not exist.', 'Friedrich Nietzsche', 43, '', 1, 'online', '', '2013-01-11 08:55:01'),
(129, 'He who has a why can endure any how.', 'Friedrich Nietzsche', 43, '', 4, 'online', '', '2013-01-11 09:00:02'),
(130, 'The reason for designing new media is simple - to subtly and quietly change the world.', 'Hillman Curtis', 48, 'http://www.nytimes.com/2012/04/21/technology/hillman-curtis-a-pioneer-in-web-design-dies-at-51.html', 0, 'online', '', '2013-01-11 09:05:01'),
(131, 'Mobile is the needle,\r\nSocial is the thread...', 'Pew Internet & American Life Project', 99, '', 0, 'online', '', '2013-01-11 09:10:04'),
(132, 'The future is a process, not a destination.', 'Bruce Sterling', 17, '', 3, 'online', '', '2013-01-11 09:15:02'),
(133, 'We''re only as good as our latest product. I don''t believe in brand at all.', 'James Dyson', 50, 'http://adage.com/article/adages/design-icon-james-dyson-i-brand/234494/', 0, 'online', '', '2013-01-11 09:20:02'),
(135, 'A designer is an emerging synthesis of artist, inventor, mechanic, objective economist & evolutionary strategist.\r\n', 'Buckminster Fuller', 18, '', 0, 'online', '', '2013-01-11 09:30:02'),
(136, '(...) so much of our identities lie in the ability to participate in and contribute to the things that are important to us. ', 'Frank Chimero', 40, 'http://themavenist.org/03-augmentedidentity/index.html', 0, 'online', '', '2013-01-11 09:35:02'),
(137, 'By the time you''ve arrived at the perfect solution, the problem will have already changed. Thus "good enough" is truly so.', 'John Maeda', 63, 'https://twitter.com/johnmaeda/status/200545406457884672', 1, 'online', '', '2013-01-11 09:40:02'),
(138, 'To use design to impress, to polish things up, to make them chic, is no design at all. This is packaging.', 'Dieter Rams', 30, 'http://www.vitsoe.com/en/re/newsandevents/article/dieter-rams-to-celebrate-80th-birthday', 2, 'online', '', '2013-01-11 09:45:02'),
(139, 'When you play, play hard. When you work, don''t play at all.', 'Theodore Roosevelt', 127, 'http://t.co/GK8AbnV9', 2, 'online', '', '2013-01-11 09:50:01'),
(140, 'Minds are like parachutes. They only function when they are open.', 'Sir James Dewar', 120, 'https://www.facebook.com/frederik.d.wilde/posts/10150839617472466', 2, 'online', '', '2013-01-11 09:55:01'),
(141, 'When offered two products, we pick the one that''s simple.', 'Sebastiaan De With', 117, 'http://dewith.com/2012/searchsimple/', 0, 'online', '', '2013-01-11 10:00:01'),
(144, 'Experience is not what happens to you; it''s what you do with what happens to you.', 'Aldous Huxley', 5, '', 1, 'online', '', '2013-01-11 10:05:02'),
(230, 'Be yourself; everyone else is already taken.', 'Oscar Wilde', 93, '', 0, 'online', '', '2014-11-07 19:19:20'),
(151, 'Whatever is well conceived is clearly said, And the words to say it flow with ease.', 'Nicolas Boileau-DesprÃ©aux', 0, 'http://blog.8thcolor.com/2012/07/pitching-one-year-on/?utm_source=buffer&buffer_share=a052a', 2, 'online', '', '2013-01-11 10:15:01'),
(150, 'The essence of all beautiful art, all great art, is gratitude.', 'Friedrich Nietzsche', 43, '', 1, 'online', '', '2013-01-11 10:20:02'),
(152, 'Any intelligent fool can make things bigger and more complex.\r\nIt takes a touch of genius and a lot of courage to move in the opposite direction.', 'Albert Einstein', 4, 'http://tukod.com/to-code-projects/tukod-multi-network/', 1, 'online', '', '2013-01-11 10:25:02'),
(153, 'Without great solitude, no serious work is possible.', 'Pablo Picasso', 95, '', 0, 'online', '', '2013-01-11 10:30:02'),
(163, 'If there''s a simple, easy design principle that binds everything together, it''s probably about starting with the people.', 'Bill Moggridge', 14, 'https://twitter.com/johnmaeda/status/247035385413238784', 7, 'online', '', '2013-01-11 10:35:02'),
(164, 'It''s amazing that the amount of news that happens in the world every day always just exactly fits the newspaper.', 'Jerry Seinfeld', 58, '', 1, 'online', '', '2013-01-11 10:40:02'),
(165, 'The core skills of design are synthesis, understanding people, and iterative prototyping.', 'Bill Moggridge', 14, 'https://twitter.com/jaredigital/status/251728282494595073', 3, 'online', '', '2013-01-11 10:45:02'),
(166, 'A goal is a dream with a deadline.', 'Napoleon Hill', 88, 'http://www.fastcodesign.com/1670925/famous-inspirational-quotes-as-abstract-animated-gifs', 0, 'online', '', '2013-01-11 10:50:03'),
(167, 'Action is the foundational key to all success.', 'Pablo Picasso', 95, 'http://www.fastcodesign.com/1670925/famous-inspirational-quotes-as-abstract-animated-gifs', 0, 'online', '', '2013-01-11 10:55:02'),
(168, 'Instead of wondering when your next vacation is, maybe you should set up a life you don''t need to escape from.', 'Seth Godin', 118, 'https://twitter.com/sebafl/status/259008184151339008', 1, 'online', '', '2013-01-11 11:00:02'),
(155, 'When it comes to the web, the more backward-compatible you are, the more forward-compatible you''re likely to be.', 'Josh Clark', 66, 'http://bradfrostweb.com/blog/mobile/beyond-media-queries-anatomy-of-an-adaptive-web-design/', 0, 'online', '', '2013-01-11 11:05:01'),
(157, 'Without deviation from the norm, progress is not possible.', 'Frank Zappa', 42, 'http://hugoroy.eu/index.en.html', 4, 'online', '', '2013-01-11 11:10:02'),
(158, 'The material and the craftsman''s thoughts change together in a progression of smooth, even changes until his mind is at rest at the exact instant the material is right.\n', 'Robert M. Pirsig', 111, 'http://www.walkingmen.com/', 0, 'online', '', '2013-01-11 11:15:01'),
(159, 'The only "intuitive" interface is the nipple. After that it''s all learned.', 'Scott Francis', 116, 'http://www.greenend.org.uk/rjk/misc/nipple.html', 1, 'online', '', '2013-01-11 11:20:02'),
(160, 'The real problem with the interface is that it is an interface. Interfaces get in the way. I don’t want to focus my energies on an interface. I want to focus on the job…I don’t want to think of myself as using a computer, I want to think of myself as doing my job.', 'Donald Norman', 31, 'http://cs.nyu.edu/courses/spring98/G22.2280/UI-Introduction/sld072.htm', 1, 'online', '', '2013-01-11 11:25:02'),
(162, 'You cannot understand good design if you do not understand people; design is made for people.', 'Dieter Rams', 30, 'https://speakerdeck.com/u/jasonvnalue/p/three-pipe-problems', 0, 'online', '', '2013-01-11 11:30:02'),
(170, 'Technology comes out of the human body and design makes sense of it.', 'Derrick de Kerckhove', 29, '', 0, 'online', '', '2013-01-11 11:35:06'),
(169, 'If you pay peanuts, you get monkeys.', 'Chinese Proverb', 21, '', 4, 'online', '', '2013-01-11 11:40:02'),
(171, 'The primary design principle underlying the Web''s usefulness and growth is universality.', 'Tim Berners-Lee', 130, '', 0, 'online', '', '2013-01-11 11:45:03'),
(172, 'Web-site creation isn''t something you learn once and then check off on your to-do list.', 'Jeff Veen', 55, '', 0, 'online', '', '2013-01-11 11:50:03'),
(174, 'When the user''s experience is greater than the user''s expectation, trust is established. Establishing trust as early as possible is paramount to providing a good user experience.', 'Colm Tuite', 23, 'http://www.quora.com/What-are-the-best-resources-for-learning-bleeding-edge-web-UI-and-UX-design/answers/1980866', 0, 'online', '', '2013-01-27 20:30:44'),
(176, 'Simplicity is about subtracting the obvious and adding the meaningful.', 'John Maeda', 63, 'http://checkthis.com/sirv', 0, 'online', '', '2013-04-11 08:37:38'),
(199, 'The meaning of life is to find your gift. The purpose of life is to give it away.', 'Pablo Picasso', 95, '', 0, 'online', '', '2013-12-13 17:11:53'),
(198, 'True information design must find the shortest path to understanding.', 'Michael Babwahsingh', 83, 'http://michaelbabwahsingh.com/2013/11/29/the-real-meaning-of-information-design/', 0, 'online', '', '2013-11-29 23:31:59'),
(197, 'It is only when we become aware or are reminded that our time is limited that we can channel our energy into truly living.', 'Ludovico Einaudi', 75, 'http://www.youtube.com/watch?v=O-HsW142T5g', 0, 'online', '', '2013-11-20 22:54:18'),
(195, 'Work without love is slavery.', 'Mother Teresa', 87, 'https://twitter.com/swissmiss/status/380299902699720704', 0, 'online', '', '2013-09-20 14:06:07'),
(196, 'If everybody''s not a beauty, then nobody is.', 'Andy Warhol', 9, 'http://www.slate.com/articles/life/doonan/2013/10/simon_doonan_finds_the_most_beautiful_woman_in_the_world.html', 0, 'online', '', '2013-10-12 09:44:30'),
(194, 'Reduction creates essence.', 'Oliver Reichenstein', 92, 'http://fr.slideshare.net/reichenstein1/information-entropy', 0, 'online', '', '2013-09-16 11:59:11'),
(193, 'Amateurs Get Angry With Clients. Professionals Educate Them.', 'Paul Jarvis', 96, 'http://99u.com/articles/18303/we-deserve-the-clients-we-get', 0, 'online', '', '2013-09-10 16:19:29'),
(188, 'This is for everyone.', 'Tim Berners-Lee', 130, 'http://jancbeck.com/articles/btconf-jeremy-keith/', 0, 'online', '', '2013-05-28 19:19:38'),
(189, 'Good content gets lost with bad typography.', 'Meagan Fisher', 82, 'http://fr.slideshare.net/MeaganFisher/beyond-tellerrandfinal', 0, 'online', '', '2013-05-28 19:25:42'),
(203, 'If you think good design is expensive, you should look at the cost of bad design.', 'Dr. Ralph Speth, CEO Jaguar', 33, 'http://www.uxaxioms.com/', 0, 'online', '', '2014-01-16 09:12:34'),
(204, 'If I had an hour to solve a problem and my life depended on the solution, I would spend the first fifty-five minutes determining the proper question to ask, for once I know the proper question, I could solve the problem in less than five minutes.', 'Albert Einstein', 4, 'http://fr.slideshare.net/eadahl/ux-axioms-26-principle-to-drive-better-product-design', 0, 'online', '', '2014-01-16 09:19:11'),
(205, 'If I had eight hours to chop down a tree, I''d spend six sharpening my axe.', 'Abraham Lincoln', 1, 'http://fr.slideshare.net/eadahl/ux-axioms-26-principle-to-drive-better-product-design', 0, 'online', '', '2014-01-16 09:19:48'),
(206, 'If a thing is worth doing, it is worth doing well.', 'unknown', 133, '', 0, 'online', '', '2014-01-16 09:30:37'),
(210, 'The quality of any collaborative creative endeavor tends to approach the level of taste of whoever has the final cut.', 'John Gruber', 62, 'http://kevinkrautle.com/post/293701513/the-quality-of-any-collaborative-creative-endeavor', 0, 'online', '', '2014-04-01 20:42:13'),
(208, 'I am happy. I''m happy with you, like this. It''s my way of being happy.', 'La vida de AdÃ¨le', 0, 'http://www.imdb.com/title/tt2278871/quotes', 0, 'online', '', '2014-02-04 03:32:43'),
(209, 'Design makes what is complex feel simpler, and what is simpler feel richer.', 'John Maeda', 63, 'https://twitter.com/johnmaeda/status/443226278166941696', 0, 'online', '', '2014-03-11 08:16:07'),
(211, 'The design is done when the problem goes away.', 'Jason Fried', 54, 'http://www.fastcodesign.com/1669189/pinterests-founding-designer-shares-his-dead-simple-design-philosophy', 0, 'online', '', '2014-04-01 20:43:13'),
(212, 'Design is always about synthesis -synthesis of market needs, technology trends, and business needs.', 'Jim Wicks', 59, 'http://www.id.iit.edu/events/strategyconference/2006/perspectives_wicks.php', 0, 'online', '', '2014-04-01 20:44:45'),
(213, 'Design is not just what it looks like and feels like. Design is how it works.', 'steve Jobs', 122, 'http://www.nytimes.com/2003/11/30/magazine/30IPOD.html', 0, 'online', '', '2014-04-01 20:46:37'),
(214, 'If a site is perfectly usable but it lacks an elegant and appropriate design style, it will fail.', 'Curt Cloninger', 26, 'http://www.lab404.com/dan/', 0, 'online', '', '2014-04-01 20:48:31'),
(215, '...that strange new zone between medium and message. That zone we call the interface.', 'Steven Johnson', 124, 'http://www.stevenberlinjohnson.com/', 0, 'online', '', '2014-04-01 20:49:59'),
(216, 'We''re gambling on our vision, and we would rather do that than make ''me too'' products.', 'Steve Jobs', 122, 'http://twitter.com/ibmdesign/status/8282695012', 0, 'online', '', '2014-04-01 20:50:56'),
(224, 'You need to remember that when the product is free, you are the product.', 'Julian Assange', 67, 'http://www.vogue.com/3300203/julian-assange-interview-when-google-met-wikileaks/', 0, 'online', '', '2014-10-25 08:43:03'),
(223, 'If you are always trying to be normal, you will never know how amazing you can be.', 'Maya Angelou', 81, '', 0, 'online', '', '2014-10-20 06:37:07'),
(222, 'It boils down to this: you aren''t allowed to tell [customers] what their problem is, and in return, they aren''t allowed to tell you what to build. They own the problem, and you own the solution.', 'Rob Fitzpatrick', 108, 'http://www.userfocus.co.uk/newsletter/oct2014.html', 0, 'online', '', '2014-10-06 09:06:35'),
(221, 'Content is like Water. You put water into a cup, it becomes the cup. You put water into a bottle, it becomes the bottle. You put it in a teapot, it becomes the teapot.', 'Josh Clark', 66, 'http://www.inpixelitrust.fr/portfolio/content-is-like-water-illustration/', 0, 'online', '', '2014-06-30 10:37:58'),
(225, 'Re-examine all that you have been toldâ€¦ dismiss that which insults your soul.', 'Walt Whitman', 136, '', 0, 'online', '', '2014-10-25 08:59:21'),
(226, 'The most effective way to do it, is to do it.', 'Amelia Earhart', 7, '', 0, 'online', '', '2014-10-25 09:00:06'),
(227, 'The only person you are destined to become is the person you decide to be.', 'Ralph Waldo Emerson', 103, '', 0, 'online', '', '2014-10-25 09:01:15'),
(228, 'Yesterday I was clever and I wanted to change the world. Today I am wise and I''m changing myself.', 'Rumi', 112, '', 0, 'online', '', '2014-10-25 09:01:42'),
(229, 'The impediment to action advances action. What stands in the way becomes the way.', 'Marcus Aurelius', 77, 'https://medium.com/@vanschneider/what-being-a-jack-of-all-trades-really-means-5ad47e84d1f0', 0, 'online', '', '2014-11-04 20:20:15'),
(231, 'There is more to life than increasing its speed.', 'Mohandas K. Gandhi', 86, 'https://medium.com/conquering-corporate-america/10-inspirational-quotes-to-make-you-feel-better-about-not-getting-anything-done-today-408253dba93c', 0, 'online', '', '2014-11-09 18:09:39'),
(232, 'Design is the rendering of intent.', 'Jared Spool', 53, 'http://vimeo.com/110103806', 0, 'online', '', '2014-11-10 09:17:06'),
(233, 'Don''t ask what the world needs. Ask what makes you come alive, and go do it. Because what the world needs is people who have come alive.', 'Howard Thurman', 49, 'https://www.youtube.com/watch?v=-eu9GfHCpVo', 0, 'online', '', '2014-11-14 00:28:00'),
(234, 'You have to take seriously the notion that understanding the universe is your responsibility, because the only understanding of the universe that will be useful to you is your own understanding.', 'Terence Mckenna', 126, 'http://terence-mckenna-quotes.tumblr.com/post/16456021320/clanjohncy-you-have-to-take-seriously-the', 0, 'online', '', '2014-11-14 00:34:59'),
(235, 'Stop consuming images and start producing them.', 'Terence McKenna', 126, 'http://terence-mckenna-quotes.tumblr.com/post/14084607176/stop-consuming-images-and-start-producing-them', 0, 'online', '', '2014-11-14 00:36:23'),
(236, 'How people treat you is their karma; how you react is yours.', 'Wayne Dyer', 138, 'https://twitter.com/GabbyBernstein/status/399753659447529472', 0, 'online', '', '2014-11-16 23:02:27'),
(238, 'I think everybody should be nice to everybody.', 'Andy Warhol', 9, 'http://thomashawk.com/2014/11/10-tips-for-getting-the-most-out-of-ello.html', 0, 'online', '', '2014-11-25 09:59:35'),
(242, '(...) Develop a system-oriented discipline for designing the means by which greater effectiveness is achieved.', 'Douglas Englebart', 32, 'http://web.stanford.edu/dept/SUL/library/extra4/sloan/MouseSite/1968Demo.html', 0, 'online', '', '2014-12-23 00:22:52'),
(240, 'Give me six hours to chop down a tree and I will spend the first four sharpening my axe.', 'Abraham Lincoln', 1, '', 0, 'online', '', '2014-12-10 16:27:45'),
(241, 'Design is the method of putting form and content together. Design, just as art, has multiple definitions, there is no single definition. \r\n\r\nDesign can be art. Design can be aesthetics. \r\n\r\nDesign is so simple, that''s why it is so complicated.', 'Paul Rand', 97, '', 0, 'online', '', '2014-12-20 22:18:04'),
(243, 'Take things away until you cry.', 'Franck Chimero', 39, 'http://issuu.com/papress/docs/the_designer_says', 0, 'online', '', '2015-01-03 19:40:18'),
(244, 'The nature of process,\nto one degree or another, involves failure. You have at it. It doesn''t work. You keep pushing. It gets better.But it''s not good. It gets\nworse. You go at it again.\nThen you desperately stab\nat it, believing this isn''t\ngoing to work. And it does!', 'Saul Bass', 115, 'http://issuu.com/papress/docs/the_designer_says', 0, 'online', '', '2015-01-03 19:41:34'),
(245, 'It is important to use your hands. \r\nThis is what distinguishes you from a cow or a computer operator.', 'Paul Rand', 97, 'http://issuu.com/papress/docs/the_designer_says', 0, 'online', '', '2015-01-03 19:42:48'),
(246, 'The brain is the most democratic tool that all artists and designers share.', 'Daniel Eatock', 27, 'http://issuu.com/papress/docs/the_designer_says', 0, 'online', '', '2015-01-03 19:44:44'),
(247, 'Be kind, for everyone you meet is carrying a great burden.', 'Philo', 100, 'http://www.brainpickings.org/2015/01/02/sherwin-nuland-what-everybody-needs/', 0, 'online', '', '2015-01-04 10:03:00'),
(248, 'It was on my fifth birthday that Papa put his hand on my shoulder and said, "Remember, my son, if you ever need a helping hand, you''ll find one at the end of your arm."', 'Sam Levenson', 114, '', 0, 'online', '', '2015-01-07 08:59:05'),
(249, 'One of the tenets of science seems to be that if we wait for a little, we''re going to find that what we know now is wrong. If we can keep from locking our jaws onto each precious notion, we might do a little better at moving with greater fluidity in this sea of ideas.', 'Tim Hibbetts', 131, 'http://qr.ae/6kXY6', 0, 'online', '', '2015-01-09 10:07:28'),
(252, 'Speak only if it improves upon the silence.', 'Mahatma Gandhi', 76, '', 0, 'online', '', '2015-02-01 22:27:09'),
(253, 'Design isn''t risky. Change is. Good design mitigates that risk.', 'Jeffrey Veen', 56, 'https://medium.com/@veen/next-b1364d7652cb', 0, 'online', '', '2015-02-07 21:57:56'),
(254, 'Everything in the universe has a rhythm, everything dances.', 'Maya Angelou', 81, '', 0, 'online', NULL, '2015-02-23 22:48:13'),
(255, 'We delight in the beauty of the butterfly, but rarely admit the changes it has gone through to achieve that beauty.', 'Maya Angelou', 81, '', 0, 'online', NULL, '2015-02-23 22:49:18'),
(256, 'Never make someone a priority when all you are to them is an option.', 'Maya Angelou', 81, '', 0, 'online', NULL, '2015-02-23 22:49:34'),
(257, 'It is fidelity of the experience, not the fidelity of the prototype, sketch, or technology that is important from the perspective of ideation and early design.', 'Bill Buxton', 13, 'http://www.userfocus.co.uk/newsletter/mar2015.html', 0, 'online', NULL, '2015-03-02 08:41:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` set('admin','editor','subscriber') NOT NULL DEFAULT 'subscriber',
  `created` datetime DEFAULT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created`, `fullname`) VALUES
(1, 'pixeline', 'yoyo', 'admin', '2015-03-19 10:19:29', 'Alexandre Plennevaux');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
 ADD PRIMARY KEY (`id`), ADD KEY `slug` (`slug`), ADD KEY `total` (`total`);

--
-- Index pour la table `design_quotes`
--
ALTER TABLE `design_quotes`
 ADD PRIMARY KEY (`id`), ADD KEY `author` (`author`), ADD KEY `author_id` (`author_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT pour la table `design_quotes`
--
ALTER TABLE `design_quotes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;