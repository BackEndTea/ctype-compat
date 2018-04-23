<?php

class TestRunner
{
    private static $isCtypeLoaded;

    public static function run()
    {
        $runner = new self();
        self::$isCtypeLoaded = extension_loaded('ctype');

        return $runner->test_alnum() &&
            $runner->test_alpha() &&
            $runner->test_cntrl() &&
            $runner->test_digit() &&
            $runner->test_graph() &&
            $runner->test_lower() &&
            $runner->test_print() &&
            $runner->test_punct() &&
            $runner->test_space() &&
            $runner->test_upper() &&
            $runner->test_xdigit();
    }

    private function doTest($functionName, $trues, $falses) {
        $testName = 'test_ctype_' . $functionName;
        $realFunction = 'ctype_' . $functionName;

        foreach ($trues as $true){
            if (self::$isCtypeLoaded) {
                if (! $realFunction($true)) {
                    echo 'Wrong Test, '. $true . ' is not ' . $functionName . ' according to normal ctype function';
                    return false;
                }
            }
            if (! $testName($true)) {
                echo 'Failed asserting that ' . $true, 'is '. $functionName;
                return false;
            }
        }

        foreach ($falses as $false) {
            if (self::$isCtypeLoaded) {
                if ($realFunction($false)) {
                    echo 'Wrong Test, '. $false . ' is ' . $functionName . ' according to normal ctype function';
                    return false;
                }
            }
            if ($testName($false)) {
                echo 'Failed asserting that ' . $false, ' is not '. $functionName;
                return false;
            }
        }

        return true;
    }

    public function test_alnum()
    {
        $trues = array(53, 65, 98,'asdf','ADD', '123','A1cbad', 280);
        $falses = array (8, 43, -127,'asd df', '','é', '!!', '!asdf', 'as2!a', "\x00asdf");

        return $this->doTest('alnum', $trues, $falses);
    }

    public function test_alpha()
    {
        $trues = array(65, 98, 'asdf','ADD','bAcbad');
        $falses = array (8, 43, 53, 'asd df', '','é','1234', '13addfadsf2',"\x00asd", 280);

        return $this->doTest('alpha', $trues, $falses);
    }

    public function test_cntrl()
    {
        $trues = array(8, 127,"\x00","\x02",chr(127));
        $falses = array (53,65, 98, 43, 280, 'asd df', '','é','1234', '13addfadsf2',"\x00adf", chr(127) . 'adf');

        return $this->doTest('cntrl', $trues, $falses);
    }

    public function test_digit()
    {
        $trues = array(53, 280, '123','01234','934');
        $falses = array (8, 43, 65,98, 'asd df', '','é','1234B', '13addfadsf2',"\x00a", chr(127), '-3','3.5');

        return $this->doTest('digit', $trues, $falses);
    }

    public function test_graph()
    {
        $trues = array(43,53, 65,98, 'asdf','ADD', '123','A1cbad','!!','!asdF');
        $falses = array (8, 'asd df', '','é', "\n", "\x00asdf");

        return $this->doTest('graph', $trues, $falses);
    }

    public function test_lower()
    {
        $trues = array(98,'asdf','stuff');
        $falses = array ('asd df','ADD', '123','A1cbad','!!','','é', "\n", "\x00asdf");

        return $this->doTest('lower', $trues, $falses);
    }

    public function test_print()
    {
        $trues = array(43, 53, 280, 65, 98, '567', '!!','@@!#^$', 'asd df');
        $falses = array (8, 127, 'é', "\n", "\x00asdf");

        return $this->doTest('print', $trues, $falses);
    }

    public function test_punct()
    {
        $trues = array(43, '!!','@@!#^$');
        $falses = array (8, 53, 65, 98, 127, 'é','asd df','ADD', '123','A1cbad','', "\n", "\x00asdf");

        return $this->doTest('punct', $trues, $falses);

    }

    public function test_space()
    {
        $trues = array(32, "\t", "\n", "\r\n", "\n\r", "\r");
        $falses = array(8, 65, 98, 43, 127, 280, 'asdf','123', "\x01", '', 'Ad12', 'ADD');

        return $this->doTest('space', $trues, $falses);
    }

    public function test_upper()
    {
        $trues = array(65, 'ADD', 'ASDF','DDD');
        $falses = array(8, 43, 53, 98, 127, 280, -129, -128, 'asdf','123', "\x01", '', 'Ad12',"\t", "\n", "\r\n", "\n\r", "\r");

        return $this->doTest('upper', $trues, $falses);
    }

    public function test_xdigit()
    {
        $trues = array(53, 65, 98, 70, 102, 280, '01234', 'a0123', 'A4fD', 'DDD', 'bbb');
        $falses = array(43, 71, 103, 127,'asdfk', 'hhh', '0123kl', 'zzz', "\x01", '',"\t", "\n", "\r\n", "\n\r", "\r");

        return $this->doTest('xdigit', $trues, $falses);
    }

}
