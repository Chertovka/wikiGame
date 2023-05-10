<form action="" method="POST" enctype="multipart/form-data">
    <div class="grid gap-3 mb-12 md:grid-cols-1">
        <div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Введите свое
                    имя:</label>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="text" size="30" name="name" id="name">
            </div>
        </div>
        <input name="submit-form" value="true" hidden>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" value="Начать"
        ></button>
    </div>
</form>
