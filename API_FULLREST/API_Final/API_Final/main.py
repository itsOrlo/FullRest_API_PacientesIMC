from urllib.request import urlopen
import json
import urllib.request

url = "http://127.0.0.1:8000/api/pacientukis/"

response = urlopen(url)
data = json.loads(response.read())
print(data)