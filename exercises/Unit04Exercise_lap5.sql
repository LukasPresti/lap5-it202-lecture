
DROP TABLE IF EXISTS games;
DROP TABLE IF EXISTS golfers;


USE lap5;

CREATE TABLE golfers
  (golferid int primary key,
  name varchar(100),
  address varchar(200),
  phone varchar(20));

INSERT INTO golfers VALUES (100, 'Rich', '123 Main St.', '555-1234');
INSERT INTO golfers VALUES (101, 'Barbara', '567 Oak St.', '555-5678');

INSERT INTO golfers VALUES (102, 'Alex Morgan', '10 Pine Lane', '973-555-0102');
INSERT INTO golfers VALUES (103, 'Sam Rivera', '22 Cedar Ave', '973-555-0103');


SELECT * FROM golfers;

CREATE TABLE games
  (gameid int auto_increment primary key,
  golferid int,
  score int);

INSERT INTO games (golferid, score) VALUES (100, 110);
INSERT INTO games (golferid, score) VALUES (100, 115);
INSERT INTO games (golferid, score) VALUES (100, 105);
INSERT INTO games (golferid, score) VALUES (101, 110);
INSERT INTO games (golferid, score) VALUES (101, 112);
INSERT INTO games (golferid, score) VALUES (101, 130);


INSERT INTO games (golferid, score) VALUES (102, 98);
INSERT INTO games (golferid, score) VALUES (102, 102);
INSERT INTO games (golferid, score) VALUES (102, 95);

INSERT INTO games (golferid, score) VALUES (103, 120);
INSERT INTO games (golferid, score) VALUES (103, 118);
INSERT INTO games (golferid, score) VALUES (103, 122);


SELECT * FROM games;


SELECT golferid, name FROM golfers ORDER BY name;


SELECT COUNT(score) AS games, AVG(score) AS average FROM games WHERE golferid = 102;


SELECT COUNT(score) AS games, AVG(score) AS average FROM games WHERE golferid = 103;