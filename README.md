
# Watuppa - Problema

**Frontend**

Realizzare un nuovo componente VueJs per gestire un riquadro contenente una casella di testo e un pulsante, con le seguenti specifiche.

La casella di testo servirà per inserire un indirizzo email che al click del pulsante dovrà essere trasmesso a un servizio di backend che restituisca l’elenco di ordini associati all’email inserita, pervenuti negli ultimi 30 giorni.

Lo stile del componente dovrà essere coerente con quello del sito www.internazionale.it

Il codice dovrà avere sintassi single-file component con javascript ES6, da transpilare in javascript ES5 per supportare anche i browser più vecchi.


**Backend**

Il servizio di backend dovrà essere di tipo API REST e rispondere in formato JSON, da sviluppare in PHP standard senza utilizzare framework.

Dovrà interrogare un database MySQL utilizzando la classe MysqliDb con query JOIN. Il database dovrebbe contenere dati di utenti e di ordini con differenti prodotti e date.

La classe MysqliDb è disponibile all’indirizzo https://github.com/ThingEngineer/PHP-MySQLi-Database-Class

# Assunzioni possibile soluzione

- Si presume che la tabella orders abbia user_id
- Si presume che il singolo record ordine abbia date come parametro

## Note

- Si potrebbero implementare una risposta migliore dellla risposta dell'api

- Si potrebbe implementare un sistema di gestione degli errori più efficace con messaggi specifici in base alla tipologia di errore. 

Possibile implementazione che non consiglio.
- "Email non esistente" (possibile problema, si da la possibilità a tutti di scoprire chi ha fatto ordini sul sito)