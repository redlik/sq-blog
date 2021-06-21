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

### App features

The app provides the following functionality:
- User authentication. User can register and login to the app to create posts
- User have a dashboard panel where they can see all their posts created so far
- Users can create new posts using dedicated page
- Homepage of the app shows all posts, ordered by the date of publication

### External feed

- The application reads data from external API point and saves the posts in the database under username `admin`
- To initalise the feed go to `/initialise` URL which will do the following:
    - Create a new user called `admin`, if it doesn't exist yet
    - Pull data from external API point and save it under `admin` user
- For automatic feeding, the admin of the application can run `php artisan schedule:work` which will pull data from 
  the API every hour, same as the `/initialise` procedure    
- The feed process is sent to queue to make sure the app doesn't freeze while reading the API
- Local version uses DB queue driver, for production I would recommend separate Redis server to be used  
- For production environment I would recommend creating a cron job on the server that runs the command every hour

### Security

- The app uses Laravel Breeze package for user registration and authentication
- Parts of the app only accessible to authenticated users are blocked from guest visitors using `middleware`
- User accessed url were tested in unit test

### Optimisation

- The app uses eager loading to limit the number of database calls
- Should the application grow in popularity I recommend hosting on dedicated virtual server (DigitalOcean, Linode, 
  AWS) with Laravel Forge as an easy deployment tool
- All static files should be hosted from dedicated Amazon S3 container
- For extra capacity I would recommend using dedicated CDN solution, such as Cloudflare

### Testing

The application was tested both manually, in the browser and using PHPUnit testing:

- I've tested user registration and login
- Logged in user was able to create new posts
- New Post form has validation enabled to make sure the data is present and in correct format
- External feed is pulling data, which is saved in DB and shows on the main feed

#### Unit Testing

- Homepage is accessible with status 200
- Dashboard is not accessible to guest user, status 302
- Sample post is saved to test DB and visible on the home feed

#### External feed validation

- The command that reads the data from external API is placed inside `try catch` block to make sure the app doesn't 
  crash if the feed fails
- In case of the failure the error message is display above the feed
- After each connection the function will generate a success message to be shown in the same spot
- For production environment the messages should be sent to Laravel log or via Notification to dedicated admin
