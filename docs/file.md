# File class

## This class use for read, write, append, delete and ...

### 2 way for craete a object from **FILES** and edit them

1.  namespace Codecrafted\IronElephant\File;

        $file = new File("/path/file.ext");
        // $file->read();  # read this file : /path/file.ext

**Or insert data manually to method :**

2.  namespace Codecrafted\IronElephant\File;

        $file = new File();
        // $file->read("/path/file.ext");  # read this file : /path/file.ext

### For changing **file path** :

    $file->changeFile("/new_path/new_file.ext"); # change path from "/path/file.ext" to "/new_path/new_file.ext"

### Show current **file** :

    $file->currentFile();

| Name of function                                                   | Example                                                                                                                                                                                                                                                                                           | Result                                                         |
| ------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------- |
| changeFile()                                                       | changeFile("/new_path/new_file.ext")                                                                                                                                                                                                                                                              | Change path of file object                                     |
| currentFile()                                                      | currentFile()                                                                                                                                                                                                                                                                                     | Return recently path                                           |
| read()                                                             | read() **or** read("/path/file.ext")                                                                                                                                                                                                                                                              | Read file and return value                                     |
| write()                                                            | write("text") **or** write("text","/path/file.ext")                                                                                                                                                                                                                                               | Write a file with **text** value to this path : /path/file.ext |
| append()                                                           | append("text") **or** append("text","/path/file.ext")                                                                                                                                                                                                                                             | Append **text** value to this file : /path/file.ext            |
| delete()                                                           | delete() **or** delete("/path/file.ext")                                                                                                                                                                                                                                                          | Delete file /path/file.ext                                     |
| upload()                                                           | upload(_"form_name_in_HTML"_,"target_dir",[_max upload size : **0** _, [ every size limit : 0, [ _null? = **true**\|false_, [ _type : ["_"]\|["mp3","jpg"]* , [ target name : ["test.ext","test2.ext"] , [ *write method : **"o"**\|"s"\|"d"\* , [ create log ? : **true**\|false ] ] ] ] ] ] ] ) | Upload file with this options. more in below                   |
| arrayToJsonFile()                                                  | arrayToJsonFile(["json","json","json"], "file.name", overwrite ? **false**\|true)                                                                                                                                                                                                                 | Save json data to .json file with your name                    |
| jsonFileToArray()                                                  | jsonFileToArray("file.name")                                                                                                                                                                                                                                                                      | Convert json file to array                                     |
| makeDir()                                                          | makeDir() or makeDir("target_dir")                                                                                                                                                                                                                                                                | Make direction and folder                                      |
| sizeConverter()                                                    | sizeConverter(1024, KIB_TO_BYTE[, 2][,PHP_ROUND_HALF_UP])                                                                                                                                                                                                                                         | Convert file sizes                                             |

1. "name of file form in HTML"
2. "target/dir"
3. [All file max upload size to byte : 0]
4. [Every size limit to byte : 0]
5. [Is null ? : true\|false confirm upload null files]
6. [Type ? ["*"] for all format \| ["jpg","mp3"] only jpg and mp3 format]
7. [Target name = [] original name save \| ["name"] change all file to _name_ \| ["name1","name2"] ]
8. [Write method : "o" for overwriting\|"s" for skipping\"d" for duplicate|]
9. [Return log ? **true**\|false]|
