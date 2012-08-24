zend_active_record
==================

Zend-Active-Record is a generic database solution for Zend Framework to manage a database with the options like Add,Edit,Delete,Search,Show all,First Record,Last Record,Find by Id,Find by Column,Sort.


Methods in Zend-Active-Record:


Method  				                      Description

fetchAll($table)				              fetches all records from a table

find($table,$id)				              fetches the record based on id

findby_column($table,$column,$value)	fetches the records based on the given column value

first($table)				                  fetches the first record from the table

last($table)				                  fetches the last record from the table

sorts($table,$val,$order)			        Sorts the records order by the given column

search($table,$search_val,$columns)	  Searches the related records that matches with the value in the search box

delete($table,$id)				            deletes the records with respective id from table

update($condition,$colums,$table)		  updates the records with the specified id in table

insert($table,$params=array())		    inserts the records into the table


2.INSTALLATION

******************************************

In zend_Active_Record/application/config/application.ini set your database details.

;For database connections
	resources.db.adapter =PDO_MYSQL
	resources.db.params.host =localhost
	resources.db.params.username =<username>
	resources.db.params.password =<password>
	resources.db.params.dbname =<database name>



3.REQUIREMENTS

******************************************

You must have PHP 5.0 or greater installed.

Mysql - 3.4.5

Zend version - 1.11


4.WHAT THIS APPLICATION CONTAINS

******************************************

Public[folder] - Execution will be done from public folder. index.php and all the CSS,JS,IMAGE files will be there in this public folder.

Application[folder] - This folder consists of 
			1. Controllers
			2. Models
			3. Views
			4. config
			
1. Controllers : Controllers consists of all the php code and it is the mediator for models and views. It takes the request from views and sends it to model and return the result to view.

2. Models : Models consists of all the database methods required for the application.

3. Views : View is the use interface where all the HTML code will be written.

4. Config : This consists of database configuration.




<img style="max-width:100%;" src="https://github.com/lavanya-nyros/zend_active_record/raw/master/screenshot.bmp" alt="zend_active_record" title="zend_active_record">
