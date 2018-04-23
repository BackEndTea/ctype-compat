# Ctype Compat

[![Build Status](https://travis-ci.org/BackEndTea/ctype-compat.svg?branch=master)](https://travis-ci.org/BackEndTea/ctype-compat)
[![Licence](https://img.shields.io/github/license/backendtea/ctype-compat.svg)](https://packagist.org/packages/backendtea/ctype-compat)
[![Version](https://img.shields.io/packagist/v/backendtea/ctype-compat.svg)](https://packagist.org/packages/backendtea/ctype-compat)
[![Downloads](https://img.shields.io/packagist/dt/backendtea/ctype-compat.svg)](https://packagist.org/packages/backendtea/ctype-compat)


A package to make sure ctype functions still work, even if a php version is used that was compiled with `--disable-ctype`.
If ctype is enabled this package will do nothing, if ctype is disabled this package will provide these functions.
Instead of crashing when they can't be found.

The only requirement is php 5.3+

## Installation

### Composer
Simply run the following command:
```bash
$ composer require backendtea/ctype-compat
```

### Manually
Download the `src/ctype.php` file, and include it within your project.

## Usage
By installing the package through composer you are automatically using it, no configuration required.


If this package is manually added to the project `include_once` it in a bootstrap file, or simply where it is needed.

## Versioning
This project follows [Semantic Versioning 2.0.0](https://semver.org/), which means that any breaking change of the **public**
wil result in a major version up. Anything marked `@internal` can be changed at any time and should not be relied on.

Although this is currently in a `0.*` version, and is therefore allowed to have BC breaking changes in minor releases, we will
attempt to reduce breaking changes to an absolute minimum. The `0.*` version mainly indicates that it has not seen major usage.

## Limitations

Normal ctype functions are locale dependent, these versions are slightly 'dumber', and may therefore not give the expected result
if it is dependent on locale.

## Contributing

If this package shows unexpected behaviour please [report a github issue](https://github.com/BackEndTea/ctype-compat/issues).
If you wish to create a pull request, please read our [Contributing guide](.github/CONTRIBUTING.md)
