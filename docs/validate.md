# Security Module

## This module use for sanitize, validate and test string inputs **Security**

### How to use **Security** feature

1.       namespace IronElephant\Security;
        Security::method();

| Name of function     | Example                                                                                     | Result                                                                                                  |
| -------------------- | ------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- |
| inputTest()          | inputTest("some string"[, length limit : 0 , callback function for validating fn($i)=>$i] ) | convert special character test string length and use a a callback for validating and return safe string |
| validateInt()        | validateInt(15)                                                                             | Test value if it's was int number return true                                                           |
| validateIp()         | validateIp("127.0.0.1")                                                                     | Testing ip, if it's was correct ip return true                                                          |
| validateIpv6()       | validateIpv6("2001:db8:3333:4444:5555:6666:7777:8888")                                      | Testing ipv6, if it's was correct ipv6 return true                                                      |
| validateEmail()      | validateEmail("test@gmail.com")                                                             | Testing email, if it's correct email return true                                                        |
| validateUrl()        | validateUrl("https://google.com/")                                                          | Testing url, if it's was correct url return true                                                        |
| webAddressValidate() | webAddressValidate("https://google.com/")                                                   | Testing web address, if it's was correct return true                                                    |
| sanitizeEmail()      | sanitizeEmail("test@gmail.com")                                                             | Sanitize email and return safe email                                                                    |
| sanitizeUrl()        | sanitizeUrl("https://google.com/")                                                          | Sanitize URL and return safe URL                                                                        |
| patternString()      | patternString(string :"hello", pattern : "ehl")                                             | return false becuase "o" char not in pattern                                                            |
| encrypt()            | encrypt("str"[, cost : **10**])                                                             | Encrypt string with default cost 10 and PASSWORD_ARGON2ID method                                        |
| decrypt()            | decrypt("original str", "hashed string")                                                    | Compare original with hased string and return result                                                    |
| addSalt()            | addSalt("str" [, $salt : **SALT**\|"d7a98sdas98d4as65" ])                                   | Add salt to your string, default is **SALT** value from your config file                                |
| removeSalt()         | removeSalt("str" [, $salt : **SALT**\|"d7a98sdas98d4as65" ])                                | Remove salt from your string, default is SALT value from your config file                               |
