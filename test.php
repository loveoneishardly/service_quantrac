<?php
	phpinfo();
	/* Connect SQL Server
	1. Add extension php_sqlsrv:
		copy file php_sqlsrv.dll from download folder derectory that the same version installed https://github.com/ramiro/freetds/releases
		open file php.ini: C:\php\php.ini
	2. Paste extension=php_sqlsrv into line this file and Save
	3. Restart Apache Server
		Run file ApacheMonitor.exe: C:\Apache24\bin\ApacheMonitor.exe and restart Apache
	4. Check extension php_sqlsrv into in host by function phpinfo()
	*/
?>