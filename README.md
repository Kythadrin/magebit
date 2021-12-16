# **Magebit test task**

## Content:
  1. [About project](##About project)
  2. [What was used in the project](https://github.com/Kythadrin/magebit/README.md#L13)
  3. [How to start a project?](https://github.com/Kythadrin/magebit/README.md#L23)

## About project
  This project is a test task for Maghebit and consists of two pages.
  1. The first page is a subscription form. the user enters his email and agrees to the terms, after which a notification about a successful subscription is displayed and the entered email is saved to the database along with the date of the subscription.
  2. The second page includes viewing all subscribers with the ability to search by email, sort by date and email, and filter by mail domain. It is also possible to delete a record from the table and export the table to CSV.

## What was used in the project
  - Visual Studio Code v1.63.1
  - OpenServer v5.4.0
  - PHP v7.4
  - Vue .js v2.x
  - Apache v2.4
  - MySQL v8.0
  - PhpMyAdmin v5.1.0
  - SCSS v3.5.5
 
## How to start a project?
  1. Clone this repository or download them.
  2. Put project in server folder. I'm use OpenServer and this path to folder where need put project: *"C:\openserver\domains\"*. You can use some other server.
  3. Change project config. In *[database config file](https://github.com/Kythadrin/magebit/blob/79372f8631c03dc3df90832c38f85f3d8008f65f/conf/Database.php#L5)* set database connection information(*set hostname, username, password and database name*).
  4. Start server
  5. Open browser and write in the address bar data to connect. For OpenServer it is folder name of project, for others it is usually: *localhost*.
