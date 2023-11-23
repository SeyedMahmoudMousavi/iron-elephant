# helper functions     

| Name of function | Example                                                               | Result                                                           |
| ---------------- | --------------------------------------------------------------------- | ---------------------------------------------------------------- |
| hr()             | hr()                                                                  | Add a horizontal line HTML                                       |
| br()             | br()                                                                  | Add a break line HTML                                            |
| d()              | d($e)                                                                 | Drop $e                                                          |
| dd()             | dd($e)                                                                | Drop $e with die                                                 |
| js()             | js("some js code")                                                    | Add js code to HTML file                                         |
| redirect()       | redirect("https://www.google.com/")                                   | Change url to google with php                                    |
| is_post()        | is_post()                                                             | Check request method if it was POST, return true                 |
| is_get()         | is_get()                                                              | Check request method if it was GET, return true                  |
| session()        | session("Session name")                                               | If is set session value, return true                             |
| e_session()      | e_session("Session name")                                             | echo if is set session value                                     |
| session_delete() | session_delete("Session name")                                        | delete session if is set                                         |
| randomatic()     | randomatic(string $case = "[**a**\|ul\|un\|ln]", int $length = **1**) | Return a string value with your pattern and length               |
| check_cookie()   | check_cookie()                                                        | Return true if cookie is set                                     |
| cookie()         | cookie("name")                                                        | Return your cookie                                               |
| my_address()     | my_address([true\|false])                                             | Return your web address or full url                              |
| error()          | error("value")                                                        | set and get a session with error name                            |
| error_delete()   | error()                                                               | delete error session                                             |
| encrypt()        | encrypt("str"[, cost : **10**])                                       | Encrypt string with default cost 10 and PASSWORD_ARGON2ID method |
| decrypt()        | decrypt("original str", "hashed string")                              | Compare original with hased string and return result             |
