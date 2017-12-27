## Greetings, and welcome.
There are several features added to this project that might be found useful...

 - Database migrations have been provided and can be ran via `php artisan migrate` from the project root directory.
 - There is an "admin" page to view the contact submissions. Simply go to the `/login` page of the application and click `Admin login`

To run phpunit please type `./vendor/bin/phpunit` in the project root directory.

If you wish to send mail, please use mailtrap, as other forms of mail sending will likely throw an exception. I wanted to put a try/catch around the send email part of the controller, but I didn't want to clutter my code base.

To see a live demo go to [dealer.shft.online](https://dealer.shft.online/). It is running the most recent codebase.