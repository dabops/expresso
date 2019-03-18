[![CircleCI](https://circleci.com/gh/dabops/expresso.svg?style=svg)](https://circleci.com/gh/dabops/expresso)

# Expresso

> Your best admin of gamers that allow you to take coffes

## How to Play with it

### As application

``` bash
# install dependencies
$ composer install

# serve at localhost:8000
$ php -S localhost:8000 -t public
```

### As Docker

``` bash
# Build the Docker image
$ docker build -t dabops/expresso .

# Let's run the image in a container
docker run -it -p 8080:80 --rm --name expresso dabops/expresso
