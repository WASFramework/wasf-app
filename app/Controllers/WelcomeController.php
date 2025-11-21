<?php
namespace App\Controllers;

use Wasf\Http\Request;
use Wasf\Http\Response;
use Wasf\View\Blade;
use Modules\Auth\Models\User;

class WelcomeController
{
    public function index(Request $request, Response $response)
    {
        return Blade::render('welcome');
    }
}
