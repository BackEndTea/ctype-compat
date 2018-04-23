# How to contribute

## Tests
Running tests can be done by
```bash
$ php tests/tests.php
```

Which will make a copy of the ctype file, with some minor changes to make it testable even if you have ctype enabled,
please don't edit `tests_ctype.php` directly, since it will be overwritten for every test run.

Any changes should include tests to make sure new behaviour is as intended.

## Code style

Please keep all code php 5.3 compatible and follow conventions used.
