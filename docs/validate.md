# Validate class

## This module use for sanitize, validate and test string inputs **Validate**

### How to use **Validating** feature

1.        namespace Codecrafted\IronElephant\Validate;
        Validate->firstMethod()->secoundMethod()->thirdMethod();

| Name of function     | Example                                                | Result                                                          |
| -------------------- | ------------------------------------------------------ | --------------------------------------------------------------- |
| inputTest()          | inputTest("some string"[, true] )                      | convert special character test string and trim space by default |
| validateInt()        | validateInt(15)                                        | Test value if it's was int number return true                   |
| validateIp()         | validateIp("127.0.0.1")                                | Testing ip, if it's was correct ip return true                  |
| validateIpv6()       | validateIpv6("2001:db8:3333:4444:5555:6666:7777:8888") | Testing ipv6, if it's was correct ipv6 return true              |
| validateEmail()      | validateEmail("test@gmail.com")                        | Testing email, if it's correct email return true                |
| validateUrl()        | validateUrl("https://google.com/")                     | Testing url, if it's was correct url return true                |
| webAddressValidate() | webAddressValidate("https://google.com/")              | Testing web address, if it's was correct return true            |
| sanitizeEmail()      | sanitizeEmail("test@gmail.com")                        | Sanitize email and return safe email                            |
| sanitizeUrl()        | sanitizeUrl("https://google.com/")                     | Sanitize URL and return safe URL                                |

