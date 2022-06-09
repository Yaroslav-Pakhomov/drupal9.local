<?php

declare(strict_types = 1);

/**
 * @file
 * Contains \Drupal\helloworld\Controller\HelloWorldController.
 * ^ Пишется по следующему типу:
 *  - \Drupal - это указывает что данный файл относится к ядру Drupal, ведь
 *    теперь там еще есть Symfony.
 *  - helloworld - название модуля.
 *  - Controller - тип файла. Папка src опускается всегда.
 *  - HelloWorldController - название нашего класса.
 */

/**
 * Пространство имен нашего контроллера. Обратите внимание что оно схоже с тем
 * что описано выше, только опускается название нашего класса.
 */

namespace Drupal\helloworld\Controller;

/**
 * Используем друпальный класс ControllerBase.
 */

use Drupal\Core\Controller\ControllerBase;

/**
 * Объявляем наш класс-контроллер.
 */
class HelloWorldController extends ControllerBase
{

  /**
   *
   * В Drupal 8 очень многое строится на renderable arrays и при отдаче
   * из данной функции содержимого для страницы, мы также должны вернуть
   * массив который спокойно пройдет через drupal_render().
   */
  public function helloWorld(): array
  {
    $output = [];

    $output['#title'] = 'HelloWorld page title';

    $output['#markup'] = 'Hello World!';

    return $output;
  }

}
