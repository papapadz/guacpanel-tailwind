<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
class PageController extends Controller
{
    public function home()
    {
        return Inertia::render('Home');
    }

    
    public function terms()
    {
        return Inertia::render('Terms');
    }

    public function petList()
    {
        return Inertia::render('Admin/DCF/Pets/PetList');
    }
}
