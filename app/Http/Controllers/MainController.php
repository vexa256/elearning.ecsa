<?php

namespace App\Http\Controllers;

class MainController extends Controller
{

    public function console()
    {

        $data = [
            'Page'  => 'console.console',
            'Title' => 'ECSA-HC Admin E-learning Platform Dashboard',
            'Desc'  => 'Administrator Account',
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);

    }

    public function CloudConsole()
    {

        $data = [
            'Page'  => 'f-dashboard.dashboard',
            'Title' => 'ECSA-HC  elearning  Dashboard ',
            'Desc'  => 'Student Account',
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('front', $data);

    }

}