<?php

declare(strict_types = 1);

/**
 * @file
 * Contains \Drupal\mymodule\Controller\HelloWorldController.
 * ^ Пишется по следующему типу:
 *  - \Drupal - это указывает что данный файл относится к ядру Drupal, ведь
 *    теперь там еще есть Symfony.
 *  - mymodule - название модуля.
 *  - Controller - тип файла. Папка src опускается всегда.
 *  - HelloWorldController - название нашего класса.
 */

/**
 * В пространстве имен контроллера опускается название нашего класса.
 */

namespace Drupal\mymodule\Controller;

/**
 * Используем друпальный класс ControllerBase.
 */

use Drupal\Core\Controller\ControllerBase;

class MyModuleController extends ControllerBase
{

  /**
   * {}
   *
   * В Drupal 8 очень многое строится на renderable arrays и при отдаче
   * из данной функции содержимого для страницы, мы также должны вернуть
   * массив который спокойно пройдет через drupal_render().
   */

  public function myModule(): array
  {
    $output = [];

    // $output['#title'] = 'My Module page title';

    $output['#markup'] = 'My Module Text!';

    return $output;
  }

}