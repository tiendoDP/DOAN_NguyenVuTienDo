<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $data['header_title'] = 'Contact';
        return View("client.components.contact", $data);
    }
}
