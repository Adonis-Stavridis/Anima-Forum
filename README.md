# Anima-Forum, a Forum about animals

----

This is a forum built using **PHP**, **HTML5**, **CSS3** and **SQL**.

The purpose of the project was to learn how to handle front and back ends of website, using PHP and SQL, and the least JavaScript possible.

----

### Overview

Here is a quick overview of the main pages of the website.

> **Log in Page**: this is the first page to appear where you can log into your account, redirect to the Sign up Page, or access the website as a Visitor.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/login.png "Log in Page")

>**Sign up Page**: here you can create an account and look up the terms and conditions page.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/signup.png "Sign up Page")

>**Home Page**: this the main page of the forum, you can access your profile page as well as the different categories and topics.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/home.png "Home Page")

>**Profile Page**: this page lists all information about your account, you can also modify that information. Admins can also see information and change permissions of all accounts on the website.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/profile.png "Profile Page")

>**Topic Page**: after accessing a category and then a topic, you will access this page where you will be able to rate the topic, write comments, upvote or downvote comments and delete your own comments.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/topic.png "Topic Page")

>**Topic settings page**: this page is accessed by clicking on "Modify Topics" and is used to add, modify or delete topics. A same pages exists for the categories as well.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/settings.png "Topic settings Page")

>**Information Page**: this a page with information regarding the website.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/info.png "Information Page")

>**Contact Page**: this is a contact form, that would send me (the creator of the forum) an email.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/contact.png "Contact Page")

>**Terms and Conditions Page**: this is a simple page listing some information on how a user should be behave when using this forum.<br><br>
![Where did the image go?](https://raw.githubusercontent.com/Adonis-Stavridis/Anima-Forum/master/imgs/terms.png "Terms and Conditions Page")

### Setting up

This forum was not deployed as a website.
If you wish to set up this project on your machine, you have to follow these instructions:

1. First you need to create a new database on mysql. Then go to the directory **/BDD/INITS** and make sure you have **init_all.sql**. You can now open a terminal and log into mysql, choose your database and finally type the following commanding in order to fill your database with all necessary tables and procedures:


    source <path to project directory>/BDD/INITS/init_all.sql;

2. Go to the directory **/WEB/model** and create a PHP file called **global.php** and fill it with the correct information where it is written "enter your ... here":


    <?php
    define('SQL_DSN', 'mysql:host=localhost;dbname=enter your database name here');
    define('SQL_USERNAME',  'enter your mysql username here');
    define('SQL_PASSWORD',  'enter your mysql password here');
    ?>

3. You can then copy the project to a server or set it up on your local machine. You are free to do however you wish in order to set it up on a server and make it work on your web browser.

4. You will now be able to access the website by going to a custom URL you have set up for the project or typing **WEB/view/index.php** in your web browser.
