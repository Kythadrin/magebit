# **Magebit test task**

## Content:
  1. About project
  2. What was used in the project
  3. How to launch project?

## About project
  This project is a test task for Magebit and consists of two pages.
  1. The first page is a subscription form. the user enters his email and agrees to the terms, after which a notification about a successful subscription is displayed and the entered email is saved to the database along with the date of the subscription.
  2. The second page is administrator page. He includes viewing all subscribers with the ability to search by email, sort by date and email, and filter by mail domain. It is also possible to delete a record from the table and export the table to CSV.

## What was used in the project
  - Visual Studio Code v1.63.1
  - OpenServer v5.4.0
  - PHP v7.4
  - Vue .js v2.x
  - Apache v2.4
  - MySQL v8.0
  - PhpMyAdmin v5.1.0
  - SCSS v3.5.5
 
## How to launch project?
  1. Clone this repository or download them.
  2. Put project in server folder. I'm use OpenServer and this path to folder where need put project: *"C:\openserver\domains\"*. You can use some other server.
  3. Change project config. In *[database config](https://github.com/Kythadrin/magebit/blob/1112421e99fd482a8178ec2637946e9b66508fcc/conf/Config.php#L10)* set database connection information(*set hostname, username, password and database name*).
  4. Start server or restart.
  5. Open browser and write in the address bar data to connect. For OpenServer it is folder name of project, for others it is usually: *localhost*. 
     - For enter on main page needed write in the address bar domain name. For example: *magebit/* or *localhost*. 
     - For adminsitrator page needed enter domain-name/admin. For example: *magebit/admin* or *localhost/admin*.



> Author: Vadim Sirits
