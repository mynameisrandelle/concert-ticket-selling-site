<?php
class User extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function registerAccount($username, $email, $password)
    {
        //encrypt password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        );

        $this->db->insert('users', $data);

        redirect("users/index");
    }

    public function loginAccount($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');



        if ($query->num_rows() > 0) {
            $user = $query->row();
            // Verify password
            if (password_verify($password, $user->password)) {
                $data = array(
                    'username' => $user->username,
                    'email' => $user->email
                );
                $this->session->set_userdata($data);
                redirect("users/dashboard");
            }
        }
        return false; // Return false if login fails
    }
}
