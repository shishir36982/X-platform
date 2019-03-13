# X-Platform
## Overview
This project aims at providing a platform to user where they can discuss about the numerous topics they wish to discuss about.They can create their own communities of a certain topic and people can join this community and also, can create sub communities in it if they are interested in it.Users writing threads,comments are ﬁltered through our abusive ﬁlters .Our system provide user that in what language the thread or comment is written. Our system also provides dynamic search which helps to ﬁnd communities and other users more easily. Top threads are recommended to user.
Therecommendationarebasedonuserpastactivitywhichhelpoursystemtotrainandsuggest threads to users according to interest of user.Users can able to see number of people joined in their community and can compare it with the predicted value of user joined by our system. SOS community is provided by default by our site in which people can discuss about details of any Disaster or problem in their area.In this SOS community there is sos button,when user press the Button it send the location and details of user to all the people present in SOS community. Live chat system is provided to users in communities where they can chat with people which are currently online Proﬁle of user contain its basic details and rating based on the his contribution on site.From this rating top users are dispalyed in our site.

# screenshots
![Basic feed for user according to his/her tastes](https://github.com/shishir36982/X-platform/blob/master/imgi/report%20screenshots/feed1.PNG)

![Optional Text](../X-platform/screen/)

![Optional Text](../X-platform/screen/)

![Optional Text](../X-platform/screen/)





# Implementation

## Signup/login
Basically we are fetching user basic information with email id and password for this site. It is then store in database so that we can validate the user when they try to login to site.It help us to recognize user uniquely.
## Mainpage(Homepage)
After successfully login the user is redirected to main page from where they can access other modules.Homepageconsistoftopthreads.Trendingcommunitiesandthreadsaredisplayed.Other modules like adding or searching communities can be access through main page.
## DynamicSearch
When user enter a text to search the results start displaying to user without loading the whole page through ajax queries.It check database without loading the page.
## Addcommunities/subcommunities
User can add community ehich is displayed in page and updated in database.Sub community can also be added by different users.It checks the community in which subcommunity is created and update it in the databse.
User has to ﬁll name of a community.They can also make community anonymously if they do not want to give their information.Users can join or join any communities.In communities our system predict number of user joined using linear agression according to number of repplies in communities.
## Chat
Every community and subcommunity contains chat box in which users can send message live using jquery and ajax.
## SOS
Insoscommunitythereisbuttonforsoswhichiswhenusedsendlocationandpersonaldetails to other user in community.Geocoder ﬁnd the location of user and send it via mail to everyone.
## Addthread
Inside communities user can add their opinions and views using threads.They can also follow or unfollow it.The views are updated in database using community id and thread id so we can display it in the community in which it is created.
## Recommendationsystem
We are using naive bayes algorithm in thread to follow and thread to follow today recommendation.It is using user id and threads which are user following are parameters and also checking tags of user and threads.And on the basis of which it generate a similiar threads of interest of user.In the trending communities we are using svm algorithm taking number of people joined and reply in the community as a parameter to classify top communities.
## Proﬁle
Inproﬁlepageuserbasicdetailsandimageisdisplayed.Thereisaratingsystembasedonuser contributioninoursite.Basedonthisratingtopusersaredisplayedinoursite. Expectedratingis predict using SVR algorithm taking parameters of replies and creation of communities of other users.

# libraries used
Jcrowe.Bad word ﬁlter. https://github.com/jcrowe206/BadWordFilter

PHP Text Language Detection Library: Detect the language of a given text string. https://www.phpclasses.org/package/10090-PHP-Detect-the-language-of-a-given-text-string.html

Samuel Adeshina.PHP Sentiment Analyzer: Determine the type of sentiments in a given text. https://www.phpclasses.org/package/9271-PHP-Determine-the-type-of-sentiments-in-a-given-text.html

Arkadiusz Kondas.PHP-ML - Machine Learning library for PHP. https://php-ml.readthedocs.io/en/v0.1.0/


## Setup
1. Install xampp/wamp mamp

2. create a project 

3. clone the repository

4 install composer and  libraries  https://fastandeasydevelop.wordpress.com/2017/09/06/how-to-install-composer-on-windows/

5. run locally
