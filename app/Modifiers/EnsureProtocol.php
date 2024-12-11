<?php

namespace App\Modifiers;
use Statamic\Modifiers\Modifier;

class EnsureProtocol extends Modifier
{
  public function index($value, $params)
  {
    if (empty($value)) {
      return $value;
    }

    // If URL already has a protocol, return as is
    if (preg_match('#^https?://#', $value)) {
      return $value;
    }

    // Default to https, or use first parameter if provided
    $protocol = $params[0] ?? 'https';

    // Remove any existing // at the start
    $value = ltrim($value, '/');

    return $protocol . '://' . $value;
  }
}
