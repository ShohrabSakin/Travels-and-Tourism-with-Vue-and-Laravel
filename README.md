# Travels & Tourism Management

The Travels & Tourism Management System is to manage the details of Customer, Package booking and tourism places. It manages all the information about User, Hotels, Packages, Flights etc. The project is totally built at administrative end and thus only the administrator is guaranteed the access to the backend database. The purpose of this project is to build an application program to reduce the manual work for managing Tourist, Booking, Visiting places etc.

## Dependencies

| App and Language        | Version                                                     |
| :------:                | :------:                                                    |
| Language Used           |PHP 7.x                                                      |
| Database                | MySQL 5.2.1                                                 |
| User Interface Design   | HTML 5, CSS 3, Bootstrap 5, jQuery 3, JavaScript [ ES-6 ]   |
| XAMPP Version           | XAMPP 8.2.4                                                 |
| Web Browser             | Google Chrome, Mozilla Firefox                              |
| Front end               | React 18.2.0                                                |
| Back end                | Laravel 10.3.2                                              |




   ## How to run the project
    1. Download the zip file.

    2. Extract the files and copy those  files in your preferable Xampp folder [C/D/E].

    3. Make two folder name  "REACT" and "LARAVEL" in your preferable Xampp folder [C/D/E].
    
    4. In LARAVEL folder keep the "sakin" file. Which was used for Back end.

    5. In REACT folder keep the "hacker-stories" file. Which was used for Front end.

    6. Open phpMyAdmin (http://localhost/phpmyadmin/)

    7. Create a database with name "react" 

    8. Import "react.sql" file (given inside the zip package in "Database" folder).

    9. Run LARAVEL :
    
        - Open C:\ xampp \ htdocs \ LARAVEL \ sakin folder. [ Root directory ]

        - Open git bash here or your Terminal > run  "php artisan serve" [ Laravel CLI ]

        - Open a browser run localhost:8000 [ Not mandatory ]

    10. Run REACT :

         - Open C:\ xampp \ htdocs \ REACT \ hacker-stories folder. [ Root directory ]

         - Open git bash here or your Terminal > run  "npm start" [ REACT CLI ]

         - Open a browser run localhost:4200 [ Mandatory ]

     11. Admin Credential

          Username: admin
          Password: admin


## Features

- Information about Visiting places, Hotels, Packages, Flights etc.
- Package booking
- JWT authentication
- Search booking by date 
- Booking payment entries
- Services
- Hotel booking / Chek-in information 
- Hotel services, rooms, floors entries
- Hotel services payment 
- Hotel Check-out with printed bill
