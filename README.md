# parking
To Use the webiste link:
username : admin
password : admin


To Work in localhost:

1.create a database in mysql named "parking"
2. create two tables:

  i) sql:
  
    create table login
    id int primary key auto_increment,
    username varchar(255),
    login varchar(255)
    
    since there is no register , you need to manually insert values for admin in myphpadmin.
    
   ii)sql:
   
   create table entry
   number varchar(255) primary key,
   type varchar(255) ,
   time varchar(255),
   extime varchar(255)
   
   
 for bike :
 initial 3 hours: ₹30
 succeeding hours: ₹20
 fine for not paying in one day: ₹40
 
 for car:
 initail 3 hours: ₹40
 succeeding hours: ₹30
 fine for not paying in one day: ₹40
 
 
 hope this program helps you!!
