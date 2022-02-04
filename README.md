<h2> Presentation </h2>
It's symfony website-skeleton project with some additional library (webpack, fixtures) and tools to validate code standards.

<h2> Concept </h2>
  The site is a site intended for knitters or those wishing to become knitters.
  The project is evolving, new features will be developed over time.
  The goal is to be able to post and download knitting patterns.
  These are sorted by categories (categories that can be added if necessary).

<h2> Prerequisites </h2>
  - Check composer is installed
  - Check yarn & node are installed
  - Install
  - Clone this project
  - Run composer install
  - Run yarn install
  - Run yarn encore dev to build assets
  - Create a file .env.local
  - Run migrations files with bin/console d:m:m
  - Run symfony server:start to launch your local php web server
  - Run yarn run dev --watch to launch your local server for assets


<h4> Deployment </h4>
Some files are used to manage automatic deployments (using tools as Caprover, Docker and Github Action). Please do not modify them.

captain-definition Caprover entry point
Dockerfile Web app configuration for Docker container
docker-compose.yml ...not use it's used sweat_smile
docker-entry.sh shell instruction to execute when docker image is built
nginx.conf Nginx server configuration
php.ini Php configuration
Built With
Symfony
