# Connection Modules (mysqli)

## This module use for create read insert update and delete **database**

### 2 way for craete a object and connecting to **DATABASE**

1.       $db = new Connection ("server_name", "user_name", "password", "database_name");
        **Or connect to server then create database and connect that :**

2.       $db = new Connection ("server_name", "user_name", "password");
        $db->createDatabase("database_name")
        $db->connectToDatabase("server_name", "user_name", "password", "database_name")

| Name of function | Example                                                                           | Result                                                                                       |
| ---------------- | --------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- |
| createDatabase() | createDatabase("database_name")                                                   | Craete database                                                                              |
| dropDatabase()   | dropDatabase("database_name", [**"no"**\|"yes"])                                  | Drop database and for confirm this process secound argumant must be **YES**, default is “no” |
| find()           | find("column_name", "table_name"[,"id=7"])                                        | Find something in database with your condition, default is "1=1"                             |
| select()         | select(["column_1", "column_2"], "table_name"[, "id=7"])                          | Select columns with your condition, default is "1=1"                                         |
| insert()         | insert("table", ["column_1","column_2"], ["value_1", "value_2"])                  | Insert data with your value into database                                                    |
| update()         | update("table_name", ["column_1" => "value_1","column_2" => "value_2"][, "id=7"]) | Update columns with your value and condition, default condition is "1=1"                     |
| delete()         | delete("table_name", "id=7")                                                      | Delete with your condition                                                                   |
| query()          | query("selecet \* from person")                                                   | Write your query to run SQL code                                                             |
