# Name Registration with MySQL Database Integration
This project demonstrates how to set up a Name Registration Form on a website hosted on an AWS EC2 instance, connecting to a MySQL database named my_database. The form allows users to submit their name, which are stored in the MySQL database for easy management.

## Project Overview
In this project, we will:

  - Set up an EC2 instance with Apache, PHP, and MySQL.
  - Create a MySQL database and table to store name submissions.
  - Use a simple **HTML form** (index.html) to collect user name.
  - Process the form submissions using **PHP** (submit.php) and insert data into the MySQL database.

## Prerequisites
Before you begin, make sure you have the following:

  - An AWS EC2 instance running Ubuntu.
  - SSH access to the EC2 instance.
  - Apache, PHP, and MySQL installed on your EC2 instance.

## Part 1: Set Up the Web Server and Required Software on EC2
### 1. Connect to Your EC2 Instance
Use SSH to connect to your EC2 instance:

```bash

ssh -i /path/to/your-key.pem ubuntu@your-ec2-public-ip
```
### 2. Update System and Install Apache, PHP, and MySQL
Run the following commands to update the system and install Apache, PHP, and MySQL:

```bash

sudo apt update && sudo apt upgrade -y
sudo apt install apache2 php libapache2-mod-php mysql-server -y
sudo apt install php-mysql -y

```
### 3. Start Apache and MySQL Services
Start Apache and MySQL services:

```bash

sudo systemctl start apache2
sudo systemctl enable apache2
sudo systemctl start mysql
sudo systemctl enable mysql
```

## Part 2: Set Up the Database and User in MySQL
### 1. Log in to MySQL
Log into MySQL as the root user:

```bash
sudo mysql -u root
```

### 2. Set the Root Password (if not already set)
If the root password is not set, create one:

```sql

ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'chirag';
FLUSH PRIVILEGES;
EXIT;
```

### 3. Create the Database 
Run the following commands to create the database:

```sql

CREATE DATABASE my_database;

```

### 4. Create the Table for Form Submissions
After logging into MySQL again, create a table for storing form submissions:

```bash

sudo mysql -u root -p
```
Inside the MySQL prompt:
chirag

```sql

USE my_database;

CREATE TABLE cute_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
```


## Part 3: Upload HTML and PHP Files
The required files index.html and submit.php have already been included in this repository.

### 1. Navigate to the Web Root Directory
```bash

cd /var/www/html
```

### 2. Upload the HTML and PHP Files
Upload the index.html and submit.php files to the /var/www/html directory. Ensure that the files are placed correctly.

## Part 4: Testing the Contact Form
### 1. Access the Form
Open a web browser and navigate to the public IP of your EC2 instance:

```http

http://your-ec2-public-ip/
```

You should see the Contact Us form where users can enter their name, email, and message.

### 2. Submit your name
Fill your name and submit it. The data will be sent to the submit.php script, which will insert it into the MySQL database.

## Part 5: Accessing Form Data in the Database
You can verify the form submission data by accessing the MySQL database:

### 1. Log into MySQL
```bash

sudo mysql -u root -p
```
### 2. Select the Database and View the Data
Inside the MySQL prompt:

```sql

USE my_database;
SELECT * FROM cute_table;
```
This will show you the data collected from the form submissions.

## Conclusion
You have successfully created a "Name Form" , processed submissions using PHP, and stored them in a MySQL database. This setup can be expanded with additional features like email notifications or advanced validation as needed.

## Future Improvements
Form validation: Add JavaScript or PHP validation to ensure that the form data is correct before being submitted.
Email notifications: Send an email to the admin whenever a new form submission is received.
Styling: Enhance the UI of the form for a more professional look.
