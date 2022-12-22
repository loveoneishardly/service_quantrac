@ ECHO OFF

Set year=%date:~10,4%
Set month=%date:~4,2%
Set day=%date:~7,2%

cd D:\
Copy "D:\FTP\CoCo\backup\*%year%%month%%day%*.txt" "D:\VNPT\CoCo\"
Copy "D:\FTP\LongPhu\backup\*%year%%month%%day%*.txt" "D:\VNPT\LongPhu\"
Copy "D:\FTP\MyThanh\backup\*%year%%month%%day%*.txt" "D:\VNPT\MyThanh\"
Copy "D:\FTP\SongDinh\backup\*%year%%month%%day%*.txt" "D:\VNPT\SongDinh\"
Copy "D:\FTP\TramKhiSTNMT\backup\*%year%%month%%day%*.txt" "D:\VNPT\TramKhiSTNMT\"