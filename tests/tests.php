<?php

$file = __DIR__ .'/../src/ctype.php';

$contents = file_get_contents($file);

$newContents = str_replace('function ctype_','function test_ctype_', $contents);
$newContents = str_replace('ion_loaded(\'ctype\')', 'ion_loaded(\'fake\')', $newContents);
$newFile = __DIR__ . '/test_ctype.php';
if (file_exists($newFile)) {
    unlink($newFile);
}

touch($newFile);

file_put_contents($newFile, $newContents);

include_once $newFile;

include_once __DIR__.'/TestRunner.php';

$testRunner = new TestRunner();
if(TestRunner::run()){
    echo "All tests ran succsessfully.\n";
    exit(0);
}

echo "Failure while runnig tests.\n";
exit(1);
