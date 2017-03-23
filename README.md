# Тестовое задание:
Написать скрипт, который можно запустить из командной строки, принимающий последовательность символов, и определяющий является ли введенная последовательность прогрессией. Решение выложить в публичный репозиторий.

# Результат:
Реализован алгоритм с худшей сложностью O(n), который проверяет является ли переданная последовательность символов (разделенных пробелом) арифмитической или геометрической прогрессией. Решение подготовлено в двух видах:

* isprogression_oop.php - реализация в стиле ооп
* isprogression_procedure.php - реализация в процедурном стиле

# Пример вызова:
* `php -f isprogression_procedure.php 1 2 3 4 5`
* `php -f isprogression_procedure.php 2 4 8 16`
* `php -f isprogression_oop.php 1 2 3 4 5`
* `php -f isprogression_oop.php 50 -25 12.5 -6.25`