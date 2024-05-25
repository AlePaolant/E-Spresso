-- STRUTTURA DEL DATABASE - MI RACCOMANDO IL NOME ALTRIMENTI NON FUNZIONA
-- host: pgsql:host=localhost 
-- dbname: e-spresso
-- username: postgres
-- password: admin
-- tabella: users (id,nome,cognome,email,password,indirizzo,n_civico,citta);
-- tabella: carrello (id,user_id,product_id,quantita);
-- tabella: TipiCaffe (id,nome,idCorposita,idAcidita,idGusto1,idGusto2,idRetrogusto1,idRetrogusto2);
-- tabella: AciditaDisponibili (id,acidita);
-- tabella: CorpositaDisponibili (id,corposita);
-- tabella: GustiDisponibili (id,gusto);
-- tabella: RetrogustiDisponibili (id,retrogusto);


--ISTRUZIONI PER CREARE:
-- 1) crea tabella users
-- 2) crea tabella acidità,corposità,gusti,retrogusti
-- 3) crea tabella tipicaffe
-- 4) crea tabella carrello
-- 5) popola tabelle tipicaffe,gusti ecc ecc (fino a ALTER TABLE, riga 200)
-- 6) esegui ALTER TABLE
-- 7) popola con tutte le UPDATE 
-- 8) per test login aggiungi un utente a caso (riga 370)


-- TABELLA USERS:
CREATE TABLE users (
	id SERIAL PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	cognome VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(16) NOT NULL,
	indirizzo VARCHAR(100) NOT NULL,
	n_civico VARCHAR(5) NOT NULL,
	citta VARCHAR(100) NOT NULL,
	numero_telefono NUMERIC(10) NOT NULL
);

-- TABELLA CARRELLO:
CREATE TABLE carrello (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantita INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES TipiCaffe (id)
);


-- Tabella per i tipi di caffè: prodotti dello shop
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
-- Popola la tabella TipiCaffe
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


-- AGGIUNGI COLONNE PREZZO E DESCRIZIONE
ALTER TABLE tipicaffe
ADD COLUMN descrizione TEXT,
ADD COLUMN prezzo NUMERIC(10,2) DEFAULT 0.00;

-- AGGIUNGI VALORI DESCRIZIONE E PREZZO AD OGNI CAFFE
UPDATE tipicaffe
SET descrizione = 'Caffè Arabica prodotto nell’area Sul de Minas a 1000-1300 m.s.l.m., essiccato al sole. In tazza delicato, equilibrato e dal buon corpo, con un’ acidità minima. Al gusto spiccano note di cacao e cereali, nel retrogusto permangono note di arachide tostato.',
    prezzo = 7.99
WHERE nome = 'Brasile';

UPDATE tipicaffe
SET descrizione = 'Caffè Arabica prodotto nell’area Ovest d’Etiopia a 1600-1800 metri s.l.m., essiccato al sole. In tazza si presenta con un corpo consistente e un’acidità medio leggera. Il gusto è fruttato, con sentori di agrumi e spezie. Il retrogusto è cioccolatoso.',
    prezzo = 7.99
WHERE nome = 'Etiopia';

UPDATE tipicaffe
SET descrizione = 'Caffè Robusta, coltivato nella regione Karnataka a 500-800 metri s.l.m., lavato. In tazza si presenta corposo, vellutato e dal gusto intenso. Al gusto risaltano note di liquirizia, cacao e spezie. Nel retrogusto permangono note di frutta secca.',
    prezzo = 7.99
WHERE nome = 'India';

UPDATE tipicaffe
SET descrizione = 'Selezione di caffè Robusta, coltivato nella zona del complesso vulcanico Tengger, tra 600-800 metri s.l.m., lavato. In tazza si presenta corposo. Al gusto si percepiscono gradevoli sentori di cacao e sandalo. Nel retrogusto spiccano note di nocciole tostate.',
    prezzo = 7.99
WHERE nome = 'Indonesia';

