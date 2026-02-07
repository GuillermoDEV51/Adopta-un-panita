<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Users:\n";
$users = App\Models\User::all(['id', 'nombre', 'email', 'rol_id']);
foreach ($users as $user) {
    echo 'ID: '.$user->id.' | Name: '.$user->nombre.' | Email: '.$user->email.' | Role ID: '.$user->rol_id."\n";
}

echo "\nRoles:\n";
$roles = App\Models\Roles::all();
foreach ($roles as $role) {
    echo 'ID: '.$role->id.' | Name: '.$role->name."\n";
}
