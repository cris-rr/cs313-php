
CREATE TABLE scriptures (
  id SERIAL NOT NULL PRIMARY KEY,
  book VARCHAR(50) NOT NULL,
  chapter SMALLINT NOT NULL,
  verse SMALLINT NOT NULL,
  content TEXT NOT NULL
);

INSERT INTO scriptures (book, chapter, verse, content)
VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scriptures (book, chapter, verse, content)
VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');


INSERT INTO scriptures (book, chapter, verse, content)
VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

INSERT INTO scriptures (book, chapter, verse, content)
VALUES ('Moroni', 7, 45, 'And charity suffereth long, and is kind, and envieth not, is not puffed up, seeketh not her own, is not easily provoked, thinketh no evil, and rejoiceth not in iniquity but rejoiceth in the truth, beareth all things, believeth all things, hopeth all things, endureth all things.');

CREATE TABLE topic (
  id SERIAL NOT NULL PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

INSERT INTO topic (name) 
VALUES ('Faith'), 
('Sacrifice'), 
('Charity');

CREATE TABLE linking (
id SERIAL NOT NULL PRIMARY KEY,
scripture_id INT NOT NULL,
topic_id INT NOT NULL, 
FOREIGN KEY (scripture_id) REFERENCES scriptures(id), 
FOREIGN KEY (topic_id) REFERENCES topic(id)
);

SELECT s.book, s.chapter, s.verse, s.content, t.name
FROM scriptures s
LEFT JOIN linking l ON l.scripture_id=s.id
LEFT JOIN topic t ON t.id=l.topic_id;

-- By faith Abel offered unto God a more excellent sacrifice than Cain, by which he obtained witness that he was righteous, God testifying of his gifts: and by it he being dead yet speaketh.

SELECT s.book, s.chapter, s.verse, s.content
FROM scriptures s
JOIN linking l ON l.scripture_id = s.id;