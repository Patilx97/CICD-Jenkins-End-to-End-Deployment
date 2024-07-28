# PHP Web Application Deployment with Docker, Jenkins, and Amazon ECR

## Overview

This repository demonstrates the process of deploying a PHP web application with MySql integration, Dockerizing the application, and setting up a CI/CD pipeline using Jenkins. It includes steps to:

1. Set up an EC2 instance  
2. Set up RDS database  
3. Set up ECR  
4. Set Up CI/CD Pipeline with Jenkins

## 1. Set Up EC2 instances

### Create EC2 Instance

1. Launch two EC2 instances using Ubuntu  
   a. Build instance  
   b. Deployment instance
   
3. Build instance
   - Install Jenkins, Docker, and AWS CLI.
   - Configure AWS CLI.
     
3. Deployment instance
   - Install Docker and AWS CLI.
   - Configure AWS CLI.
   
## 2. Create RDS Instance

1. Launch a new RDS instance with MySQL.
2. Note the RDS endpoint, username, and password.
3. Configure `submit.php` file according to RDS.

## 3. Setup ECR

1. Create a repository
2. Note the repository URI

## 4. Set Up CI/CD Pipeline with Jenkins

### Configure Jenkins

Launch build instance and on 1st jenkins startup, select default plugins  

Configure plugins in Jenkins:
Go to Manage Jenkins > install the plugins: Docker, SSH

Configure credentials in Jenkins:
Go to Manage Jenkins > Credentials > Global > Add Credentials > Add AWS credentials and SSH key pair.

Create a new pipeline:

Go to Jenkins dashboard and click New Item > Pipeline > OK

Configure pipeline:
In build option, Select "GITscm polling" checkbox
In script section, paste the groovy script from `script` file 
Changes: Replace GitHub Repository in "checkout stage", ECR URI in push and "deploy stage", Replace private ip address of your deploy instance in "deploy stage"

Configure GitHub Webhook:

Go to GitHub > Repository settings > Webhooks:
Payload URL: http://jenkins_server_public_ip:8080/github-webhook/
Content type: application/json

## Stages of the pipeline:

**Checkout:** Cloning the code from a Git repository.  
**Build Docker Image:** Building a Docker image of the PHP application.  
**Push docker image to ECR:** Push the image to Amazon ECR.  
**Deploy to EC2:** Deploying the Docker container to an EC2 instance.

Now, the pipeline will automatically trigger whenever changes are made in the GitHub repository.
