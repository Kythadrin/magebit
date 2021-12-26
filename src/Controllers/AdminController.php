<?php

class AdminController extends Controller 
{
    private $pageTpl = '/src/Views/admin.tpl.php';
    private $emailsPerPage = 10;
    private $model;

    public function __construct()
    {
        $this->model = new AdminModel();
        $this->view = new View();
        $this->utils = new Utils();

        if (!isset($_SESSION['email-search'])) $_SESSION['email-search'] = '%';
        if (!isset($_SESSION['sort'])) $_SESSION['sort'] = 'date DESC';
        if (!isset($_SESSION['filter'])) $_SESSION['filter'] = '%';
    }

    public function loadPage()
    {
        $this->pageData['title'] = "Admin";
        
        $this->listenButtons();

        $_SESSION['emails'] = $this->model->getEmails($_SESSION['email-search'], $_SESSION['sort'], $_SESSION['filter']);

        $this->displayEmail();
        
        $this->pageData['domains'] = $this->model->getDomains();

        $this->view->render($this->pageTpl, $this->pageData);
    }

    private function listenButtons() 
    {
        if (isset($_POST['search'])) {
            if ($_POST['email'] != '') {
                $_SESSION['email-search'] = $_POST['email'];
            } else {
                $_SESSION['email-search'] = '%';
            }
            $_SESSION['sort'] = $_POST['sort'];
            $_SESSION['filter'] = $_POST['filter'];
        }

        if (isset($_POST['delete'])) {
            $this->model->deleteEmail($_POST['delete-email']);
        }

        if (isset($_POST['export'])) {
            $this->saveCSV();
        }
    }

    private function displayEmail()
    {
        $emails = $_SESSION['emails'];
        $pages = ceil(count($emails) / $this->emailsPerPage);

        if ($_GET['page'] == '' || $_GET['page'] <= 1) $page = 1;
        elseif ($_GET['page'] >= $pages) $page = $pages;
        else $page = $_GET['page'];

        $this->pageData['pagination'] = $this->utils->drawPagination(count($emails), $this->emailsPerPage);

        $this->pageData['emails'] = array_slice($emails, ($page - 1) * $this->emailsPerPage, $this->emailsPerPage);
    }

    private function saveCSV()
    {
        $delimeter = ";";
        $filename = "subscriptions_" . date('Y-m-d') . ".csv";

        $f = fopen('php://memory', 'w');

        $fields = array('Email', 'Date');
        fputcsv($f, $fields, $delimeter);

        foreach ($_POST['checkbox'] as $email) {
            $record = $this->model->getEmail($email);
            $data = array($record['email'], $record['date']);
            fputcsv($f, $data, $delimeter);
        }

        fseek($f, 0);

        header('Content-Type: txt/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        fpassthru($f);

        exit;
    }  
}