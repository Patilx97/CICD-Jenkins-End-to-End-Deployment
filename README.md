# PHP Web Application Deployment with Docker and Jenkins

## Overview

This repository demonstrates the process of deploying a PHP web application with MySQL integration, Dockerizing the application, and setting up a CI/CD pipeline using Jenkins. It includes steps to:

1. Set up an EC2 instance and RDS database.
2. Dockerize the PHP application.
3. Configure Jenkins for CI/CD.
4. Deploy the application to an EC2 instance.

## Prerequisites

Before you begin, ensure you have:

- An AWS account
- Jenkins installed on a build server
- Docker installed on both the build and deployment servers
- AWS CLI configured on the build server

## 1. Set Up EC2 and RDS

### Create EC2 Instance

1. Launch an EC2 instance using Ubuntu.
2. SSH into the instance.

### Create RDS Instance

1. Launch a new RDS instance with MySQL.
2. Note the RDS endpoint, username, and password.

### Configure EC2

1. Install the LAMP stack:

    ```bash
    sudo apt-get update
    sudo apt-get install apache2 php libapache2-mod-php php-mysql mysql-client -y
    ```

2. Clone the repository:

    ```bash
    git clone https://github.com/stark303test/bct-task1.git
    ```

3. Move files to `/var/www/html`:

    ```bash
    sudo mv bct-task1/index.php bct-task1/submit.php /var/www/html/
    ```

4. Ensure `submit.php` contains the correct RDS configuration:

    ```php
    $servername = "database-1.xx.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "Bitcot1122";
    $dbname = "mydb";
    ```

5. Test the PHP application:

    - Access the instance’s public IP in a browser.
    - Submit a value in the "Name" field.
    - Verify data is stored in the RDS database using:

    ```bash
    mysql -h RDS_ENDPOINT -P 3306 -u admin -p
    ```

## 2. Dockerize the PHP Application

### Dockerfile

Ensure the `Dockerfile` in your repository contains:

```Dockerfile
FROM php:7.4-apache
RUN docker-php-ext-install mysqli
COPY . /var/www/html/
EXPOSE 80
