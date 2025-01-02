<?php

namespace Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->loadView("home");
    }
}
