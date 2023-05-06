## Setup [ITA]

Il progetto include validazioni, gestione degli errori, feedback alert e piccoli script JavaScript, perciò una volta scaricato il progetto per assicurare il corretto funzionamento di ogni parte dell'applicazione consiglio di seguire i seguenti step:

1. Creare un database MySQL di nome **cloud_care_test_gianluca** e generare il file **.env** (_il file .env.example è già configurato_):

    ```bash
    cp .env.example .env

    // Se non settata generare anche l\'"APP_KEY" dell\'applicazione:
    php artisan key:generate

    // Se si sta usando una versione di PHP diversa dalla 8.0.2 :
    composer update
    ```

2. Installare le dipendenze:

    ```bash
    composer install
    npm install
    ```

3. Lanciare il comando per generare Migrazioni e/o Seed:

    ```bash
    // Migrazione senza seeder
    php artisan migrate

    // Migrazione con seeder
    php artisan migrate --seed
    ```

4. Avviare server:

    ```bash
    php artisan serve
    npm run dev
    ```

---

---

## Setup [ENG]

The project includes validations, error handling, feedback alerts and small JavaScript scripts, so once the project has been downloaded, to ensure the correct functioning of each part of the application, I recommend following the steps below:

1. Create a MySQL database named **cloud_care_test_gianluca** and generate the **.env** file (_the .env.example file is already configured_):

    ```bash
    cp .env.example .env

    // If unset, also generate the "APP_KEY" of the application:
    php artisan key:generate

    // If you are using a PHP version different from 8.0.2 :
    composer update
    ```

2. Install Dependencies:

    ```bash
    composer install
    npm install
    ```

3. Run the command to generate Migrations and/or Seeds:

    ```bash
    // Migrations without Seeds
    php artisan migrate

    // Migrations with Seeds
    php artisan migrate --seed
    ```

4. Start Server:

    ```
    php artisan serve
    npm run dev
    ```

---

##### Gianluca Mura - Laravel v9.x - PHP v8.0