UPDATE tipicaffe
SET descrizione = 'Selezione di caffè Robusta, coltivato sugli altopiani settentrionali dell’isola di Flores tra 400-800 metri s.l.m., lavato. In tazza si presenta con un corpo pieno. Al gusto si percepisce l’aroma di cacao. Nel retrogusto persistono note di nocciole tostate e cioccolato.',
    prezzo = 7.99
WHERE nome = 'Indonesia Flores';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, lavorato con metodo naturale, essiccato al sole. Coltivato a 1400-1800 metri s.l.m. In tazza si presenta con un buon corpo. Al gusto spiccano note speziate. Nel retrogusto persistono note di cacao e frutta secca, in particolare la noce.',
    prezzo = 7.99
WHERE nome = 'Kenia';

UPDATE tipicaffe
SET descrizione = 'Selezione di caffè Robusta, lavato. Coltivato a sud nella regione del Chiapas a circa 800 metri s.l.m. In tazza si presenta molto corposo. Al gusto presenta gradevoli note di pane tostato e cacao. Nel retrogusto prevalgono note di frutta secca, in particolare sentori di noce.',
    prezzo = 7.99
WHERE nome = 'Messico';

UPDATE tipicaffe
SET descrizione = 'Selezione di caffè Robusta, lavato. Proveniente dallo stato del Karnataka. Coltivato tra 500-1000 metri s.l.m. In tazza si presenta con una crema consistente e vellutata. Al gusto si colgono note calde di cacao e nocciola. Nel retrogusto è persistente.',
    prezzo = 7.99
WHERE nome = 'India Peabelly';

UPDATE tipicaffe
SET descrizione = 'Qualità arabica prodotto nell’area Minas Gerais  dalla Fazenda Vila Boa (Carmo da Mata). La coltivazione è situata a 1000-1200 metri s.l.m. In tazza si presenta con un buon corpo, una lieve nota acida che evolve in caramello e frutta secca. Retrogusto dolce con note di cioccolato fondente.',
    prezzo = 7.99
WHERE nome = 'Brasile Vila Boa';

UPDATE tipicaffe
SET descrizione = 'Qualità arabica, varietà Castillo e Colombia, coltivato tra i 1400-1600 metri s.l.m. nella regione di Huila. Lavato e fatto essiccare al sole. In tazza si presenta con un buon corpo e una fine acidità. Al gusto si colgono note di agrume dolce. Il retrogusto rilascia note di frutta secca, tipo datteri.',
    prezzo = 7.99
WHERE nome = 'Colombia Rio Magdalena';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, varietà Caturra e Catuai, coltivato tra i 1300-1800 metri s.l.m. nella regione Tarrazzù, altopiano della valle centrale. Il caffè viene lavato ed essiccato al sole. In tazza si presenta con corpo medio, acidità gradevole, al gusto spiccano note fruttate di frutti rossi tipo mora e amarena mescolate a caramello, retrogusto persistente e dolce.',
    prezzo = 8.99
WHERE nome = 'Costa Rica';

UPDATE tipicaffe
SET descrizione = 'Caffè Arabica, coltivato nella regione di Oromia, cresce fra 1900-2200 metri s.l.m., sottoposto a lavorazione naturale. In tazza si presenta con un corpo e un’acidità media, tendente al citrico. Al gusto si percepisce un’esplosione di fiori e futura dolce e un retrogusto lievemente speziato e cioccolatoso.',
    prezzo = 8.99
WHERE nome = 'Etiopia Guji';

UPDATE tipicaffe
SET descrizione = 'Caffè Arabica, coltivato tra 1500 e 1900 metri s.l.m. da una federazione di 130 cooperative locali. Lavato. In tazza si presenta con un buon corpo e un’acidità media. Al gusto spiccano note fruttate di prugna e fichi. Il retrogusto rimanda a sentori di mandorla e cacao.',
    prezzo = 8.99
WHERE nome = 'Guatemala';

UPDATE tipicaffe
SET descrizione = 'Caffè Arabica, coltivato nella regione di Marcala tra i 1400 - 1700 metri s.l.m., lavato. In tazza si presenta con un buon corpo e un’acidità media. Al gusto spiccano note fruttate di albicocca, mandarancio, mela, rosa canina, cacao e noci.  Il retrogusto risulta speziato.',
    prezzo = 8.99
