<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="libs/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <div class="container">
        <h1 class="header-text">Пожалуйста, оставьте отзыв! Ваше мнение очень важно для нас.</h1>
    </div>
</header>
<main>
    <div class="container">
        <section class="form">
            <form action="/ajax.php" method="post" class="main-form">
                <table>
                    <tr>
                        <td><label for="fullName" class="label">Ваше ФИО</label></td>
                        <td><input type="text" class="text-input" name="fullName" id="fullName"
                                   placeholder="Введите ФИО..." value=""></td>
                    </tr>
                    <tr>
                        <td><label for="email" class="label">Ваш email</label></td>
                        <td><input type="email" class="text-input" name="email" id="email"
                                   placeholder="Введите ваш email..." value=""></td>
                    </tr>
                    <tr>
                        <td><label for="leadText" class="label">Ваше сообщение</label></td>
                        <td><textarea name="leadText" id="leadText" rows="5" placeholder="Введите текст сообщения..."
                                      class="big-text-input"></textarea></td>
                    </tr>
                </table>
                <button class="main-btn" type="submit" id="submit-btn">Добавить запись</button>
            </form>
        </section>
        <section class="leads">
            <?php
            foreach ($this->notes as $note):
                ?>
            <div class="panel">
                <div class="panel-header">
                    <span class="plain-text"><?php echo $note->fullName ?></span>
                    <span class="plain-text pull-right"><?php echo $note->email ?></span>
                </div>
                <div class="panel-body">
                    <p class="lead-text"><?php echo $note->leadText ?></p>
                </div>
            </div>
            <?
            endforeach;
            ?>
        </section>
    </div>
</main>
<script src="js/script.js"></script>
</body>
</html>