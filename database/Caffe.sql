-- Tabella per i tipi di caffè
CREATE TABLE TipiCaffe (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idCorposita INTEGER,
    idAcidita INTEGER,
    idGusto1 INTEGER,
    idGusto2 INTEGER,
    idRetrogusto1 INTEGER,
    idRetrogusto2 INTEGER,
    FOREIGN KEY (idAcidita) REFERENCES AciditaDisponibili(id),
    FOREIGN KEY (idGusto1) REFERENCES GustiDisponibili(id),
    FOREIGN KEY (idGusto2) REFERENCES GustiDisponibili(id),
    FOREIGN KEY (idCorposita) REFERENCES CorpositaDisponibili(id),
    FOREIGN KEY (idRetrogusto1) REFERENCES RetrogustiDisponibili(id),
    FOREIGN KEY (idRetrogusto2) REFERENCES RetrogustiDisponibili(id)
);

-- Tabella per le acidità disponibili
CREATE TABLE AciditaDisponibili (
    id SERIAL PRIMARY KEY,
    acidita VARCHAR(100) NOT NULL
);

-- Tabella per i gusti disponibili
CREATE TABLE GustiDisponibili (
    id SERIAL PRIMARY KEY,
    gusto VARCHAR(100) NOT NULL
);

-- Tabella per i corpi disponibili
CREATE TABLE CorpositaDisponibili (
    id SERIAL PRIMARY KEY,
    corposita VARCHAR(100) NOT NULL
);

-- Tabella per i retrogusti disponibili
CREATE TABLE RetrogustiDisponibili (
    id SERIAL PRIMARY KEY,
    retrogusto VARCHAR(100) NOT NULL
);



-- Popola la tabella AciditaDisponibili
INSERT INTO AciditaDisponibili (acidita) VALUES
    ('Lievissima'),
    ('Lieve'),
    ('Media'),
    ('Alta'),
    ('Brillante'),
    ('Frizzante'),
    ('Spiccata e complessa');

-- Popola la tabella CorpositaDisponibili
INSERT INTO CorpositaDisponibili (corposita) VALUES
    ('Leggera'),
    ('Media'),
    ('Consistente'),
    ('Piena'),
    ('Molto Piena'),
    ('Burrosa'),
    ('Sciroppata');

-- Popola la tabella GustiDisponibili
INSERT INTO GustiDisponibili (gusto) VALUES
    ('Albicocca'),
    ('Agrumi'),
    ('Agrumi dolci'),
    ('Cacao'),
    ('Caramello'),
    ('Cereali'),
    ('Ciliegie'),
    ('Cioccolato'),
    ('Fiori'),
    ('Fichi'),
    ('Frutta secca'),
    ('Frutti'),
    ('Frutti rossi'),
    ('Frutti tropicali'),
    ('Liquirizia'),
    ('Malto'),
    ('Mela cotogna'),
    ('Miele'),
    ('Nocciola'),
    ('Pane'),
    ('Passion fruit'),
    ('Pesca'),
    ('Prugne'),
    ('Rosa canina'),
    ('Sandalo'),
    ('Scorza di arancia'),
    ('Spezie'),
    ('Uva passa');

-- Popola la tabella RetrogustiDisponibili
INSERT INTO RetrogustiDisponibili (retrogusto) VALUES
    ('Arachide tostato'),
    ('Cacao'),
    ('Cioccolato'),
    ('Cioccolato fondente'),
    ('Chinotto'),
    ('Datteri'),
    ('Fiori'),
    ('Frutta secca'),
    ('Frutti'),
    ('Frutti rossi'),
    ('Liquirizia'),
    ('Mandorle'),
    ('Nocciole'),
    ('Noce'),
    ('Pane tostato'),
    ('Spezie'),
    ('Tabacco'),
    ('Zucchero di canna');

-- Popola la tabella TipiCaffe con alcuni esempi
INSERT INTO TipiCaffe (nome, idCorposita, idAcidita, idGusto1, idGusto2, idRetrogusto1, idRetrogusto2) VALUES
    ('Brasile', 2, 1, 6, 4, 1, NULL),
    ('Etiopia', 3, 3, 12, 27, 3, NULL),
    ('India', 4, 1, 15, 4, 8, NULL),
    ('India Peabelly', 3, 2, 19, 4, NULL, NULL),
    ('Indonesia', 4, 1, 4, 25, 13, NULL),
    ('Indonesia Flores', 4, 2, 4, NULL, 13, 3),
    ('Kenia', 2, 3, 27, NULL, 2, 8),
    ('Messico', 6, 1, 4, 20, 8, 14),

    ('Brasile Vila Boa', 2, 2, 5, 11, 4, NULL),
    ('Colombia Rio Magdalena', 2, 2, 3, NULL, 8, 6),
    ('Costa Rica', 2, 3, 13, 5, NULL, NULL),
    ('Etiopia Guji', 2, 3, 9, 12, 16, 3),
    ('Guatemala', 2, 3, 23, 10, 2, 12),
    ('Guatemala Finca El Puente', NULL, NULL, 13, 2, 9, NULL),
    ('Honduras', 2, 3, 12, 24, 16, NULL),
    ('Nicaragua', 2, 4, 2, 18, NULL, NULL),
    ('Perù', 2, 2, 16, 5, 8, 2),
    ('Santo Domingo', 4, 3, 11, 5, 17, NULL),
    ('Tanzania', 5, 1, 11, 5, 2, 14),

    ('Anima', 2, 1, 9, 12, 9, 3),
    ('Caffè', 4, 2, 4, 19, 2, NULL),
    ('Drupa', 4, 3, 8, 6, NULL, NULL),
    ('Fiore', 2, 2, 8, 11, 7, NULL),
    ('Foglia', 4, 1, 27, 4, 13, NULL),

    ('Ruanda', 2, 3, 7, 15, 3, NULL),
    ('Bolivia', 4, 7, 7, 1, 11, NULL),
    ('Colombia Passion Fruit', 7, 7, 22, 21, 15, 18),
    ('Panama', 7, 6, 26, 17, 2, 10),
    ('Papua Nuova Guinea', 2, 3, 11, NULL, 11, NULL),
    ('Perù Imperator', 6, 5, 13, 3, 5, NULL),
    ('Sumatra', 7, 3, 14, 28, NULL, NULL);