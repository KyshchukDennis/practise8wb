<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Практична №8 | Завдання 4</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
            background-color: #f0f2f5;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        h2 {
            color: #1c1e21;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .form-row {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        input {
            padding: 12px;
            border: 1px solid #ccd0d5;
            border-radius: 6px;
            font-size: 1rem;
        }

        button {
            padding: 12px;
            background: #1877f2;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #166fe5;
        }

        .result-box {
            margin-top: 25px;
            padding: 20px;
            background: #f8f9fa;
            border-left: 5px solid #1877f2;
            border-radius: 4px;
        }

        .label-text {
            font-weight: 600;
            color: #65676b;
            margin-bottom: -10px;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Завдання 4. Робота з рядками</h2>

        <form method="POST">
            <div class="form-row">
                <span class="label-text">Рядок e:</span>
                <input type="text" name="e" placeholder="Введіть перший текст..." required>

                <span class="label-text">Рядок f:</span>
                <input type="text" name="f" placeholder="Введіть другий текст..." required>

                <button type="submit" name="submit_task4">Виконати дії</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_task4'])) {
            // Одержуємо змінні типу String методом POST
            $e = (string) $_POST['e'];
            $f = (string) $_POST['f'];

            echo "<div class='result-box'>";

            // а) Вивести першу, потім другу
            echo "<p><strong>а) Перша (e), потім друга (f):</strong><br>";
            echo "Результат: " . $e . " " . $f . "</p>";

            echo "<hr style='border: 0; border-top: 1px solid #ddd;'>";

            // б) Вивести другу, потім першу
            echo "<p><strong>б) Друга (f), потім перша (e):</strong><br>";
            echo "Результат: " . $f . " " . $e . "</p>";

            echo "</div>";
        }
        ?>
    </div>

</body>

</html>