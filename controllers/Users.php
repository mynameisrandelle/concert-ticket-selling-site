<?php

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper
        $this->load->model('User'); // Load Model "User"
        $this->load->model('Product'); // Load Model "Product"
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('date');
    }

    public function index()
    {
        if ($this->input->post('register') == "Create Account")
            redirect("users/register");

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->User->loginAccount($email, $password);

        $this->load->view('Reservation/login');
    }

    public function register()
    {
        if ($this->input->post('login') == "Sign In")
            redirect("users/index");

        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[20]', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]', 'required');

        // Get user input (e.g., from a form)
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->form_validation->run()) {
            $this->User->registerAccount($username, $email, $password);
            redirect("users/index");
        }

        $this->load->view('Reservation/register');
    }

    public function dashboard()
    {
        if ($this->input->post('logout') == "Log Out") {
            $this->session->sess_destroy();
            redirect("users/index");
        }

        if ($this->input->post('buy')) {
            // putting data from the dashboard into a session
            $data = array(
                'price' => (int)$this->input->post('price'),
                'product' => $this->input->post('product'),
                'numTicket' => 1
            );
            $this->session->set_userdata($data);
            redirect("users/checkout");
        }

        $this->load->view('Reservation/dashboard');
    }

    public function checkout()
    {
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'state' => $this->input->post('state'),
            'zip' => $this->input->post('zip'),
            'paymentMethod' => $this->input->post('paymentMethod'),
            'product' => $this->session->userdata('product'),
            'totalTickets' => (int) $this->input->post('totalTickets'),
            'totalPriceAmount' => $this->session->userdata('price') * $this->input->post('totalTickets')
        );

        if ($this->input->post('checkout') == "Pay Now") {
            $this->Product->transactionData($data);
        }

        if ($this->input->post('dashboard') == "Back to Dashboard") {
            redirect("users/dashboard");
        }


        $this->load->view('Reservation/checkout');
    }


    public function receipt()
    {
        $dateTime = $this->session->userdata('dateTime');
        // Fetch transactions based on dateTime
        $transactions = $this->Product->getTransactionData($dateTime);

        // Store the transactions in the session
        $this->session->set_userdata($transactions);

        if ($this->input->post('back') == "back")
            redirect("users/dashboard");

        $this->load->view('Reservation/receipt');
    }
}
