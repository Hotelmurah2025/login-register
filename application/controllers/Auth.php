<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    public function index() {
        redirect('auth/login');
    }

    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->user_model->get_user_by_username($username);
            
            if ($user && password_verify($password, $user['password'])) {
                $user_data = array(
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($user_data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('login_error', 'Invalid username or password');
                redirect('auth/login');
            }
        }
    }

    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            if ($this->user_model->create_user($data)) {
                $this->session->set_flashdata('register_success', 'Registration successful. Please login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('register_error', 'Registration failed. Please try again.');
                redirect('auth/register');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata(['user_id', 'username', 'logged_in']);
        $this->session->set_flashdata('logout_success', 'You have been logged out successfully');
        redirect('auth/login');
    }
}
