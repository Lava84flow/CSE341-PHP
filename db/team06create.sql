CREATE TABLE public.scripture
(
	scripture_id SERIAL NOT NULL PRIMARY KEY,
	book VARCHAR(50) NOT NULL,
	chapter INT NOT NULL,
	verse INT NOT NULL,
	content VARCHAR(254) NOT NULL
);


INSERT INTO public.scripture (book, chapter, verse, content) VALUES ('John', '1', '5', 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO public.scripture (book, chapter, verse, content) VALUES ('Doctrine and Covenants', '88', '49', 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO public.scripture (book, chapter, verse, content) VALUES ('Doctrine and Covenants', '93', '28', 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO public.scripture (book, chapter, verse, content) VALUES ('Mosiah', '16', '9', 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

CREATE TABLE public.topic
(
	topic_id SERIAL NOT NULL PRIMARY KEY,
	topic_name VARCHAR(50) NOT NULL
);

INSERT INTO public.topic (topic_name) VALUES ('Faith');;

INSERT INTO public.topic (topic_name) VALUES ('Sacrifice');

INSERT INTO public.topic (topic_name) VALUES ('Charity');


CREATE TABLE public.topic_scripture
(
	topic_scripture_id SERIAL NOT NULL PRIMARY KEY,
	topic_id INT NOT NULL,
	scripture_id INT NOT NULL,
	CONSTRAINT fk_topic
   		FOREIGN KEY(topic_id) 
      		REFERENCES topic(topic_id),
	CONSTRAINT fk_scripture
   		FOREIGN KEY(scripture_id) 
      		REFERENCES scripture(scripture_id)
);