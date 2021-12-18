<?php

class IndexController extends Controller
{
    private $pageTpl = '/src/Views/main.tpl.php';
    private $model;
    private $errors = array();

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }

    public function loadPage()
    {
        $this->pageData['title'] = ".pineapple";

        if (isset($_POST['submit'])) { 
            if ($this->validateForm()) {
                if(!$_SESSION['js'] && $this->submitEmail()) {
                    $this->pageTpl = '/src/Views/sub-done.tpl.php';
                    $this->view->render($this->pageTpl, $this->pageData);
                    return 0;
                }
            }

            $this->pageData['errors'] = $this->errors;
        }

        $this->view->render($this->pageTpl, $this->pageData);
    }

    private function submitEmail()
    {
        $this->model->setEmail($_POST['email']);
        $this->model->setDate(date("y-m-d"));

        if ($this->model->checkEmail()) {
            $this->pageData['visible'] = 'false';
            $this->model->saveToDatabase();
            return true;
        } else {
            $this->pageData['email-exist'] = 'This email already subscribed!';  
            return false;
        }
    }

    private function validateForm()
    {
        $email = trim($_POST['email']);
        $checkbox = $_POST['terms'];
        $errors = false;

        if ($email != '') {
            $regex = '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,3}$/';

            if (!preg_match($regex, $email)) {
                $this->errors['regex'] = 'Please provide a valid e-mail address.';
                $errors = true;
            } else {
                if (strrchr($email, '.') == '.co') {
                    $this->errors['columbia'] = 'We are not accepting subscriptions from Colombia emails.';
                    $errors = true;
                }
            }
        } else {
            $this->errors['noemail'] = 'Email address is required.';
            $errors = true;
        }

        
        if ($checkbox == false) {
            $this->errors['checkbox'] = 'You must accept the terms and conditions.';
            $errors = true;
        }

        return $errors == true ? false : true;
    }
}