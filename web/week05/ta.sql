CREATE SCHEMA ta;
CREATE TABLE ta.Scriptures (
  id SERIAL NOT NULL PRIMARY KEY,
  book VARCHAR(50) NOT NULL,
  chapter SMALLINT NOT NULL,
  verse SMALLINT NOT NULL,
  content TEXT NOT NULL
);

INSERT INTO ta.Scriptures (book, chapter, verse, content)
VALUES ('John', 1, 5, 'And the alight shineth in darkness; and the darkness comprehended it not.');

INSERT INTO ta.Scriptures (book, chapter, verse, content)
VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');


INSERT INTO ta.Scriptures (book, chapter, verse, content)
VALUES ('Mosíah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');
