<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keywords" content="Кто быстрее дойдет до финишной страницы"/>
    <meta name="description" content="Игра Кто быстрее дойдет до финишной страницы"/>
    <title>Кто быстрее дойдет до финишной страницы</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto w-6/12">
    <?php if ($_SERVER['REQUEST_URI'] === '/'):?>
        <div class="flex justify-center m-2">
            <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"
               href="/?mode=entry">Открыть игру</a>
        </div>
   <? endif; ?>
    <div id="content">
        <?php echo $content; ?>
    </div>
</div>
</body>
</html>