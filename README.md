# Headless WordPress

Using WordPress purely as a backend to distribute content via a REST API allows for great flexibility with content, the ability to build your presentation layer with any number of technologies, and use a well-known and well-established system.

## Table of contents

* [Environments](#environments)
* [Prerequisites](#prerequisites)
* [Getting Started](#getting-started)
* [Development](#development)
* [WordPress REST API](#the-wordpress-rest-api)

## Environments

### Local
* Back-end: http://localhost:8000/wp-admin

> Note that the front-end of the WordPress installation has been disabled, and attempting to access it will redirect the user to the admin.


## Prerequisites

- [Docker for Mac](https://www.docker.com/products/docker-desktop)

## Getting Started



## Development


## The WordPress REST API

The WordPress theme provides a number of routes that can be used to retrieve data from the CMS. These routes are instantiated and managed in the API manager (in the `lib/Managers` class in the WordPress theme):

Locally, you should be able to access these routes in a browser on your local environment.

### Inside the theme

Endpoints in the theme are set up by extending the `Headless\Endpoints\Base` abstract class and providing at least a public `getContent()` function that returns the contents of the endpoint. The class can then be instantiated in the `Headless\API` class.

The theme also disables the default WordPress REST API endpoints for any user that is not logged in to the WordPress admin, as the Gutenberg editor requires the default REST API endpoints to function properly.

