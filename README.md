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
- AWS CLI configured on the build & Deployment server

## 1. Set Up EC2 and RDS

### Create EC2 Instance

1. Launch an EC2 instance using Ubuntu.
2. SSH into the instance.

### Create RDS Instance

1. Launch a new RDS instance with MySQL.
2. Note the RDS endpoint, username, and password.


## 2. Dockerize the PHP Application

### Dockerfile

Ensure the `Dockerfile` in your repository contains:

```Dockerfile
FROM php:7.4-apache
RUN docker-php-ext-install mysqli
COPY . /var/www/html/
EXPOSE 80
