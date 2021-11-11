"# TimeTable2" 

This application uses notification in form of text messages to alert lectures and students of their lectures and classes 

-- To install this aplication

-> clone or download the zip file of the project
-> create a .env file and copy env.example files into it and save
-> run the command "composer install"
-> run "php artisan key:generate"
-> on ur database, XAMP for instance, create a new data base callef "time"
-> chage the database in the .env file to "time"
-> make sure your server is running and run "php artisan migrate --seed"
-> finally serve the application - "php artisan serve"

---> Admin login is 
        -> email -> admin@email.com
        -> password -> password
