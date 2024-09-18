# Tailor ERP System

This is a Tailor ERP system built using **CodeIgniter**, designed to manage and automate processes in a tailor shop, including order management, inventory management, and more.

## Table of Contents
1. [Requirements](#requirements)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Database Setup](#database-setup)
5. [Usage](#usage)
6. [Folder Structure](#folder-structure)
7. [Features](#features)
8. [Troubleshooting](#troubleshooting)
9. [Contributing](#contributing)
10. [License](#license)

## Requirements

Before you begin, ensure you have met the following requirements:
- **PHP**: >= 7.2
- **MySQL**: >= 5.6
- **Apache/Nginx**: Installed and running
- **Composer**: For dependency management
- **Node.js/NPM**: For front-end assets if needed

## Installation

1. Clone the repository:
   ```bash
   git https://github.com/YuriiLohvynenko/tailor-ERP.git
   cd tailor-ERP


2. Install PHP dependencies:
   ```bash
   composer install

3. Install JavaScript dependencies (if any):
   ```bash
   npm install

4. Set folder permissions:
   ```bash
   chmod -R 777 application/cache
   chmod -R 777 application/logs

## Configuration

1. **Configure the environment file:**
   Copy the .env.example file and rename it to .env:
   ```bash
   cp .env.example .env

   Open .env and set the appropriate environment variables for your database connection and app settings:

   
   APP_ENV=development
   BASE_URL=http://localhost/tailor-erp
   DB_HOST=localhost
   DB_DATABASE=erp_db
   DB_USERNAME=root
   DB_PASSWORD=yourpassword

2. **Apache/Nginx Configuration:**
   Ensure your Apache or Nginx is pointing to the public directory of the project.

   Example for Apache (in your VirtualHost):
   ```bash
   DocumentRoot "/path/to/tailor-erp/public"
   <Directory "/path/to/tailor-erp/public">
       AllowOverride All
   </Directory>

## Database Setup

1. Create a new database:
   ```bash
   CREATE DATABASE erp_db;

2. Import the database schema from the database/erp_db.sql file:
   ```bash
   mysql -u root -p erp_db < database/erp_db.sql

## Usage

1. **Start the local development server (or configure with Apache/Nginx):**
   ```bash
   php spark serve

Visit the application at http://localhost:8080.

2. **Default Admin Credentials:**
- **Username:** admin
- **Password:** admin123

## Folder Structure
   
   /application
       /controllers
       /models
       /views
   /public
       /assets
       /css
       /js
   /database
       erp_db.sql
   .env.example
   composer.json
   package.json
   README.md

   - application/ - Contains the core CodeIgniter framework files and custom logic.
   - public/ - Public assets and index file.
   - database/ - Contains the initial SQL schema.

## Features
   - Order Management
   - Inventory Management
   - Customer Management
   - Tailor Assignment
   - Reporting & Analytics

## Troubleshooting
### Common Issues:

   1. 500 Internal Server Error:

   - Check file permissions for /application/cache and /application/logs.
   - Ensure Apache/Nginx points to the public/ directory.
   2. Database Connection Error:

   - Double-check your .env file for correct database credentials.
   3. Missing Dependencies:

   - Run composer install and npm install to ensure all packages are installed.

## Contributing
If you would like to contribute to this project, please fork the repository and submit a pull request. Contributions are welcome!

## License
This project is licensed under the MIT License.

**Thank you for using the Tailor ERP System platform! If you like this project, please give it a ⭐ on GitHub.**