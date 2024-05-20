create table users (
	id SERIAL PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	cognome VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(16) NOT NULL UNIQUE,
	indirizzo VARCHAR(100) NOT NULL,
	n_civico VARCHAR(5) NOT NULL,
	citta VARCHAR(100) NOT NULL,
	numero_telefono INT (10) NOT NULL
);


insert into users(nome,cognome,email,password,indirizzo,n_civico,citta)
values ('alessandro','nardi','ale02','Nina1.','pantanello',321,'latina',1234567891)