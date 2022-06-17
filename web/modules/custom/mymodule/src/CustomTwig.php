<?php

declare(strict_types = 1);


namespace Drupal\mymodule;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class CustomTwig extends AbstractExtension
{

  // Пользовательские фильтры

  // Метод возвращает массив объектов TwigFilter с именем и обратным вызовом в качестве аргументов конструктора
  public function getFilters(): array
  {
    return [
      new TwigFilter('replace_wth_x', [$this, 'replaceWithX']),
    ];
  }


  // Метод replaceWithX принимает входящий текст и просто заменяет все, что не является символом пробела, на букву x. Возвращаемое значение распечатывается в системе шаблонов Twig.
  public function replaceWithX($text): array|string|null
  {
    return preg_replace('/\S/', 'x', $text);
  }


  // Пользовательские функции

  // Метод должен вернуть массив объектов TwigFunction, которые имеют имя и обратный вызов в качестве аргументов конструктора
  public function getFunctions(): array
  {
    return [
      new TwigFunction('print_author', [$this, 'printAuthor']),
    ];
  }

  // Пользовательский метод, принимает объект узла, загружая автора узла и возвращая это значение
  public function printAuthor($node): string
  {
    // проверяем его правильный тип
    // if (!($node instanceof Node)) {
    //   return;
    // }
    // return $node->getOwner()->getDisplayName();

    return $node . ' node.';
  }

}
