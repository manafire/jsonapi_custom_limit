This module exists to get around the 50 page limit defined in the [JSON API](https://www.drupal.org/docs/8/modules/json-api) Drupal module by extending the EntityResource service and overriding a couple of classes and functions. There are plenty of valid points on why you would want to do this and why you shouldn't. See this [discussion](https://www.drupal.org/project/jsonapi/issues/2793233).

To use: 
Simply change **SIZE_MAX** in `src/Query/CustomOffsetPage.php` to whatever you'd like. I've set it to 500 here since I'm using the API internally.

In the future, may want to add this as a configurable option in the UI.
