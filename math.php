<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Завдання 2: Математичні обчислення</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            padding: 30px;
            background-color: #f4f4f4;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        h2 {
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .res {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .error {
            color: #d9534f;
            font-weight: bold;
        }

        code {
            background: #eee;
            padding: 2px 5px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Результати обчислень</h2>

            <?php
            // Отримуємо змінні з адресного рядка через GET та приводимо до цілого числа (Integer)
            if (isset($_GET['a']) && isset($_GET['b'])) {
                $a = (int) $_GET['a'];
                $b = (int) $_GET['b'];

                echo "<p>Введені числа: <b>a = $a</b>, <b>b = $b</b></p>";
                echo "<hr>";

                // Математичні операції
                $sum = $a + $b;
                $diff = $a - $b;
                $mult = $a * $b;

                echo "<div class='res'>Сума: $sum</div>";
                echo "<div class='res'>Різниця: $diff</div>";
                echo "<div class='res'>Добуток: $mult</div>";

                // Перевірка на ділення на нуль для частки
                if ($b !== 0) {
                    $div = $a / $b;
                    echo "<div class='res'>Частка: $div</div>";
                } else {
                    echo "<div class='res error'>Частка: на 0 ділити не можна!</div>";
                }

            } else {
                // Повідомлення, якщо параметри не вказані
                echo "<p class='error'>Змінні a та b не знайдено!</p>";
                echo "<p>Будь ласка, вкажіть їх в адресному рядку.</p>";
                echo "<p>Наприклад: <code>math.php?a=10&b=5</code></p>";
            }
            ?>
    </div>

</body>

</html>