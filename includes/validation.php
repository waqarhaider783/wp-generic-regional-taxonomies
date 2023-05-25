<?php

/**
 * Validates the plugin's settings.
 * 
 * @author Waqar Haider <waqarhaider783@yahoo.com>
 * @since 0.0.1
 */
function validate_region_code($valid, $value)
{
  if (!$valid) return $valid;

  if (preg_match("/^[a-zA-Z]{2}$/u", $value) !== 1) {
    return __("Invalid region code. Please only use two (2) letters.");
  }

  return $valid;
}

/**
 * Converts the region code to lowercase before saving
 * 
 * @author Waqar Haider <waqarhaider783@yahoo.com>
 * @since 0.0.1
 */
function lowercase_region_code($value)
{
  return strtolower($value);
}
