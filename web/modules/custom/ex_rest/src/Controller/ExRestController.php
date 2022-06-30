<?php
/**
 * @file
 * Contains \Drupal\ex_rest\Controller\ExRestController.
 */
namespace Drupal\ex_rest\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller routines for ex_rest routes.
 */
class ExRestController extends ControllerBase {

  /**
   * Callback for `ex-rest/get.json` API method.
   */
  public function get_example( Request $request ) {
    $response['data'] = 'Return JSON data';
    $response['method'] = 'GET';
    return new JsonResponse( $response );
  }

  /**
   * Callback for `ex-rest/put.json` API method.
   */
  public function put_example( Request $request ) {
    $response['data'] = 'Return PUT data';
    $response['method'] = 'PUT';
    return new JsonResponse( $response );
  }

  /**
   * Callback for `ex-rest/post.json` API method.
   */
  public function post_example( Request $request ) {
    // This condition checks the `Content-type` and makes sure to
    // decode JSON string from the request body into array.
    if ( 0 === strpos( $request->headers->get( 'Content-Type' ), 'application/json' ) ) {
      $data = json_decode( $request->getContent(), TRUE );
      $request->request->replace( is_array( $data ) ? $data : [] );
    }
    $response['data'] = 'Return POST data';
    $response['method'] = 'POST';
    return new JsonResponse( $response );
  }

  /**
   * Callback for `ex-rest/delete.json` API method.
   */
  public function delete_example( Request $request ) {
    $response['data'] = 'Return Delete method';
    $response['method'] = 'DELETE';
    return new JsonResponse( $response );
  }
}