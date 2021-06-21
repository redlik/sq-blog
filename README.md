<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## SQ Blog

SQ Blog is a demo application based on Laravel framework. 

### Installation

To install SQ Blog on a local machine follow these steps:

- Clone the git repository using `git clone https://github.com/redlik/sq-blog.git` inside the folder the application 
  will run from
- Run `composer install` command to install all necessary PHP packages
- Run `npm install && npm run dev` to install and compile all Javascript modules and Tailwind CSS style sheet
- For production environment use `npm run prod` to compile modules and stylesheet optimised

### Initialisation
To initialise the app, make sure the local machine has mySQL server running, and follow these steps:
- duplicate `.env.example` file and rename it to `.env`
- run `php artisan key:generate` to create new security key
- setup database credentials inside `.env` file
- run `php artisan migrate` to setup database's table and columns
- use `php artisan serve` to start web server and view the homepage of the app in the browser

###App features
The app provides the following functionality:
- User authentication. User can register and login to the app to create posts
- User have a dashboard panel where they can see all their posts created so far
- Users can create new posts using dedicated page
- Homepage of the app shows all posts, ordered by the date of publication

###External feed
- The application reads data from external API point and saves the posts in the database under username `admin`
- To initalise the feed go to `/initialise` URL which will do the following:
    - Create a new user called `admin`, if it doesn't exist yet
    - Pull data from external API point and save it under `admin` user
- For automatic feeding, the admin of the application can run `php artisan schedule:work` which will pull data from 
  the API every hour, same as the `/initialise` procedure    

###External feed
