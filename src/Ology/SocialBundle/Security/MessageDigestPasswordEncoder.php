<?php

namespace Ology\SocialBundle\Security;

use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder as BaseEncoder;

define('DRUPAL_HASH_COUNT', 15);
define('DRUPAL_MIN_HASH_COUNT', 7);
define('DRUPAL_MAX_HASH_COUNT', 30);
define('DRUPAL_HASH_LENGTH', 43);

/**
 * Description of MessageDigestPasswordEncoder
 *
 * @author Erwan
 */
class MessageDigestPasswordEncoder extends BaseEncoder {

    private $algorithm = 'sha512';
    
    // overwrite
    public function encodePassword($password, $setting) {
        // The first 12 characters of an existing hash are its setting string.
        $setting = substr($setting, 0, 12);

        if ($setting[0] != '$' || $setting[2] != '$') {
            return FALSE;
        }
        $count_log2 = $this->_password_get_count_log2($setting);
        // Hashes may be imported from elsewhere, so we allow != DRUPAL_HASH_COUNT
        if ($count_log2 < DRUPAL_MIN_HASH_COUNT || $count_log2 > DRUPAL_MAX_HASH_COUNT) {
            return FALSE;
        }
        $salt = substr($setting, 4, 8);
        // Hashes must have an 8 character salt.
        if (strlen($salt) != 8) {
            return FALSE;
        }

        // Convert the base 2 logarithm into an integer.
        $count = 1 << $count_log2;

        // We rely on the hash() function being available in PHP 5.2+.
        $hash = hash($this->algorithm, $salt . $password, TRUE);
        do {
            $hash = hash($this->algorithm, $hash . $password, TRUE);
        } while (--$count);

        $len = strlen($hash);
        $output = $this->_password_base64_encode($hash, $len);
        // _password_base64_encode() of a 16 byte MD5 will always be 22 characters.
        // _password_base64_encode() of a 64 byte sha512 will always be 86 characters.
        $expected = ceil((8 * $len) / 6);

        return (strlen($output) == $expected) ? substr($output, 0, DRUPAL_HASH_LENGTH) : FALSE;
    }

    public function isPasswordValid($encoded, $raw, $salt) {

        if ( substr($salt, 0, 3) == '$S$')
            $hash = $this->encodePassword($raw, $salt); // A normal Drupal 7 password using sha512.   
        else
            return FALSE;

        return ($hash && $encoded == $hash);
    }

    private function _password_get_count_log2($setting) {
        $itoa64 = $this->_password_itoa64();
        return strpos($itoa64, $setting[3]);
    }

    private function _password_itoa64() {
        return './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    }

    private function _password_base64_encode($input, $count) {
        $output = '';
        $i = 0;
        $itoa64 = $this->_password_itoa64();
        do {
            $value = ord($input[$i++]);
            $output .= $itoa64[$value & 0x3f];
            if ($i < $count) {
                $value |= ord($input[$i]) << 8;
            }
            $output .= $itoa64[($value >> 6) & 0x3f];
            if ($i++ >= $count) {
                break;
            }
            if ($i < $count) {
                $value |= ord($input[$i]) << 16;
            }
            $output .= $itoa64[($value >> 12) & 0x3f];
            if ($i++ >= $count) {
                break;
            }
            $output .= $itoa64[($value >> 18) & 0x3f];
        } while ($i < $count);

        return $output;
    }

}

?>
