Saudi Fashion Magazine API - V1
=========


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
1. php artisan migrate
2. php artisan db:seed
