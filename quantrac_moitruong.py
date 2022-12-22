import json
import os
import glob
import time
from apscheduler.schedulers.blocking import BlockingScheduler
import requests
import pytz
from datetime import datetime

print("****************>           START PROGRAM           <****************")
print("****************>           READING DATA            <****************")
print("****************>        DON'T STOP PROGRAM         <****************")
print("****************>    ©2022 TTCNTT VNPT Sóc Trăng    <****************")

f = open("log.txt", "w+")

def current_milli_time():
    return round(time.time() * 1000)

def deleteFileinFolder(folders):
    path = folders.replace("*.txt", "")
    for file_name in os.listdir(path):
        file = path + file_name
        if os.path.isfile(file):
            os.remove(file)

def getLatestFile(directory):
    list_of_files = glob.glob(directory)
    latest_file = max(list_of_files, key=os.path.getctime)
    return latest_file

def ReadFile(file, ID_TRAM, TEN_TRAM, token):
    URL_Save = "https://apiqtmt.soctrang.gov.vn/service_quantrac/api/saveInfo.php"
    with open(file, 'r') as fp:
        lines = len(fp.readlines())
    fkey = current_milli_time()
    OFile = open(file)
    for i in range(lines):
        str_line = OFile.readline()
        results = " ".join(str_line.split())
        str_split = results.split()
        data_save = {
            "id": ID_TRAM,
            "fkey": fkey,
            "name": TEN_TRAM,
            "index": str_split[0],
            "result": str_split[1],
            "unit": str_split[2],
            "datetime": str_split[3]
        }
        hed = {'Authorization': 'VNPTSTG ' + token}
        r_save = requests.post(url=URL_Save, data=json.dumps(data_save), headers = hed)
        resp = json.loads(r_save.text)

def Get_Path(token):
    URL_GetTram = "https://apiqtmt.soctrang.gov.vn/service_quantrac/api/get_tentram.php"
    headers = {"content-type": "application/json; charset=UTF-8", 'Authorization': 'VNPTSTG {}'.format(token)}
    data_tram = requests.get(URL_GetTram, headers=headers).json()
    return data_tram

def check_internetonline():
    timeout = 5
    try:
        requests.head("https://apiqtmt.soctrang.gov.vn/service_quantrac", timeout=timeout)
        return 1
    except requests.ConnectionError:
        return 0

def log_internet(text):
    now = datetime.now()
    date_time = now.strftime("%d/%m/%Y %H:%M:%S")
    f = open("log.txt","a+")
    f.write(text+": "+date_time+"\r")

def Get_File_inPath():
    status = check_internetonline()
    if (status == 1):
        text = "Check is Online Internet at "
        log_internet(text)
        URL_Login = "https://apiqtmt.soctrang.gov.vn/service_quantrac/api/login.php"
        data_login = {
            "username": "soctrang",
            "password": "Vnpt@123"
        }
        r_login = requests.post(url=URL_Login, data=json.dumps(data_login))
        resp = json.loads(r_login.text)

        if resp["status"] == "SUCCESS":
            token = resp["token"]
            v_datatram = Get_Path(token)
            for i in range(0, len(v_datatram)):
                IDTRAM = v_datatram[i]["ID"]
                TENTRAM = v_datatram[i]["TENTRAM"]
                DIRECTORY = v_datatram[i]["DIRECTORY"]
                f_LatestFile = getLatestFile(DIRECTORY)
                ReadFile(f_LatestFile, IDTRAM, TENTRAM, token)
                deleteFileinFolder(DIRECTORY)
            return "Đọc file thành công."
        else:
            return "Đọc file không thành công."
    else:
        text = "Check is Offline Internet at "
        log_internet(text)
        print("Conecting Internet...")

sched = BlockingScheduler(timezone=pytz.timezone('Asia/Ho_Chi_Minh'))
@sched.scheduled_job('cron', minute='2,12,22,32,42,52')
def timed_job():
    Get_File_inPath()

sched.start()