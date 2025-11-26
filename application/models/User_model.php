<?php
class User_model extends CI_Model {

    public function email_exists($email) {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    public function create_user($email, $password_hash) {
        $data = [
            'email' => $email,
            'password' => $password_hash
        ];
        return $this->db->insert('users', $data);
    }

    public function check_login($email, $password) {
        $user = $this->db->get_where('users', ['email' => $email])->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
}
