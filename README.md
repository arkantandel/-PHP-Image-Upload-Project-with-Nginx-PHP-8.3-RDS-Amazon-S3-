A fully cloud‑powered image upload pipeline using AWS EC2, Nginx, PHP 8.3, MySQL RDS, and Amazon S3. This project demonstrates how real production systems handle image storage, database records, IAM‑based access, and secure backend processing.
🚀 High‑Level Architecture
User → EC2 Instance (Nginx + PHP 8.3)
│
├──> MySQL RDS (Stores File Metadata)
│
└──> Amazon S3 Bucket (Stores Uploaded Images)

🧰 Technologies Used

AWS Services: EC2, S3, RDS (MySQL), IAM, VPC

PHP 8.3 with Extensions

Nginx Web Server

MySQL (AWS RDS)

Ubuntu Linux

Composer + AWS SDK for PHP

HTML5 & Form Data Upload

📌 Project Features
✔ Secure Image Upload (S3)

Uploads images directly to an Amazon S3 bucket via PHP SDK.

✔ Metadata Storage in MySQL RDS

Every upload stores file name, path, and timestamp into RDS.

✔ Lightweight, Fast & Scalable

Built on Nginx + PHP-FPM, ideal for production environments.

✔ AWS IAM Role Integration

Provides secure access to S3 without exposing secrets.

✔ Clean, Modular Code Structure

Easy to modify, extend, or integrate with CI/CD.

🛠 Prerequisites

Before deploying this project, ensure you have:

🟢 AWS Account

🟢 EC2 Ubuntu Instance (PHP 8.3 + Nginx installed)

🟢 IAM Role with S3 Full Access (attached to EC2)

🟢 MySQL RDS Database

🟢 S3 Bucket (public or private)

🟢 Composer Installed

📂 Project Structure

/project-root
│
├── form.html # Frontend UI for file upload
├── upload.php # Backend PHP file for upload logic
├── README.md # Project documentation
└── Images/ # Uploaded images or assets

🔵 STEP 1 — Create AWS Resources
1. Create an S3 Bucket

Example name:
my-upload-bucket-arkan
Keep defaults → Bucket created.

2. Create RDS (MySQL)

Engine: MySQL

Instance class: db.t3.micro

Note these details:

HOST

DB NAME

USERNAME

PASSWORD

You need them in PHP later.

3. Create EC2 Ubuntu Instance

AMI: Ubuntu 22.04

Type: t2.micro

Security Group:

SSH → 22

HTTP → 80

Key pair: Download it

4. Attach IAM Role to EC2

Create a role → EC2 use case → attach the following S3 permissions:
"AmazonS3FullAccess"

Attach role to EC2 instance.

This means:
EC2 will upload to S3 without access keys.
(More secure + professional)

🔵 STEP 2 — Connect to EC2 and Install Requirements

SSH into EC2:
 ssh -i key.pem ubuntu@YOUR_EC2_PUBLIC_IP
 Update system:
 sudo apt update && sudo apt upgrade -y

*Install Nginx:
sudo apt install nginx -y

*Install PHP 8.3 + required extensions:
sudo apt install php8.3 php8.3-fpm php8.3-mysql php8.3-curl php8.3-mbstring php8.3-xml -y

Install Composer:
sudo apt install composer -y

sudo mkdir -p /var/www/html/upload-project
sudo chown -R ubuntu:www-data /var/www/html/upload-project

🔵 STEP 3 — Install AWS SDK (Needed for S3 Upload)
Go to the project folder:

cd /var/www/html/upload-project

Install SDK:
composer require aws/aws-sdk-php

🔵 STEP 4 — Create MySQL Table inside RDS

Open MySQL client (from your local computer or EC2):
 "mentioned"

 🔵 STEP 5 — Create the Upload Form (form.html)

 nano /var/www/html/upload-project/form.html

"mentione in home"

🔵 STEP 6 — Create upload.php (Main Logic)

Create file: nano /var/www/html/upload-project/upload.php
Paste this simple and beginner-friendly PHP code:
 "mentioned in home"

💡 This script:
✔ Uploads file to S3
✔ Saves metadata to RDS
✔ Shows public S3 URL

🔵 STEP 7 — Configure Nginx for PH
sudo nano /etc/nginx/sites-available/default
  "And add the port 80 "

  Restart Nginx: sudo systemctl restart nginx

🔵 STEP 8 — Test the Application

Open browser:

http://YOUR_EC2_PUBLIC_IP/form.html


Try uploading an image.

If everything is correct, it will:

✔ Upload to S3
✔ Store in MySQL (RDS)
✔ Show success message + S3 image URL

🎉 Your Project Is Now Fully Working!

You now have a real cloud-based image upload system used by companies in production.
  


🧠 upload.php (Backend Logic)

Handles:

File validation

Uploading to S3 via AWS PHP SDK

Storing metadata to RDS using MySQLi / PDO

Error handling & output messages

🔐 Security Implementations

IAM Role-based Access → No hardcoded AWS keys

File type validation (JPG, PNG, GIF recommended)

Safe handling of upload paths

Nginx rules for secure uploads

💡 Why This Project Is Useful?

Helps beginners understand real-world cloud integrations

Perfect for deploying as a mini portfolio project

Demonstrates backend + cloud architecture skills

Recruiters love this kind of practical AWS project

📘 Future Enhancements

Add CloudFront CDN support

Auto-image optimization using Lambda

Add login/authentication

Add frontend preview and gallery

👨‍💻 Author & Links

Arkan Tandel
🔗 LinkedIn: https://linkedin.com/arkantandel
