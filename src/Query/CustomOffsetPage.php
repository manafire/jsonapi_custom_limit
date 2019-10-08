<?php

namespace Drupal\jsonapi_custom_limit\Query;

use Drupal\jsonapi\Query\OffsetPage;

/**
 * Value object for containing the requested offset and page parameters.
 *
 * Overrides OffsetPage from the jsonapi module to get around the 50 results limit.
 *
 */
class CustomOffsetPage extends OffsetPage {

  /**
   * Max size.
   *
   * @var int
   */
  const SIZE_MAX = 500;

}
