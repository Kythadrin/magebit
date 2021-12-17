<?php

class errorpageController extends Controller
{
    private $pageTpl = '/src/Views/404page.tpl.php';

    public function __construct()
    {
        $this->view = new View();
    }

    public function loadPage()
    {
        $this->pageData['title'] = "404 error";

        $this->view->render($this->pageTpl, $this->pageData);
    }
}