<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Movie Library API

Movie Library API is a RESTful API built using Laravel for managing a movie library. The API supports basic CRUD operations (Create, Read, Update, Delete) for movies, and includes advanced features like pagination, filtering, and sorting. The API also implements user authentication and authorization using JWT (JSON Web Tokens) to secure various routes.

### Purpose of the Project

The main goal of this project is to provide a robust backend for managing a library of movies. This includes functionalities for admins to manage movies, and for users to view, rate, and interact with these movies. The project is built to be scalable, secure, and easy to integrate with any frontend or mobile application.

## Features

- **User Registration & Login:** Users can register and log in to the system using JWT authentication.
- **Admin Management:** Admins can create, update, and delete movies, with an admin user created via a seeder.
- **Movie Management:** Admins have full control over movie management within the library.
- **Rating Management:** Users can rate movies and view movie ratings.
- **Advanced Filtering & Sorting:** Movies can be filtered by genre or director and sorted by release year.
- **Pagination:** Movies are paginated for efficient data retrieval.
- **Middleware:** Middleware is used to protect routes, ensuring only authenticated users or specific roles (e.g., admin) can access certain endpoints.
- **Policies and Services:** Laravel policies and services manage business logic and access control.

## Project Structure

This project follows the standard Laravel structure, which includes several important components:

- **Models:** Represent the data structure in the database.
  - `User`: Represents a user of the system.
  - `Movie`: Represents a movie in the library.
  - `Rating`: Represents a user's rating of a movie.

- **Controllers:** Handle the HTTP requests and link them to the business logic.
  - `AuthController`: Manages user authentication, including registration, login, and logout.
  - `MovieController`: Manages CRUD operations and other functionalities related to movies.
  - `RatingController`: Manages the creation, updating, and retrieval of movie ratings.

- **Middleware:** Provides a layer of control to ensure that only authenticated users or users with specific roles (like admin) can access certain routes.
  - `auth:api`: Ensures users are authenticated.
  - `admin`: Ensures that only admin users can perform certain actions.

- **Policies:** Define the authorization rules, determining who can perform what actions on certain resources.
  
- **Services:** Handle the business logic, separating it from the controllers for cleaner code and better maintainability.

## Setup and Installation

This section provides a detailed guide on how to set up the project locally.

### 1. Prerequisites

Before you begin, make sure you have the following installed:

- **PHP 7.4 or higher**
- **Composer** (dependency manager for PHP)
- **Node.js and npm** (for managing JavaScript dependencies)
- **MySQL** (or another supported database system)

### 2. Clone the Repository

Start by cloning the repository to your local machine:

```bash
git clone https://github.com/your-repo/movie-library-api.git
cd movie-library-api

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
