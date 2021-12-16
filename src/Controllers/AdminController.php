<?php

class AdminController extends Controller 
{
    private $pageTpl = '/src/Views/admin.tpl.php';
    private $emailsPerPage = 5;
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

        $this->email = $_SESSION['email-search'];
        $this->sort = $_SESSION['sort'];
        $this->filter = $_SESSION['filter'];
        
        $this->displayEmail();

        $this->pageData['emails'] = $this->emails;
        $this->pageData['domains'] = $this->model->getDomains();

        $this->view->render($this->pageTpl, $this->pageData);
    }

    private function listenButtons() 
    {
        if (isset($_POST['search'])) {
            if ($_POST['email'] != '') {
                $_SESSION['email-search'] = $_POST['email'];
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
        $this->emails = $this->model->getEmails($this->email, $this->sort, $this->filter);

        $pages = ceil(count($this->emails) / $this->emailsPerPage);

        if ($_GET['page'] == '' || $_GET['page'] <= 1) $page = 1;
        elseif ($_GET['page'] >= $pages) $page = $pages;
        else $page = $_GET['page'];

        $this->pageData['pagination'] = $this->utils->drawPagination(count($this->emails), $this->emailsPerPage);

        $this->emails = array_slice($this->emails, ($page - 1) * $this->emailsPerPage, $this->emailsPerPage);
    }

    private function saveCSV()
    {
        $emails = $this->model->getEmails($this->email, $this->sort, $this->filter);

        $delimeter = ";";
        $filename = "subscriptions_" . date('Y-m-d') . ".csv";

        $f = fopen('php://memory', 'w');

        $fields = array('Email', 'Date');
        fputcsv($f, $fields, $delimeter);

        foreach ($emails as $email) {
            $data = array($email['email'], $email['date']);
            fputcsv($f, $data, $delimeter);
        }

        fseek($f, 0);

        header('Content-Type: txt/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        fpassthru($f);

        exit;
    }  
}