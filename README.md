# Практика. Сайт кафедры информатики и вычислительной техники

Для установки и запуска проекта необходимо:

Скопирвать проект
Создать базу данных MySQL
Установить зависимости:
$ composer install
Собрать фронтенд:
$ npm run build
Переименовать файл .env.example в .env и прописать в нем данные для подключения к базе данных MySQL
Выполнить команду:
$ php artisan migrate
Через интерфейс tinker создать пользователя, создать роль с именем admin, 
привязать её к созданному пользователю (выполнить следующие команнды (>>> и $ в начале не вводить)):
$php artisan tinker
>>> $user = new \App\User();
>>> $user->name = 'test';
>>> $user->email = 'test@test.test';
>>> $user->password = Hash::make('testtest');
>>> $user->save();
>>> $role = new \App\Role();
>>> $role->name = 'admin';
>>> $role->save();
>>> $user->roles()->attach($role->id);
>>> $user->save();
>>> CTRL+C
Настроить вебсервер Apache на папку public

Возможно, сайт заработает (а может и нет)