WHERE nome = 'Honduras';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, coltivata tra 1200 - 1350 metri s.l.m. nel Nicaragua Settentrionale, una zona dal microclima particolarmente umido che favorisce la formazione di aromaticità complesse e intense. Selezionato e raccolto manualmente e poi lavato. In tazza l’acidità è citrica, al gusto spiccano note agrumate, miele e caramello.',
    prezzo = 8.99
WHERE nome = 'Nicaragua';

UPDATE tipicaffe
SET descrizione = 'Caffè Arabica, varietà Burbon e Tipica, coltivato da piccoli produttori nella regione Pasco (Perù centrale, foresta amazzonica) a 1700-1900 metri s.l.m. In tazza, bassa acidità, spiccano note di malto e una lieve nota caramellata. Nel retrogusto prevalgono note di frutta secca, come noce e fava di cacao.',
    prezzo = 7.99
WHERE nome = 'Perù';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, raccolto manualmente sottoposto a fermentazione di dodici ore e poi lasciato ad asciugare al sole. Coltivato a 900 metri s.l.m. nella provincia di Barahona su un terreno argilloso dalla famiglia Melo. In tazza si presenta con una particolare composita e ricca aromaticità, acidità equilibrata. Al gusto risaltano note di caramello e frutta secca, nel retrogusto note di tabacco.',
    prezzo = 7.99
WHERE nome = 'Santo Domingo';

UPDATE tipicaffe
SET descrizione = 'Caffè Arabica, varietà Bourbon, Cattura e Catuai. Coltivato a 1600 metri s.l.m. nella regione di Huehuetenango dalla famiglia Vides. Sottoposto a 36 ore di fermentazione.  In tazza si presenta con un’elevata struttura aromatica: sentori di frutti rossi e agrumi. Il retrogusto fruttato è persistente e pulito.',
    prezzo = 7.99
WHERE nome = 'Tanzania';

UPDATE tipicaffe
SET descrizione = 'Caffè Arabica, varietà Bourbon, Cattura e Catuai. Coltivato a 1600 metri s.l.m. nella regione di Huehuetenango dalla famiglia Vides. Sottoposto a 36 ore di fermentazione. In tazza si presenta con un’elevata struttura aromatica: sentori di frutti rossi e agrumi. Il retrogusto fruttato è persistente e pulito.',
    prezzo = 7.99
WHERE nome = 'Guatemala Finca El Puente';

UPDATE tipicaffe
SET descrizione = 'Miscela di soli caffè Arabica provenienti da Santo Domingo ed Etiopia. In tazza si presenta con un buon corpo e una lievissima acidità. Al gusto esplodono profumi ed aromi di fiori, frutta, miele. Nel retrogusto, amabile e persistente, si colgono note di frutta e cioccolato.',
    prezzo = 9.99
WHERE nome = 'Anima';

UPDATE tipicaffe
SET descrizione = 'Miscela di soli caffè Robusta provenienti da India e Indonesia. Due caffè di alta selezione lavorati in umido.  In tazza si presenta corposo e vellutato, con note di cacao, nocciola e pan tostato. Permane un retrogusto amabile di caffè',
    prezzo = 9.99
WHERE nome = 'Caffè';

UPDATE tipicaffe
SET descrizione = 'Miscela di Arabiche e Robuste provenienti da: Brasile, Colombia, India, e Centro Africa. Un caffè corposo, dall’odore avvolgente. Al gusto spiccano note di cioccolato, cereali e spezie.',
    prezzo = 9.99
WHERE nome = 'Drupa';

UPDATE tipicaffe
SET descrizione = 'Miscela di soli caffè Arabica provenienti da: Brasile, Colombia ed Etiopia. Caffè dalla lieve acidità. Il gusto è equilibrato, spiccano sentori di cioccolato, floreale e frutta fresca.',
    prezzo = 9.99
WHERE nome = 'Fiore';

