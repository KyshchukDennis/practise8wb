<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Практична робота №8 | Денис Кищук</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px;
            background-color: #f8f9fa;
            color: #333;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border: 1px solid #eee;
        }

        h2 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            color: #007bff;
        }

        /* Стилі для списку та таблиці */
        ul {
            list-style-type: square;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            font-style: italic;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #e9ecef;
        }

        /* Стилі для форм */
        .form-group {
            margin-bottom: 15px;
        }

        input[type="number"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100px;
        }

        button {
            padding: 8px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .res-box {
            margin-top: 15px;
            padding: 15px;
            background: #f1f3f5;
            border-left: 5px solid #28a745;
        }
    </style>
</head>

<body>

    <h1>Лабораторна робота: PHP Суперглобальні змінні та Математика</h1>

    <!-- ЗАВДАННЯ 1: СУПЕРГЛОБАЛЬНІ ЗМІННІ -->
    <div class="section">
        <h2>Завдання 1. Суперглобальні змінні PHP</h2>
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
        $selected = $_GET['var'] ?? null;
        if ($selected) {
            $info = [
                'GLOBALS' => ['name' => '$GLOBALS', 'desc' => 'Масив, що містить посилання на всі змінні в глобальній області видимості.', 'val' => 'Елементів: ' . count($GLOBALS)],
                'SERVER' => ['name' => '$_SERVER', 'desc' => 'Інформація про заголовки, шляхи та місцезнаходження скриптів.', 'val' => 'Протокол: ' . $_SERVER['SERVER_PROTOCOL']],
                'GET' => ['name' => '$_GET', 'desc' => 'Змінні, передані через параметри URL.', 'val' => 'Кількість: ' . count($_GET)],
                'POST' => ['name' => '$_POST', 'desc' => 'Змінні, передані через метод HTTP POST.', 'val' => 'Кількість: ' . count($_POST)],
                'FILES' => ['name' => '$_FILES', 'desc' => 'Елементи, завантажені через HTTP POST.', 'val' => 'Файлів: ' . count($_FILES)],
                'COOKIE' => ['name' => '$_COOKIE', 'desc' => 'Змінні, передані через HTTP Cookies.', 'val' => 'Кук: ' . count($_COOKIE)],
                'SESSION' => ['name' => '$_SESSION', 'desc' => 'Змінні сесії, доступні для поточного скрипта.', 'val' => 'ID: ' . session_id()],
                'REQUEST' => ['name' => '$_REQUEST', 'desc' => 'Містить дані $_GET, $_POST та $_COOKIE.', 'val' => 'Разом: ' . count($_REQUEST)],
                'ENV' => ['name' => '$_ENV', 'desc' => 'Змінні середовища виконання.', 'val' => 'Елементів: ' . count($_ENV)]
            ];

            if (isset($info[$selected])) {
                $item = $info[$selected];
                echo "<table>
                        <tr><th>Позначення</th><th>Характеристика</th><th>Значення</th></tr>
                        <tr><td>{$item['name']}</td><td>{$item['desc']}</td><td>{$item['val']}</td></tr>
                      </table>";
            }
        }
        ?>
    </div>

    <!-- ЗАВДАННЯ 2: GET ЗАПИТ -->
    <div class="section">
        <h2>Завдання 2. Математика через GET</h2>
        <p>Спробуйте додати параметри в URL: <code>?a=10&b=5</code></p>
        <?php
        if (isset($_GET['a']) && isset($_GET['b'])) {
            $a = (int) $_GET['a'];
            $b = (int) $_GET['b'];
            echo "<div class='res-box'>";
            echo "Числа: a=$a, b=$b <br>";
            echo "Сума: " . ($a + $b) . " | Різниця: " . ($a - $b) . " | Добуток: " . ($a * $b);
            echo ($b != 0) ? " | Частка: " . ($a / $b) : " | На 0 ділити не можна";
            echo "</div>";
        }
        ?>
    </div>

    <!-- ЗАВДАННЯ 3: POST ЗАПИТ -->
    <div class="section">
        <h2>Завдання 3. Математика через POST</h2>
        <form method="POST">
            <div class="form-group">
                Число c: <input type="number" name="c" required>
                Число d: <input type="number" name="d" required>
                <button type="submit">Обчислити</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['c'])) {
            $c = (int) $_POST['c'];
            $d = (int) $_POST['d'];
            echo "<div class='res-box' style='border-left-color: #007bff;'>";
            echo "Результати (POST): <br>";
            echo "Сума: " . ($c + $d) . "<br>";
            echo "Різниця: " . ($c - $d) . "<br>";
            echo "Добуток: " . ($c * $d) . "<br>";
            echo ($d != 0) ? "Частка: " . ($c / $d) : "Помилка: ділення на нуль";
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>