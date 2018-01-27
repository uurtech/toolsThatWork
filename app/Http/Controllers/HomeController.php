<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $info = array();
    public function index(){
        $this->info['tr']['title']="Online İşe Yarayan Araçlar";
        $this->info['en']['title']="Tools That Work";
        $this->info['tr']['action']="İşe Yarayan Araçlar";
        $this->info['en']['action']="Tools That work";
        $this->info['tr']['description']="Online ve ücretsiz kullanabileceğiniz araçlar.";
        $this->info['en']['description']="Online free tools that work for you";
        $this->info['tr']['page']="İşe Yarayan Araçlar";
        $this->info['en']['page']="Tools that work";
        return view("welcome",['info' => $this->info[\App::getLocale()]]);
    }

    public function About(){
        return "about";
    }

    public function Service(){
        return "service";
    }

    public function Request(){
        return "Request";
    }
}
