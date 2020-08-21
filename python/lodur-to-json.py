# -*- coding: utf-8 -*-
"""
Created on Fri Aug 21 21:11:12 2020

@author: simon
"""

import csv
import requests	
import json

# add your own API Key from positionstack.com
api_key = ''

# limit=1 limits the number of results to 1
# @bug: this might return the address for "street 6b" when requesting "street 6a"
requrl = 'http://api.positionstack.com/v1/forward?access_key=' + str(api_key) + '&limit=1&query='
data = []

def writeJsonFile(filename, data):
    with open(str(filename), 'w') as outfile:
        json.dump(data, outfile, sort_keys=True, indent=4)

with open('lodur-raw.csv', 'r', encoding='utf-8') as csvfile:
    spamreader = csv.reader(csvfile, delimiter=',', quotechar='|')
    for row in spamreader:
        if('date' not in row[0].lower()):
            entry = {}
            date = row[0].split('.')
            entry['date'] = str(date[2]) + '-' + str(date[1]) + '-' + str(date[0])
            entry['category'] = row[1].replace('\t', '')
            entry['address'] = row[2].replace('\t', '')
            entry['text'] = row[3].replace('\t', '')
            if(len(row) > 4):
                entry['lat'] = row[4]
                if(len(row) > 5):
                    entry['lon'] = row[5]
            else:
                address = entry['address']
                if(len(address) > 6):                 # if address is not empty
                    if(len(address.split(' ')) > 3):  # if address containy street and city
                        tmp = address.split(' ')      # need to add comma to separate street and city
                        address = ''
                        for k in range(len(tmp)):
                            address += tmp[k]
                            if(k == 2):
                                address += ', '
                            else:
                                address += ' '
                response = requests.get(requrl + str(entry['address']))
                
                if('data' in response.text):
                    geocode = json.loads(response.text)['data']
                    try:
                        if('latitude' in geocode[0]):
                            geocode = geocode[0]
                            entry['lat'] = geocode['latitude']
                            entry['lon'] = geocode['longitude']
                            entry['geocode'] = geocode
                            print(entry['lat'] + ', ' + entry['lon'])
                    except Exception:
                        print(address)
                        print(geocode)
            data.append(entry)
            
writeJsonFile('lodur-raw.json', data)
