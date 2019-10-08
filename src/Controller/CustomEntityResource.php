<?php

namespace Drupal\jsonapi_custom_limit\Controller;

use Drupal\jsonapi\Controller\EntityResource;
use Drupal\jsonapi\Query\Filter;
use Drupal\jsonapi\Query\Sort;
use Drupal\jsonapi\ResourceType\ResourceType;
use Drupal\jsonapi_custom_limit\Query\CustomOffsetPage;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 * Overridden and extended from jsonapi module to get around the 50 results limit
 *
 */
class CustomEntityResource extends EntityResource {

  /**
   * Extracts JSON:API query parameters from the request.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object.
   * @param \Drupal\jsonapi\ResourceType\ResourceType $resource_type
   *   The JSON:API resource type.
   *
   * @return array
   *   An array of JSON:API parameters like `sort` and `filter`.
   */
  protected function getJsonApiParams(Request $request, ResourceType $resource_type) {
    if ($request->query->has('filter')) {
      $params[Filter::KEY_NAME] = Filter::createFromQueryParameter($request->query->get('filter'), $resource_type, $this->fieldResolver);
    }
    if ($request->query->has('sort')) {
      $params[Sort::KEY_NAME] = Sort::createFromQueryParameter($request->query->get('sort'));
    }
    if ($request->query->has('page')) {
      $params[CustomOffsetPage::KEY_NAME] = CustomOffsetPage::createFromQueryParameter($request->query->get('page'));
    } else {
      $params[CustomOffsetPage::KEY_NAME] = CustomOffsetPage::createFromQueryParameter(['page' => ['offset' => CustomOffsetPage::DEFAULT_OFFSET, 'limit' => CustomOffsetPage::SIZE_MAX]]);
    }

    return $params;
  }
}