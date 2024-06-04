# e-spresso
## Documentazione dei file consegnati:
---
#### account.php
- Pagina account che contiene la scelta tra effettuare login o registrarsi.

## - database
- Contiene query per il database.
  #### e-spresso.sql
  - Query per la creazione del database (e inserimento dati).

## - img
- Contiene immagini varie condivise su diverse pagine.
  ### caffe
  - Contiene immagini dei tipi di caffè.
  ### cursor
  - Contiene i cursori custom.
  ### custom
  - Contiene immagini della pagina custom (create).
  ### home
  - Contiene immagini della home/index (anche parallasse).
  ### shop
  - Contiene immagini della pagina shop.
  ### video
  - Contiene vari video.

#### index.html
- Home page.

## - login:
- Contiene tutte le pagine legate all'utente
    #### area_riservata.php
    - Pagina area riservata dopo l'accesso.
    #### error.php
    - Pagina errore (password errata/email errata...).
    #### login.php
    - Pagina per effettuare il login.
    #### register.php
    - Pagina per registrarsi.
    ### - utility:
    - contiene alcune funzioni legate a login, area personale, registrazione, logout
        #### config.php
        - Configurazione della connessione PDO al database.
        #### delete_user.php
        - Funzione per eliminare utente dall'area riservata.
        #### login.php
        - Funzioni di login.
        #### modify.php
        - Funzioni per modificare utente dall'area riservata.
        #### out.php
        - Funzione per logout dalla sessione.
        #### register.php
        - Funzioni per registrazione.

## - pages:
- contiene le altre pagine del sito
    #### carrello_nologin.php
    - Pagina carrello per utenti non registrati.
    #### carrello.php
    - Carrello per utenti registrati e loggati.
    #### contatti.html
    - Pagina contatti (mappa, modulo contatti...).
    #### custom.php
    - Pagina custom (create) (contenente selezione caffè e customizzazione miscele).
    #### shop.php
    - Pagina shop (prodotti disponibili alla vendita).

## - php:
- contiene altri file php per funzionamento backend 
    #### add_to_cart.php
    - Funzione dello shop per aggiungere un prodotto al carrello.
    #### cancel_custom.php
    - Funzione per eliminare una miscela custom realizzata.
    #### funzione_recupero.php
    - Funzione per recuperare tutte le informazioni dell'utente (per l'area riservata).
    #### funzioni_carrello.php
    - Funzioni carrello (aggiungi quantità, rimuovi elementi).
    #### funzioni_shop.php
    - Funzioni per caricare dinamicamente i prodotti dal database allo shop.
    #### modulo_contatti.php
    - Funzione del modulo contatti.
    ### - selezione_caffe:
    - contiene le funzioni per la selezione del caffe (pagina custom/create)
        #### acidita_disponibili.php
        - Recupera le acidità disponibili dal database.
        #### corposita_disponibili.php
        - Recupera le corposità disponibili dal database.
        #### gusti_disponibili.php
        - Recupera i gusti disponibili dal database.
        #### retrogusti_disponibili.php
        - Recupera i retrogusti disponibili dal database.
        #### search.php
        - Funzione di ricerca del caffè in base alla selezione dell'utente.
    #### submit_custom.php
    - Funzione di creazione della miscela custom (pagina custom/create).

## README.md
- File di documentazione del progetto.

## scripts
- cartella contenente tutti gli script
    ### area_riservata.js
    - Script per la pagina area riservata.
    ### carrello.js
    - Script per la pagina carrello.
    ### contatti.js
    - Script per la pagina contatti.
    ### custom.js
    - Script per la pagina custom (create).
    ### home.js
    - Script per la pagina home (index).
    ### script.js
    - Script generale per tutte le pagine (navbar).
    ### shop.js
    - Script per la pagina shop.

## styles
- cartella contenente tutti gli stili
    ### account.css
    - Stile per la pagina account.
    ### carrello.css
    - Stile per la pagina carrello.
    ### contatti.css
    - Stile per la pagina contatti.
    ### custom.css
    - Stile per la pagina custom (create).
    ### home.css
    - Stile per la pagina home (index).
    ### login.css
    - Stile per la pagina login.
    ### register.css
    - Stile per la pagina registrazione.
    ### riservata.css
    - Stile per la pagina area riservata.
    ### shop.css
    - Stile per la pagina shop.
    ### style.css
    - Stile generico per tutte le pagine (navbar e footer).
---
### Gruppo:
- Alessandro Paolantonio, 2000159
- Alessandro Nardi, 1853941
- Andrea Panichi, 2008617
---