<?php

namespace Drupal\mymodule;

/**
 * Class RandomMessageGenerator
 *
 * @package Drupal\mymodule
 */
class RandomMessageGenerator
{

  // Массив с сообщениями.
  private array $messages;

  /**
   * {}
   */
  public function __construct()
  {
    // Записываем сообщения в свойство.
    $this->setMessages();
  }

  /**
   * Здесь мы просто задаем все возможные варианты сообщений.
   */
  private function setMessages(): void
  {
    $this->messages = [
      'Lorem ipsum dolor sit amet, consecrate disciplining elite.',
      'Phasellus maximus tincidunt dolor et ultrices.',
      'Maecenas vitae nulla sed felis faucibus ultricies. Suspendisse potenti.',
      'In nec orci vitae neque rhoncus rhoncus eu vel erat.',
      'Donec suscipit consequat ex, at ultricies mi venenatis ut.',
      'Fusce nibh erat, aliquam non metus quis, mattis elementum nibh. Nullam volutpat ante non tortor laoreet blandit.',
      'Suspendisse et nunc id ligula interdum malesuada.',
    ];
  }

  /**
   * Метод, который возвращает случайную строку
   * @throws \Exception
   */
  public function getRandomMessage()
  {
    $random = random_int(0, count($this->messages));
    return $this->messages[$random];
  }

}