UPDATE tipicaffe
SET descrizione = 'Miscela di caffè selezionati robusta e 20% arabica provenienti da India, Centro Africa e Brasile. In tazza si presenta corposo con un gusto deciso ed avvolgente, spiccano note speziate, cacao e un persistente retrogusto di nocciola.',
    prezzo = 9.99
WHERE nome = 'Foglia';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, varietà Red Bourbon, coltivata tra i 1800-2200 metri s.l.m. dalla Farm Nyamade. Sottosto a lavorazione umida. In tazza si presenta con un buon corpo e aroma bilanciato, l’acidità è media. Al gusto spiccano note di ciliegia, caramello e liquirizia. Il retrogusto è cioccolatoso. CUPPING SCORE 86,25',
    prezzo = 14.99
WHERE nome = 'Ruanda';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, varietà Red Catuai. Prodotto a 1700 metri s.l.m nella zona Chocabamba dalla famiglia Calani. Dopo il raccolto, il caffè viene selezionato manualmente e sottoposto a lavorazione anaerobica, un processo che conferisce al caffè acidità complessa e spiccata. Il corpo pieno e sciropposo. Al gusto si percepiscono note fruttate di albicocca e ciliegia. Nel retrogusto è molto persistente una nota di liquirizia. CUPPING SCORE 88,50',
    prezzo = 14.99
WHERE nome = 'Bolivia';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, varietà Typica e Castillo. Prodotto tra i 1350-1800 metri s.l.m. nel dipartimento di Huila dalla Farm Cadefinuila. Raccolto e selezionato a mano e sottoposto a lavorazione umida. Un caffè dal corpo sciropposo e dall’acidità complessa e spiccata. Al gusto si colgono note di caramello, passion fruit e pesca. Il retrogusto è dolce, permangono note di pan tostato e zucchero di canna. CUPPING SCORE 85,75',
    prezzo = 14.99
WHERE nome = 'Colombia Passion Fruit';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, varietà Catuai. Coltivato a 1500-1700 metri s.l.m., Finca El Salto Boquete. Sottoposto a lavorazione umida. In tazza si presenta con un corpo ricco e sciropposo. L’acidità frizzante, di tipo agrumata. Al gusto spiccano note di scorza d’arancia, mela cotogna, tè verde. Retrogusto persistente di frutti rossi e cacao. CUPPING SCORE 84,25',
    prezzo = 14.99
WHERE nome = 'Panama';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, varietà Bourbon e Typica. Prodotto nella piantagione Sig.ri, situata nella valle di Waghi, tra 1600 e 2200 metri s.l.m. Sottoposto a lavorazione umida che conferisce al caffè un’acidità gradevole e citrica. In tazza si presenta con un buon corpo. Al gusto spiccano note sciroppose, caramello e frutta secca. Retrogusto gradevole di liquirizia. CUPPING SCORE 86',
    prezzo = 14.99
WHERE nome = 'Papua Nuova Guinea';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, varietà Red Catuai, prodotto dalla Finca Los Santos nella provincia di Utcubamba tra 1700-2000 metri s.l.m. Sottoposto a lavorazione umida ed essiccato al sole. In tazza si presenta con corpo burroso e acidità brillante. Al gusto spiccano note di frutti rossi e arancia dolce, retrogusto pulito con note di chinotto. CUPPING SCORE 85,25',
    prezzo = 14.99
WHERE nome = 'Perù Imperator';

UPDATE tipicaffe
SET descrizione = 'Qualità Arabica, varietà Bourbon.
Coltivato tra i 1500 - 2200 metri s.l.m., nella zona settentrionale di Sumatra nella provincia di Areh. Sottoposto a lavorazione umida. In tazza si presenta con un corpo ricco e sciropposo. L’acidità è moderata. Al gusto spiccano note di frutti tropicali mescolati a sentori di uva passa e cioccolato. CUPPING SCORE 85',
    prezzo = 14.99
WHERE nome = 'Sumatra';











insert into users(nome,cognome,email,password,indirizzo,n_civico,citta,numero_telefono)
values ('alessandro','nardi','ale02','Nina1.','pantanello',321,'latina',1234567891)