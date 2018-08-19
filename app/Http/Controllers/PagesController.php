<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{

    public function getIndex() {
        return view('pages/welcome');
    }

    public function getAbout() {
        $first = 'Indra';
        $last = 'Arianggi';

        $full = $first . " " . $last;
        $email = "indraarianggi@gmail.com";

        $data = [
            'email' => $email,
            'fullname' => $full
        ];
        
        return view('pages/about', $data);
    }

    public function getContact() {
        return view('pages/contact');
    }
    
}

