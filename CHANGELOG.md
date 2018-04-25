# Ctype Compat Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## [0.1.1] - 2018-04-25

### Changed
* `conver_int_to_char_for_ctype` has been renamed to `convert_int_to_char_for_ctype`, as it was a typo
* Internal working of all functions was slightly changed, by directly using the output of the conversion function, instead of first writing it to a variable.

## [0.1.0] - 2018-04-23

* Initial Release containing functions which provide a fallback if the standard ctype functions are not available.
