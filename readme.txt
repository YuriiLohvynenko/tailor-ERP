Instruction to install the stitch applicaiton.

1. Unzip stich folder inside your server folder (Like stitch.com)
2.Now create a database on your server in phpmyadmin
3.Import database file stitch.sql (Reside in stitch folder) into phpmyadmin 
4.Now open appliation/config folder and edit database.php with your mysql credentials like.
	
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'root';
	$db['default']['password'] = '';
	$db['default']['database'] = 'stitch';



5.Now you can enter your URL in browser and press enter you will see application is installed on your server and running frequently

if any query please feel free to refere it at acceleregenius@gmial.com