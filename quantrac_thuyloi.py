import json
import pyodbc
import requests
import time
import os
import schedule
from datetime import datetime

f = open("log.txt", "w+")

print("****************>           START PROGRAM           <****************")
print("****************>           READING DATA            <****************")
print("****************>        DON'T STOP PROGRAM         <****************")
print("****************>    ©2022 TTCNTT VNPT Sóc Trăng    <****************")

def check_internetonline():
    try:
        requests.head("https://apiqtmt.soctrang.gov.vn/service_quantrac", timeout=5)
        return 1
    except requests.ConnectionError:
        return 0

def log_internet(text):
    now = datetime.now()
    date_time = now.strftime("%d/%m/%Y %H:%M:%S")
    f = open("log.txt", "a+")
    f.write(text + ": " + date_time + "\r")

def current_milli_time():
    return round(time.time() * 1000)

def cls():
    os.system('cls' if os.name == 'nt' else 'clear')

def ReadData(ID, IDCS, NAME, TIMETAMPS, Salinity, Temperature, LEVEL, pH):
    URL_Login = "https://apiqtmt.soctrang.gov.vn/service_quantrac/api/login.php"
    URL_SaveThuyLoi = "https://apiqtmt.soctrang.gov.vn/service_quantrac/api/saveInfoThuyLoi.php"
    fkey = current_milli_time()
    data_login = {
        "username": "soctrang",
        "password": "Vnpt@123"
    }
    data_savethuyloi = {
        "id": IDCS,
        "fkey": fkey,
        "name": NAME,
        "datetime": TIMETAMPS,
        "result1": Salinity,
        "result2": Temperature,
        "result3": LEVEL,
        "result4": pH
    }
    r_login = requests.post(url=URL_Login, data=json.dumps(data_login))
    resp = json.loads(r_login.text)
    if resp["status"] == "SUCCESS":
        hed = {'Authorization': 'VNPTSTG ' + resp["token"]}
        r_save = requests.post(url=URL_SaveThuyLoi, data=json.dumps(data_savethuyloi), headers=hed)
        resp_s = json.loads(r_save.text)
    else:
        return "Đọc dữ liệu không thành công!"

def GetDataThuyLoi():
    status = check_internetonline()
    if (status == 1):
        text = "Check is Online Internet at "
        log_internet(text)
        conn_str = ("Driver={SQL Server};"
                    "Server=localhost;"
                    "Database=WaterManagement;"
                    "UID=sa;"
                    "PWD=GizAdmin@123;")
        conn = pyodbc.connect(conn_str)
        cursor = conn.cursor()
        cursor.execute(
            "SELECT ID, StationID, Name, CONVERT(VARCHAR(20), TimeStamp, 120) as TIMETAMPS, Salinity, Temperature, Level, pH FROM ( SELECT *,  max_date = MAX(TimeStamp) OVER (PARTITION BY StationID, Name) FROM Datalogger ) AS s WHERE TimeStamp = max_date ORDER BY StationID;")
        result = cursor.fetchall()
        for row in result:
            resp = ReadData(row[0], row[1], row[2], row[3], row[4], row[5], row[6], row[7])
        return resp
    else:
        text = "Check is Offline Internet at "
        log_internet(text)
        print("Conecting Internet...")

schedule.every().hour.at(":05").do(GetDataThuyLoi)

while True:
    schedule.run_pending()
    time.sleep(1)