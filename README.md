# Restuarant POS 

I am Deepak, a graduate student from University of Colorado Boulder pursuing Master's in Computer Science. I developed a web application to help Servers in the restuarant manage checks. This application uses Avero POS API to communicate with server and get relevant information. 

In order to run this web application, clone the repository. For example if your path is /var/www/html, ensure the folder structure is as following:


/var/www/html/index.html

/var/www/html/test.php

/var/www/html/images


For the application to run, you need:

1. Apache 
2. PHP
3. Curl

### NOTE: INSTALL CURL corresponding to the same version of PHP. The webpage has a GIF in center which acts as home button. While browsing checks, each item having table and check number is collapsable with the required details.  

Following are instruction for Ubuntu after git clone :

* sudo apt-get install apache2
* sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql
* sudo apt-get install php7.0curl
* sudo service apache2 restart

More details on how to install Apache and PHP can be found here for [Ubuntu](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04) , [Windows](https://www.znetlive.com/blog/how-to-install-apache-php-and-mysql-on-windows-10-machine/) and [Mac](https://jason.pureconcepts.net/2016/09/install-apache-php-mysql-mac-os-x-sierra/). Instructions to install Curl for [Ubuntu](http://www.brocade.com/content/html/en/sdn-controller/3.0.0/software-installation/GUID-BF7C280A-A9C6-4C13-A253-7A425FE5CD3F.html) and [Windows and Mac](https://help.zendesk.com/hc/en-us/articles/229136847-Installing-and-using-cURL)


## [Demo of the solution](https://youtu.be/8huxRhXXZBU) 



# TechStack


## Frontend

1. HTML5
2. CSS3
3. Bootstrap

## Server Side 

1. PHP Script
2. Curl request

# Screenshots

## Homescreen
![alt text][id]

[id]: https://drive.google.com/uc?id=1k5Zxms1uRJxCK6-pb9j5By1_dzry6A-o "Homescreen"

## View open checks
![alt text][id1]

[id1]: https://drive.google.com/uc?id=1pK2REd4kJU43D_rbuxIsQyUEijY_3a36 "Openchecks"

## Open a new check
![alt text][id2]

[id2]: https://drive.google.com/uc?id=1_XiBfOaOazZn-BlLfPmq8iPFl-8vWOGy "newcheck"

## View closed checks
![alt text][id3]

[id3]: https://drive.google.com/uc?id=1r14jtpIDpVXb0OEZkBjR3IiIt8g1d_sd "close"

## Add an item
![alt text][id4]

[id4]: https://drive.google.com/uc?id=11YkMvL2-q-T65NyibWPzNvCx5kKmP0RI "add"

