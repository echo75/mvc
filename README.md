# MVC in PHP

An application written in PHP using the MVC model.

## Accessing the app online

A hosted production version is available at https://hedman.de/

## Setting up locally for development

> **Note:**
> You could run the app with Docker, if you configure one container for Apache or nginx with PHP, one for MySQL and one for PHPMyAdmin. You have to have Docker and Docker Compose installed locally. If not, refer to the [Docker documentation](https://docs.docker.com/compose/install/) for installation instructions.

Create a `.env` file in the root directory with contents similar to the `.env.example` files.

> **Note**: If you clone the repo and run it on xampp or MAMP locally, make sure the root-directory is the `public` folder, if you want the app to run properly.

Run the `testproject.sql` on your database, if you want to have some test data to run the app. It creates the database `testproject` with the table `users` on your local MySQL-Server.

The app will be available most likley at http://localhost:8888

## MIT License

Project: Copyright (c) 2023 Johan Hedman

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
