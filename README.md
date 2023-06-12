# Donasien App - Cloud Computing

## Bangkit Capstone Project 2023
Bangkit Capstone Team ID : C23-PS011 <br>
Here is our repository for Bangkit 2023 Capstone project - Cloud Computing

## Cloud Development Schedule
|     Week 1     |       Week 2        |            Week 3          |           Week 4          |
| :------------: | :-----------------: | :------------------------: |:------------------------: |
| Architecture design   | API development      | Web Admin Frontend development  | Application deployment  |

## Cloud Architecture
![CloudArchitecture](https://github.com/Donasien/backend/blob/assets/img/Architecture_GCP.png)

## Backend Description
The backend donasien app is built using Laravel framework. It includes an API route that is specifically designed to be used by the Android application. The API is developed using MySQL as the underlying database. In our database, we store various data used by the application. We have a "users" table that stores user data fetched from Firebase Authentication. The "donations" table contains data submitted by users for their donations. The "donors" table stores information about the donors, and the "first_aids" table is used by the admin to input data regarding first aid for minor injuries, which can be scanned later.
<br>
<br>
Additionally, Laravel provides a landing page and a web admin interface. The web admin can view, edit, and delete various data stored in the database. For example, they can edit donation data to mark a fundraising campaign as accepted. We deploy this Laravel application on a Compute Engine, utilizing a Persistent Disk for storage, and MySQL in a VM as the database. The database in the VM is also connected to Flask from the machine learning path, making the Flask API private. Therefore, anyone who wants to access the Flask API must have a token that will be validated in the database. Lastly, we deploy Flask on Cloud Run, which allows the application to be hosted and run in a scalable manner

## API URL
[Donasien Web & API URL](https://donasien.me/)

<br>

[Machine Learning API](https://ml-api-rt4pbfoggq-et.a.run.app/)

<!-- [News API](https://newsapi.org/v2/) -->

## <a name="api"></a>Donasien Documentation API
### Endpoint Documentation
[Donasien Endpoint Documentation](https://donasien.getpostman.com/)

<!-- ### Article API
[Article API Documentation](https://newsapi.org/docs/endpoints/everything)
<br>
|  Endpoint |  Method	     |      Query Params |           Description          |
| :----: | :------------: | :-----------------: | :------------------------: |
| /v2/everything | GET   | q, sortBy and apiKey      | HTTP GET REQUEST Show all of the Article about Health  |

We opt for this API due to its ease of implementation and cost-effectiveness, as it doesn't impose additional system load or incur any extra expenses on the Google Cloud Platform -->

### Security
We implement API protection using Firebase tokens to restrict access to authorized users only. These tokens provide secure authentication, ensuring that only valid and authenticated users can utilize the API

## How To Run This Code
* To utilize this code, it is required to have PHP ^8.0.2 installed, and you need to set up a local database using XAMPP or any other MySQL database
* After making the database then download this repository
* Open the folder in VSCode
* Copy the .env.example file and rename it to .env
* Next open the .env file and edit the DB_DATABASE and other relevant fields with the name of your local database and other necessary configurations. Additionally, set FILESYSTEM_DISK to "public" to allow public access to donation photos
* Next open VSCode terminal
* Type ```composer install``` or ```composer update``` and hit enter
* Next type ```php artisan key:generate``` and hit enter
* Next type ```php artisan storage:link``` and hit enter
* Next type ```php artisan migrate:fresh --seed``` and hit enter
* Then type ```php artisan serve``` to start the server
* It will run on http://localhost:8000/
![Run](https://github.com/Donasien/backend/blob/assets/img/Run.png)

## How to use the endpoint
* To use this endpoint, need to use a special token that our team provided
* After getting the token then Open a Postman Application and fill the token in param
* Enter URL request bar with https://donasien.me/api/profile
* Select method GET then Send the request
* If success then postman will return your profile
![Endpoint](https://github.com/Donasien/backend/blob/assets/img/Endpoint.png)
* For complete Documentation please visit [Donasien Documentation API](#api)