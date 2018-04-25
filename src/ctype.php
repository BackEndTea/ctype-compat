<?php

/**
 * On 'normal' php installations ctype should be enabled.
 * However if someone runs a php version that was compiled with --disable-ctype they wont
 * have access to these functions.
 *
 * This file provides a (slower) version of the functions, when ctype is not available.
 *
 * If an integer between -128 and 255 inclusive is provided, it is interpreted as the ASCII value of a single character
 * (negative values have 256 added in order to allow characters in the Extended ASCII range).
 * Any other integer is interpreted as a string containing the decimal digits of the integer.
 */
if (!extension_loaded('ctype')) {

    if(!function_exists('ctype_alnum')) {
        /**
         * Returns TRUE if every character in text is either a letter or a digit, FALSE otherwise.
         *
         * @see http://php.net/manual/en/function.ctype-alnum.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_alnum($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^A-Za-z0-9]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if(! function_exists('ctype_alpha')) {
        /**
         * Returns TRUE if every character in text is a letter, FALSE otherwise.
         *
         * @see http://php.net/manual/en/function.ctype-alpha.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_alpha($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^A-Za-z]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if (!function_exists('ctype_cntrl')) {
        /**
         * Returns TRUE if every character in text is a control character from the current locale, FALSE otherwise.
         *
         * @see http://php.net/manual/en/function.ctype-cntrl.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_cntrl($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^\x00-\x1f\x7f]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if(!function_exists('ctype_digit')) {
        /**
         * Returns TRUE if every character in the string text is a decimal digit, FALSE otherwise.
         *
         * @see http://php.net/manual/en/function.ctype-digit.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_digit($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^0-9]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if (!function_exists('ctype_graph')) {
        /**
         * Returns TRUE if every character in text is printable and actually creates visible output (no white space), FALSE otherwise.
         *
         * @see http://php.net/manual/en/function.ctype-graph.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_graph($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^!-~]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if(!function_exists('ctype_lower')) {
        /**
         * Returns TRUE if every character in text is a lowercase letter.
         *
         * @see http://php.net/manual/en/function.ctype-lower.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_lower($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^a-z]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if(!function_exists('ctype_print')) {
        /**
         * Returns TRUE if every character in text will actually create output (including blanks). Returns FALSE if text contains control characters or characters that do not have any output or control function at all.
         *
         * @see http://php.net/manual/en/function.ctype-print.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_print($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^ -~]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if (!function_exists('ctype_punt')) {
        /**
         * Returns TRUE if every character in text is printable, but neither letter, digit or blank, FALSE otherwise.
         *
         * @see http://php.net/manual/en/function.ctype-punct.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_punct($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^!-\/\:-@\[-`\{-~]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if (!function_exists('ctype_space')) {
        /**
         * Returns TRUE if every character in text creates some sort of white space, FALSE otherwise. Besides the blank character this also includes tab, vertical tab, line feed, carriage return and form feed characters.
         *
         * @see http://php.net/manual/en/function.ctype-space.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_space($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^\s]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if(!function_exists('ctype_upper')) {
        /**
         * Returns TRUE if every character in text is an uppercase letter.
         *
         * @see http://php.net/manual/en/function.ctype-upper.php
         *
         * @param string|int $text
         *
         * @return bool
         *
         */
        function ctype_upper($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^A-Z]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if(!function_exists('ctype_xdigit')) {
        /**
         * Returns TRUE if every character in text is a hexadecimal 'digit', that is a decimal digit or a character from [A-Fa-f] , FALSE otherwise.
         *
         * @see http://php.net/manual/en/function.ctype-xdigit.php
         *
         * @param string|int $text
         *
         * @return bool
         */
        function ctype_xdigit($text)
        {
            return !empty($text) &&
                !preg_match(
                    '/[^A-Fa-f0-9]/',
                    convert_int_to_char_for_ctype($text)
                );
        }
    }

    if (!function_exists('convert_int_to_char_for_ctype')) {
        /**
         * Converts integers to their char versions according to normal ctype behaviour, if needed.
         *
         * @internal
         *
         * @param string|int $int
         *
         * @return string
         */
        function convert_int_to_char_for_ctype($int)
        {
            if(!is_integer($int)) {
                return $int;
            }

            if ($int < -128 || $int > 255) {
                return (string) $int;
            }

            if ($int < 0) {
                $int += 256;
            }

            return chr($int);
        }
    }
}
