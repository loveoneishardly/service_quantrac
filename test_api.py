import requests

URL_t = "https://webapi.thegioididong.com/comment/PagingComment"
form_data = {
    'objecttype': '2',
    'productid': '251192',
    'page': '1',
    'siteId': '1',
    'pageSize': '10'
}
headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36'}
res = requests.post(url=URL_t, data=form_data, headers=headers)
resp = res.text
print(resp)