# LODUR Statistiken

[![License: CC BY-SA 4.0](https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg)](https://creativecommons.org/licenses/by-sa/4.0/)

👨‍🚒👩‍🚒🚒 Open Data Analyse und Statistiken für die Einsätze der Feuerwehr Derendingen 

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

---

### Credits

- [pointhi/leaflet-color-markers](https://github.com/pointhi/leaflet-color-markers)
- [lodur-so.ch/derendingen](https://lodur-so.ch/derendingen/index.php?modul=6)
- [Leaflet/Leaflet](https://github.com/Leaflet/Leaflet)
- [openstreetmap.org](https://www.openstreetmap.org)
- [positionstack.com](https://positionstack.com/quickstart)

---

### License

[![License: CC BY-SA 4.0](https://licensebuttons.net/l/by-sa/4.0/80x15.png)](https://creativecommons.org/licenses/by-sa/4.0/)

This work is licensed under a Creative Commons Attribution 4.0 International License. 














