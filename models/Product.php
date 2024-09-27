<?php
class Product extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('date');
    }

    public function transactionData(array $data)
    {
        $dateTime = date('Y-m-d H:i:s');
        $this->session->set_userdata('dateTime', $dateTime);

        $data['dateTime'] = $dateTime;

        $this->db->insert('transactions', $data);

        redirect("users/receipt");
    }

    public function getTransactionData($dateTime)
    {
        $this->db->where('dateTime', $dateTime);
        $query = $this->db->get('transactions');
        
        // Check if the query was successful
        if ($query->num_rows() > 0) {
            $transacDetails = $query->row();
            $data = array(
                'firstName' => $transacDetails->firstName,
                'lastName' => $transacDetails->lastName,
                'email' => $transacDetails->email,
                'address' => $transacDetails->address,
                'country' => $transacDetails->country,
                'state' => $transacDetails->state,
                'zip' => $transacDetails->zip,
                'paymentMethod' => $transacDetails->paymentMethod,
                'product' => $transacDetails->product,
                'totalTickets' => $transacDetails->totalTickets,
                'totalPriceAmount' => $transacDetails->totalPriceAmount
            );

            return $this->session->set_userdata($data);
        }

        return false;
    }
}
