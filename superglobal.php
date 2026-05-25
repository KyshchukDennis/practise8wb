<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Суперглобальні змінні PHP</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            line-height: 1.6;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        a {
            color: #3366cc;
            text-decoration: underline;
            font-style: italic;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .placeholder {
            color: #888;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <h1>Суперглобальні змінні PHP</h1>

    <!-- Список посилань як на скріншоті -->
    <ul>
        <li><a href="?var=GLOBALS">$GLOBALS</a></li>
        <li><a href="?var=SERVER">$_SERVER</a></li>
        <li><a href="?var=GET">$_GET</a></li>
        <li><a href="?var=POST">$_POST</a></li>
        <li><a href="?var=FILES">$_FILES</a></li>
        <li><a href="?var=COOKIE">$_COOKIE</a></li>
        <li><a href="?var=SESSION">$_SESSION</a></li>
        <li><a href="?var=REQUEST">$_REQUEST</a></li>
        <li><a href="?var=ENV">$_ENV</a></li>
    </ul>

    <?php
    // Отримуємо назву змінної з URL
    $selected = $_GET['var'] ?? null;

    if ($selected) {
        // Дані для таблиці (характеристики згідно з php.net)
        $info = [
            'GLOBALS' => [
                'name' => '$GLOBALS',
                'desc' => 'Асоціативний масив, що містить посилання на всі змінні, визначені в глобальній області видимості.',
                'val' => 'Кількість елементів: ' . count($GLOBALS)
            ],
            'SERVER' => [
                'name' => '$_SERVER',
                'desc' => 'Масив, що містить інформацію про заголовки, шляхи та місцезнаходження скриптів.',
                'val' => 'SERVER_PROTOCOL=' . $_SERVER['SERVER_PROTOCOL']
            ],
            'GET' => [
                'name' => '$_GET',
                'desc' => 'Асоціативний масив змінних, переданих скрипту через параметри URL.',
                'val' => empty($_GET) ? 'Порожньо' : print_r($_GET, true)
            ],
            'POST' => [
                'name' => '$_POST',
                'desc' => 'Асоціативний масив змінних, переданих скрипту через метод HTTP POST.',
                'val' => empty($_POST) ? 'Дані не передавались' : 'Елементів: ' . count($_POST)
            ],
            'FILES' => [
                'name' => '$_FILES',
                'desc' => 'Асоціативний масив елементів, завантажених у скрипт через метод POST.',
                'val' => 'Файлів завантажено: ' . count($_FILES)
            ],
            'COOKIE' => [
                'name' => '$_COOKIE',
                'desc' => 'Асоціативний масив змінних, переданих скрипту через HTTP Cookies.',
                'val' => 'Кількість кук: ' . count($_COOKIE)
            ],
            'SESSION' => [
                'name' => '$_SESSION',
                'desc' => 'Асоціативний масив, що містить змінні сесії, доступні для поточного скрипта.',
                'val' => 'Статус сесії: ' . session_status()
            ],
            'REQUEST' => [
                'name' => '$_REQUEST',
                'desc' => 'Асоціативний масив, що за замовчуванням містить дані $_GET, $_POST та $_COOKIE.',
                'val' => 'Загальна кількість даних: ' . count($_REQUEST)
            ],
            'ENV' => [
                'name' => '$_ENV',
                'desc' => 'Асоціативний масив змінних, переданих скрипту через змінні оточення.',
                'val' => 'Кількість змінних оточення: ' . count($_ENV)
            ]
        ];

        if (isset($info[$selected])) {
            $item = $info[$selected];
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Позначення змінної</th>
                        <th>Характеристика</th>
                        <th>Отримане значення</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['desc']; ?></td>
                        <td><?php echo $item['val']; ?></td>
                    </tr>
                </tbody>
            </table>
            <?php
        }
    } else {
        echo '<p class="placeholder">Натисніть на змінну вище, щоб побачити її характеристики.</p>';
    }
    ?>

</body>

</html>