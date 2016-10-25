<?php
namespace WP_CLI\Api\Util;

/**
 * Utilities function to array that isn't coverage by the PHP core.
 */
class ArrayUtil
{

    /**
     * Test if the array is associative.
     *
     * @param array $array The array to be tested.
     * @return boolean True, if is associative. False, otherwise.
     */
    public function isAssociative(array $array)
    {
        if (empty($array)) {
            return false;
        }
        
        return array_keys($array) !== range(0, count($array) - 1);
    }
}
