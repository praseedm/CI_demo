<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function loadHead()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
    }

    public function loadFoot(){

        $this->load->view('templates/footer');
    }

    public function index () {
        $this->load->model('posts_model');
        $data['posts'] = $this->posts_model->getPosts();
        $this->loadHead();
        $this->load->view('main_view', $data);
        $this->loadFoot();
    }

    public function createPost () {
        $this->loadHead();
        $this->load->view('create_view');
        $this->loadFoot();
    }

    public function save(){
        $this->form_validation->set_rules('title','Title','required|max_length[15]');
        $this->form_validation->set_rules('description','Description','required|max_length[350]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->createPost();
        } else {
            echo 'sucess';
        }
    }

}