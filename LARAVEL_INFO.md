CTRL-SHIFT-V per visualizzare .md

Installazione Laravel
=====================

Per installare Laravel bisogna installare il composer e poi il framework.

1) Installazione composer 

Composer è il sistema per gestione delle dipendenze in php. Solo per installare le librerie php.

Link installazione:

https://getcomposer.org/download/

Comando shell per verificare installazione:
    
    composer --version

2) Installazione Laravel e creazione nuovo progetto

Comando installazione e creazione Laravel. Crea un progetto e contemporaneamente installa il framework:

    composer create-project laravel/laravel nomeProgetto "9.*" --prefer-dist

"9.*" --prefer-dist --> versione Laravel

Potrebbero generarsi degli errori, tornare sul file php.ini e spuntare: 

    extension=fileinfo
    extentesion=zip


Avvio del framework
===================
Per avviare il framework sulla porta 8000 lanciare comando dalla cartella di progetto

    php artisan serve

Blade 
=====

Cosa è? 

Permette di inserire entità e comandi php nella pagina HTML. La pagina HTML mantiene la struttura e variando i comandi Blade variano i contenuti.
La compilazione della pagina php avviene solo se cambia qualcuno dei valori nel frammento Blade.

I file di view di Laravel hanno estansione .blade.php

    @yield ('title','online store elena galfrè')

    @yield(valore da assegnare, valore da assegnare di default)

STEP 1
======

Creazione prima pagina HTML - creazione del layout di base dell'applicazione
===========================================================================

1) Creo dentro la certella views una cartella layout dove andrò a salvare la pagina html con il layout do base del sito web.

    laravel\progett0\resources\views\layout

Creo file app.blade.php che è la pagina standard del nostro sito web. Con Blade erediteremo questa pagina modificandone i campi indicati con @yield.

![Alt text](image-2.png)

@exteds --> eredita la template e lo estende assegnato valore agli yield

Struttura cartelle file


![Alt text](image.png)

Fuori dalla cartella layouts abbiamo i file con codice blade necessario a modificare il contenuto del file (injetto)

STEP 2
======

Creazione dei file blade per la pagina index e about  
====================================================

Creo una nuova cartella in views chiamata 'home' dentro creo due file

1) index.blade.php
2) about.blade.php

I file blade servono per ingettare contenuto nella pagina standard del sito quando si clicca su 'home' ed 'about' in alto a destra del sito.

![Alt text](image-4.png)

Spiegazione blade della pagina 'index.blade.php'

    @section('title',$viewData["title"]) 

Il $viewData è un dizionario che passeremo come parametro alla costruzione della pagina.

Per poter gestire file immagini creo una nuova cartella sotto 'public'

![Alt text](image-3.png)

Spiegazione blade della pagina index.blade.php

    <img src = "{{ asset('/img/img1.jpg')}}" class = "img-fluid rounded">

asset cerca direttamente nella cartella 'public'

STEP 3
======

Routing --> file1
=================

Il routing è una componente del controller che reindirizza l'utente verso le pagine corrette in base alla url. Nel momento in cui crea la vista passa i parametri necessari.

Per definire il percorso di routing si compila il file nella cartella 'routes' denominato web.php

Definizione della funzione da chiamare nel caso in cui l'utente clicchi/cerchi la pagina root del sito ovvero 127.0.0.1:8000/

1) chimata alla pagina index - creazione di un vettore dove definiamo il titolo della pagina e lo passiamo al file index.blade.php

    Route::get('/', function () {

    $viewData = [];
    $viewData['title'] = "Home page sito";
    return view('home.index')->with("viewData",$viewData);

    });

2)Definizione della pagina da aprire nel caso in cui l'utente clicchi su about. Questo è ciò che passiamo alla vista come valori per la compilazione dei campi blade.


    Route::get('/about', function () {

    $title = "Our story";
    $subtitle = ".....non so cosa scrivere...";
    $description = "descrizione....";
    $author = "autore...";
    
    return view('home.about')->with("title",$title)
    ->with("subtitle",$subtitle)
    ->with("description",$description)
    ->with("author",$author);

});

Creazione classe controller - Capitolo 6
========================================

1) Nella cartella controllers andiamo a creare una pagina "HomeController.php" dove creaiamo le due funzioni che verranno richiamate nella pagina di routing precedentemente creata.

2) Nella pagina web.php andreamo a chiamare le funzioni (cambio codice)


    Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index")

- Percorso file per andare a trovare io controller di nome 'index' 
    
    App\Http\Controllers\HomeController@index


- La funzione ingetta nel file che viene richiamato con la funzione name()

    ->name("home.index")
   
Refactoring del codice usando un dizionario (cap.7)
===================================================

Vedi HomeController.php funzione about() lasciato in commento vecchio codice

Creazione dei link per i bottoni 'about' e 'home'
=================================================

Passimo al tag href il percordo per raggiungere le pagine 'home.about' e 'home.index'

Creazione della pagina con lista prodotti e dettaglio prodotto
==============================================================

1) Creo il routing per le due pagine index e show inerenti ai prodotti


    Route::get('/products','App\Http\Controllers\ProductController@index')->name("product.index");

    
    Route::get('/products/{{id}}','App\Http\Controllers\ProductController@show')->name("product.show");


2) Creo le funzioni nella classe ProductController



3) Creo i file .blade.php per la lista prodotti e il singolo prodotto dentro la cartella views/product

Installazione di MariaDB
========================

1) Download di maria db

2) Installato il db sulla shell del progetto tiriamo giù laravel e digitiamo

    
    php artisan make:migration create_products_table

Questo comando crea un file nella cartella database --> migrations ci servirà per creare le tabelle nel db. Non si lavora direttamente su db ma attraverso script generati da laravel;

3)sul file .env nella root di progetto inserire password e nome del db

4) dalla shell di progetto 
   
   php artisan migrate 
   
   Per creare tabella su mariadb

Creazione dell DAO di Products
==============================

    php artisan make:model Product


Crea il DAO del prodotto con tutte le funzioni create, read/find, readAll/all, findOrFail, delete/destroy. Il file viene creato in app-->http-->models