# 👨‍🚒👩‍🚒🚒 LODUR Statistiken

Open Data Analyse und Statistiken für die Einsätze der Feuerwehr Derendingen

---

### Open Data `/data`

Using the raw data from [lodur-so.ch/derendingen](https://lodur-so.ch/derendingen/index.php?modul=6).

- `lodur-raw.txt` raw data taken from the lodur website
- `lodur-raw.csv` manually converted to csv format, corrected typos in addresses
- `lodur-raw.json` converted to json, added geocoded (lat, lon) information of addresses

---

### Python Scripts `/python`

- `lodur-to-json.py` (Spyder) to convert `.csv` to `.json` and add geocoding information
- Geocoding API: [positionstack.com](https://positionstack.com/quickstart)




