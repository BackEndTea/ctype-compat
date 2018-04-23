<?php
/**
 * On 'normal' php installations ctype should be enabled.
 * However if someone runs a php version that was compiled with --disable-ctype they wont
 * have access to these functions.
 *
 * This file provides a (slower) version of the functions, when ctype is not available.
 */
if (! extension_loaded('ctype')) {

    /**
     * Returns TRUE if every character in text is either a letter or a digit, FALSE otherwise.
     *
     * @see http://php.net/manual/en/function.ctype-alnum.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_alnum($text)
    {
        return !empty($text) && !preg_match('/[^A-Za-z0-9]/', $text);
    }

    /**
     * Returns TRUE if every character in text is a letter, FALSE otherwise.
     *
     * @see http://php.net/manual/en/function.ctype-alpha.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_alpha($text)
    {
        return !empty($text) && !preg_match('/[^A-Za-z]/', $text);
    }

    /**
     * Returns TRUE if every character in text is a control character from the current locale, FALSE otherwise.
     *
     * @see http://php.net/manual/en/function.ctype-cntrl.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_cntrl($text)
    {
        return !empty($text) && !preg_match('/[^\x00-\x1f\x7f]/', $text);
    }

    /**
     * Returns TRUE if every character in the string text is a decimal digit, FALSE otherwise.
     *
     * @see http://php.net/manual/en/function.ctype-digit.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_digit($text)
    {
        return !empty($text) && !preg_match('/[^0-9]/', $text);
    }

    /**
     * Returns TRUE if every character in text is printable and actually creates visible output (no white space), FALSE otherwise.
     *
     * @see http://php.net/manual/en/function.ctype-graph.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_graph($text)
    {
        return !empty($text) && !preg_match('/[^!-~]/', $text);
    }

    /**
     * Returns TRUE if every character in text is a lowercase letter.
     *
     * @see http://php.net/manual/en/function.ctype-lower.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_lower($text)
    {
        return !empty($text) && !preg_match('/[^a-z]/', $text);
    }

    /**
     * Returns TRUE if every character in text will actually create output (including blanks). Returns FALSE if text contains control characters or characters that do not have any output or control function at all.
     *
     * @see http://php.net/manual/en/function.ctype-print.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_print($text)
    {
        return !empty($text) && !preg_match('/[^ -~]/', $text);

    }

    /**
     * Returns TRUE if every character in text is printable, but neither letter, digit or blank, FALSE otherwise.
     *
     * @see http://php.net/manual/en/function.ctype-punct.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_punct($text)
    {
        return !empty($text) && !preg_match('/[^!-\/\:-@\[-`\{-~]/', $text);

    }

    /**
     * Returns TRUE if every character in text creates some sort of white space, FALSE otherwise. Besides the blank character this also includes tab, vertical tab, line feed, carriage return and form feed characters.
     *
     * @see http://php.net/manual/en/function.ctype-space.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_space($text)
    {
        return !empty($text) && !preg_match('/[^\s]/', $text);
    }

    /**
     * Returns TRUE if every character in text is an uppercase letter.
     *
     * @see http://php.net/manual/en/function.ctype-upper.php
     *
     * @param string $text
     *
     * @return bool
     *
     */
    function ctype_upper($text)
    {
        return !empty($text) && !preg_match('/[^A-Z]/', $text);

    }

    /**
     * Returns TRUE if every character in text is a hexadecimal 'digit', that is a decimal digit or a character from [A-Fa-f] , FALSE otherwise.
     *
     * @see http://php.net/manual/en/function.ctype-xdigit.php
     *
     * @param string $text
     *
     * @return bool
     */
    function ctype_xdigit($text)
    {
        return !empty($text) && !preg_match('/[^A-Fa-f0-9]/', $text);

    }
}
