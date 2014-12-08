from flask import Flask
app = Flask(__name__)
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import requests
import StringIO
import zipfile
import scipy.stats 

@app.route("/")

# def getZIP(zipFileName):
# 	r = requests.get(zipFileName).content
# 	s = StringIO.StringIO(r)
# 	zf = zipfile.ZipFile(s, 'r') # Read in a list of zipped files
# 	return zf

# url = 'http://seanlahman.com/files/database/lahman-csv_2014-02-14.zip'
# zf = getZIP(url)
# print zf.namelist()	

def hello():
    return "This does not cause an internal server error"

if __name__ == "__main__":
    app.run()