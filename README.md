# E-SPRESSO
Realizzazione di un sito di e-commerce di caffè su misura
### L'idea
Tutto nasce da un'osservazione della realtà: tutti noi prendiamo caffè quasi ogni giorno, per alcuni è un momento fondamentale della giornata. 
La diffusione maggiore di macchinette automatiche ha trasformato un prodotto di qualità in uno sempre più commerciale. È cominciata quindi una ricerca di sapori e aromi più adatti alla persona, che ci ha portato alla scoperta di diversi gusti, aromi, sapori e consistenze, che prima non conoscevamo. Qui nasce la nostra idea, un e-commerce di caffè in cui sono presenti:
- **parte informativa:** fornisce una descrizione delle miscele disponibili
- **parte interattiva:** permette all'utente di scegliere una miscela in base ai propri gusti, e se questa non dovesse essere presente, consente di creare una miscela originale combinando le preferenze personali
---
### Linguaggi, librerie e framework utilizzati:
- HTML, CSS, JavaScript
- Bootstrap, JQuery
- PostgreSQL
- AJAX
---
### Gruppo:
- Alessandro Paolantonio, 2000159
- Alessandro Nardi, 1853941
- Andrea Panichi, 2008617
---
### Istruzioni installazione:
> installazione di XAMPP e PostgreSQL

Download PostgreSQL da [qui](https://www.enterprisedb.com/downloads/postgres-postgresql-downloads)

Download XAMPP da [qui](https://www.apachefriends.org/it/download.html)
---
### Configurazione database creati (al 16/05/24)
#### database GENERALE: 
- host: pgsql:host=localhost 
- dbname: e-spresso
- username: postgres
- password: admin
- tabella: users (id,nome,cognome,email,password,indirizzo,n_civico,citta);
- tabella: carrello (id,user_id,product_id,quantita);
- tabella: TipiCaffe (id,nome,idCorposita,idAcidita,idGusto1,idGusto2,idRetrogusto1,idRetrogusto2);
- tabella: AciditaDisponibili (id,acidita);
- tabella: CorpositaDisponibili (id,corposita);
- tabella: GustiDisponibili (id,gusto);
- tabella: RetrogustiDisponibili (id,retrogusto);

### Estensioni Visual Studio Code utili: 
- HTML CSS Support
- JavaScript (ES6) code snippets
- PHP Intelephense
- Live Preview
- GitHub Pull Requests
---

#### Link al Google Drive contenente foto, video e testi:
[Google Drive](https://drive.google.com/drive/folders/1fNUvAdTb9a76z5cbMZ0cNqWEIsqe_WZ1?usp=drive_link) (Accesso con Sapienza)