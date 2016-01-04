[![Issues](https://badge.waffle.io/MichaelJ2324/SugarDataManager.png?label=ready&title=Ready)](http://waffle.io/MichaelJ2324/SugarDataManager)

# Sugar Data Manager
### Recycle Bin
* Consists of the dm_Recycler and dm_RecycledLinks modules
* After Save logichook on Records creates a record in the dm_Recycler Module
* After Save logichook on relationships creates a record in the dm_Recycled Links module, for those relationships that utilize an intermediary table
 * i.e. Many-to-Many relationships, custom One-to-Many relationships

### Duplicate Checking
* Consists of the dm_Duplicates and dm_DuplicateRules modules
* Duplicate Rules module provides ability to easily define what constitutes a duplicate on a per module basis
 * Rules consist of simply setting the field(s) you want checked
 * Multiple rules use OR between them
* Stock DuplicateCheck API Request is overridden so that seamless flow can be reached with new Duplicate Check logic
* Duplicates are also found via scheduler, so that there is not a need to manually clean data
 * This also catches records that are created outside the User Interface 

### Database Pruning
* Provide maintenance of database, to remove old records that are no longer needed
* Utilizes the above 4 modules logic to ensure duplicates and deleted records do not take up space in data storage

Installation:
-----------
1. Zip manifest.php, custom, and modules directories
2. Install via Admin > Module Loader
3. Run Quick Repair and Rebuild
4. Execute the SQL Scripts generated

Development:
-----------
1. Fork/Pull down current repository
2. See Issues for work that needs to be or is currently being worked
3. Submit Pull Request
 * Tag any issues


