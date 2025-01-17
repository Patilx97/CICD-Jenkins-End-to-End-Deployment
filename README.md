# PHP Web Application Deployment with Docker, Jenkins, and Amazon ECR

## Overview

This repository demonstrates the process of deploying a PHP web application with MySql integration, Dockerizing the application, and setting up a CI/CD pipeline using Jenkins. It includes steps to:

1. Set up an EC2 instance  
2. Set up RDS database  
3. Set up ECR  
4. Set Up CI/CD Pipeline with Jenkins

## 1. Set Up EC2 instances

## Launch two EC2 instances using Ubuntu  
   
1. Build instance
   - Install Jenkins, Docker, and AWS CLI.
   - Configure AWS CLI.
     
2. Deployment instance
   - Install Docker and AWS CLI.
   - Configure AWS CLI.
   
## 2. Create RDS Instance

1. Launch a new RDS instance with MySQL.
2. Note the RDS endpoint, username, and password.
3. Configure `submit.php` file according to RDS.

```
$servername = "database-1.xxxx.us-east-1.rds.amazonaws.com"; // RDS Endpoint
$username = "admin"; // RDS username
$password = "Pass"; // RDS Password
$dbname = "mydb"; // RDS Database name
```

## 3. Setup ECR

1. Create an Amazon ECR repository
2. Note the repository URI

## 4. Set Up CI/CD Pipeline with Jenkins

### Configure Jenkins

1. Initial setup:
  - Launch the build instance and on the first Jenkins startup, select the default plugins. 

2. Install plugins:
  - Go to Manage Jenkins > Manage plugins > Available tab
  - install the following plugins:
    - Docker
    - SSH

3. Configure credentials:
  - Go to Manage Jenkins > Manage Credentials > Global > Add Credentials
    - Add AWS credentials
    - SSH key pair.

4. Create a new pipeline:

  - Go to Jenkins dashboard and click New Item > Pipeline > OK.
  - Configure pipeline:
    - Build triggers:
      - Check "GitHub hook trigger for GITScm polling"
    - Pipeline:
      - In the Pipeline section, choose Pipeline script and paste the Groovy script from your `script` file. 
      - Adjust the Groovy script:
        - Replace the GitHub repository URL in the checkout stage
        - Replace the ECR URI in the push & deploy stage
        - Replace the private IP address of your deployment instance in the deploy stage

5. Configure GitHub Webhook:

Go to GitHub > Repository settings > Webhooks:
Payload URL: http://jenkins_server_public_ip:8080/github-webhook/
Content type: application/json

## Stages of the pipeline:

**Checkout:** Cloning the code from a Git repository.  
**Build Docker Image:** Building a Docker image of the PHP application.  
**Push docker image to ECR:** Push the image to Amazon ECR.  
**Deploy to EC2:** Deploying the Docker container to an EC2 instance.

Now, the pipeline will automatically trigger whenever changes are made in the GitHub repository.
