<?php

use App\Http\Controllers\Manager\LoginController;

test('login', function(string $login) {
    expect($login)->toHaveMethod('login');
})->with(LoginController::class);