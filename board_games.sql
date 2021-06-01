CREATE TABLE if not exists board_games
(
	id serial not null,
	name varchar(255) not null,
	short_description varchar(255) default NULL::character varying,
	description text,
	year_published smallint not null,
	designer varchar(255) not null,
	publisher varchar(255) not null,
	constraint board_games_pk
		primary key (id)
);


INSERT INTO board_games (id, name, short_description, description, year_published, designer, publisher) VALUES (1, 'Lisboa', 'Compete to reconstruct the city of Lisboa after the great earthquake of 1755.', 'Lisboa is a game about the reconstruction of Lisboa after the great earthquake of 1755.', 2017, 'Vital Lacerda', 'Eagle-Gryphon Games');
INSERT INTO board_games (id, name, short_description, description, year_published, designer, publisher) VALUES (2, 'Brass: Birmingham', 'Build networks, grow industries, and navigate the world of the Industrial Revolution.', 'Brass: Birmingham is an economic strategy game sequel to Martin Wallace 2007 masterpiece, Brass. Birmingham tells the story of competing entrepreneurs in Birmingham during the industrial revolution, between the years of 1770-1870.', 2018, 'Gavan Brown, Matt Tolman, Martin Wallace', 'Roxley');
INSERT INTO board_games (id, name, short_description, description, year_published, designer, publisher) VALUES (3, 'Gaia Project', 'Expand, research, upgrade, and settle the galaxy with one of 14 alien species.', 'Gaia Project is a new game in the line of Terra Mystica. As in the original Terra Mystica, fourteen different factions live on seven different kinds of planets, and each faction is bound to their own home planets, so to develop and grow, they must terraform neighboring planets into their home environments in competition with the other groups. In addition, Gaia planets can be used by all factions for colonization, and Transdimensional planets can be changed into Gaia planets.', 2017, 'Jens Drögemüller, Helge Ostertag', 'Capstone Games');
INSERT INTO board_games (id, name, short_description, description, year_published, designer, publisher) VALUES (4, 'Pandemic Man', 'Your team of experts must prevent the world from succumbing to a viral pandemic.', 'In Pandemic, several virulent diseases have broken out simultaneously all over the world! The players are disease-fighting specialists whose mission is to treat disease hotspots while researching cures for each of four plagues before they get out of hand.', 2008, 'Matt Leacock', 'Z-Man Games, Inc.');
INSERT INTO board_games (id, name, short_description, description, year_published, designer, publisher) VALUES (6, 'Pandemic', 'Your team of experts must prevent the world from succumbing to a viral pandemic.', 'In Pandemic, several virulent diseases have broken out simultaneously all over the world! The players are disease-fighting specialists whose mission is to treat disease hotspots while researching cures for each of four plagues before they get out of hand.', 2008, 'Matt Leacock', 'Z-Man Games, Inc.');