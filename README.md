# PHP Web Application Deployment with Docker and Jenkins

## Overview

This repository demonstrates the process of deploying a PHP web application with MySQL(RDS) integration, Dockerizing the application, and setting up a CI/CD pipeline using Jenkins. It includes steps to:

1. Set up an EC2 instance and RDS database.
2. Set Up CI/CD Pipeline with Jenkins
3. Deploy the application to an EC2 instance.

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



## 2. Set Up CI/CD Pipeline with Jenkins

### Configure Jenkins

Install Jenkins and necessary plugins:

Go to Jenkins dashboard and install the following plugins: Docker, SSH

Configure credentials in Jenkins:

Go to Manage Jenkins > Credentials > Global > Add Credentials.
Add AWS credentials and SSH key pair.

Create a new pipeline:

Go to Jenkins dashboard and click New Item > Pipeline > OK

Configure pipeline:
In build option, Select "GITscm polling" checkbox
In script section, paste the groovy script in shared in this repository

Configure GitHub Webhook:

Go to GitHub > Repository settings > Webhooks:
Payload URL: http://jenkins_server_public_ip:8080/github-webhook/
Content type: application/json
