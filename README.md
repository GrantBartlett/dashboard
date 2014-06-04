Saudi Fashion Magazine API - V1
=========

## New

http://sfmreport.api/api/v1/users?monthmin=-12&monthmax=-11

Type | Parameter | Example
------------ | ------------- | -------------
table_name | param=&by= | param=location&by=Farnham
group_id | gid= | gid=8
timestamp | monthmin=&monthmax= | monthmin=-12&monthmax=-1
asc/desc | sort=&bysortby= |sort=desc&bysortby=last_activity



## Get requests /api/v1/users
To fetch a request from the API, the following parameters are available:

Type | Parameter | Example
------------ | ------------- | -------------
sort_by= | table_name | /api/v1/users/sort_by=<b>table_name</b>
sort | asc/desc | /api/v1/users/sort_by=<b>table_name</b>&sort=<b>desc</b>
limit | int | /api/v1/users/sort_by=<b>table_name</b>&sort=<b>desc</b>&limit=<b>5</b>
gid | group_id | /api/v1/users/sort_by=<b>table_name</b>&sort=<b>desc</b>&limit=<b>5</b>&gid=<b>8</b>
min_date | min timestamp | /api/v1/users/sort_by=<b>table_name</b>&sort=<b>desc</b>&limit=<b>5</b>&gid=<b>8</b>&min_date=<b>1370513563</b>
max_date | max timestamp | /api/v1/users/sort_by=<b>table_name</b>&sort=<b>desc</b>&limit=<b>5</b>&gid=<b>8</b>&min_date=<b>1370513563</b>&max_date=<b>1401455449</b>


PHP Artisan Commands
=========

* php artisan migrate
* php artisan db:seed
