<?php
	
	function calculate($statement) {
    if (!is_string($statement)) {
        return 'Ошибка входных даных';
    }
    $calcQueue = array();
    $operStack = array();
    $operPriority = array(
        '(' => 0,
        ')' => 0,
        '&' => 1,
        '|' => 1,
        '+' => 2,
        '-' => 2,
        '*' => 3,
        '/' => 3,
        ':' => 3,
        '%' => 3,
        '^' => 4,
    );
    $token = '';
    $lastchar = '';
    foreach (str_split($statement) as $char) {
        // Если цифра, то собираем из цифр число
        if ($char >= '0' && $char <= '9' || $char == '.') {
            $token .= $char;
        } else {
            // Если число накопилось, сохраняем в очереди вычисления
            if (strlen($token)) {
                array_push($calcQueue, $token);
                $token = '';
            }
            // Если найденный символ - операция (он есть в списке приоритетов)
            if (isset($operPriority[$char])) {
                if (')' == $char) {
                    // Если символ - закрывающая скобка, переносим операции из стека в очередь вычисления пока не встретим открывающую скобку
                    while (!empty($operStack)) {
                        $oper = array_pop($operStack);
                        if ('(' == $oper) {
                            break;
                        }
                        array_push($calcQueue, $oper);
                    }
                    if ('(' != $oper) {
                        // Упс! А открывающей-то не было. Сильно ругаемся (18+)
                        return 'Лишний оператор ")"';
                    }
                } else {
                    // Встретили операцию кроме скобки. Переносим операции с меньшим приоритетом в очередь вычисления
                    while (!empty($operStack) && '(' != $char) {
                        if (($lastchar < '0' || $lastchar > '9') && $char == '-') { 
                            array_push($calcQueue, '0'); 
                        }
                        $oper = array_pop($operStack);
                        if ($operPriority[$char] > $operPriority[$oper]) {
                            array_push($operStack, $oper);
                            break;
                        }
                        if ('(' != $oper) {
                            array_push($calcQueue, $oper);
                        }
                    }
                    // Кладем операцию на стек операций
                    array_push($operStack, $char);
                }
            } elseif (strpos(' ', $char) !== FALSE) {
                // Игнорируем пробелы (можно добавить что еще игнорируем)
            } else {
                // Встретили что-то непонятное (мы так не договаривались). Опять ругаемся
                return 'Неопределенный оператор "' . $char . '"';
            }
        }
				if ($char != ' ') $lastchar = $char;
    }
    // Вроде все разобрали, но если остались циферки добавляем их в очередь вычисления
    if (strlen($token)) {
        array_push($calcQueue, $token);
        $token = '';
    }
    // ... и оставшиеся в стеке операции
    if (!empty($operStack)) {
        while ($oper = array_pop($operStack)) {
            if ('(' == $oper) {
                // ... кроме открывающих скобок. Это верный признак отсутствующей закрывающей
                return 'Лишний оператор "("';
            }
            array_push($calcQueue, $oper);
        }
    }
    $calcStack = array();
    // Теперь вычисляем все то, что напарсили
    foreach ($calcQueue as $token) {
        switch ($token) {
        case '&':
            $arg2 = array_pop($calcStack);
            $arg1 = array_pop($calcStack);
            array_push($calcStack, (int)$arg1 & (int)$arg2);
            break;
        case '|':
            $arg2 = array_pop($calcStack);
            $arg1 = array_pop($calcStack);
            array_push($calcStack, (int)$arg1 | (int)$arg2);
            break;
        case '+':
            $arg2 = array_pop($calcStack);
            $arg1 = array_pop($calcStack);
            array_push($calcStack, $arg1 + $arg2);
            break;
        case '-':
            $arg2 = array_pop($calcStack);
            $arg1 = array_pop($calcStack);
            if ($arg1) array_push($calcStack, $arg1 - $arg2);
            else array_push($calcStack, -$arg2);
            break;
        case '*':
            $arg2 = array_pop($calcStack);
            $arg1 = array_pop($calcStack);
            array_push($calcStack, $arg1 * $arg2);
            break;
        case ':':
        case '/':
            $arg2 = array_pop($calcStack);
            $arg1 = array_pop($calcStack);
            if ($arg2 == 0) return 'Деление на ноль';
            else array_push($calcStack, $arg1 / $arg2);
            break;
        case '%':
            $arg2 = array_pop($calcStack);
            $arg1 = array_pop($calcStack);
            if ($arg2 == 0) return 'Деление на ноль';
            else array_push($calcStack, $arg1 % $arg2);
            break;
        case '^':
            $arg2 = array_pop($calcStack);
            $arg1 = array_pop($calcStack);
            if ($arg2 < 0) return 'Возведение в отрицательную степень';
            else array_push($calcStack, pow($arg1, $arg2));
            break;
        default:
            array_push($calcStack, $token);
        }
    }
    return array_pop($calcStack);
	}
	
	function Module($num, $cmd) {
		$cmd = preg_replace("/[^\d-+\/*():.^%\&\|]/", "", $cmd);
		if ($cmd[0] == ':' || $cmd[0] == '.' || $cmd[0] == '/' || $cmd[0] == '*') $cmd[0] = ' ';
		$ans = calculate($cmd);
		if ($ans != INF) return $ans;
		else return "Слишком сложнааа";
	}
	
?>