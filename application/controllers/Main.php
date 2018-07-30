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
            $data = $this->input->post();
            unset($data['submit']);
            $data['date_created'] = date('Y-m-d');
            //save data to DB
            $this->load->model('posts_model');
            if($this->posts_model->savePost($data)) {
                $this->session->set_flashdata('msg','Post saved successfully');
            } else {
                $this->session->set_flashdata('msg','Failed! Try again');
            }
            return redirect('main');
        }
    }

    public function update ($id){

        $this->load->model('posts_model');
        $post = $this->posts_model->getSinglePost($id);

        $this->loadHead();
        $this->load->view('update_view',array('post' => $post));
        $this->loadFoot();
    }

    public function change($id) {
        $this->form_validation->set_rules('title','Title','required|max_length[15]');
        $this->form_validation->set_rules('description','Description','required|max_length[350]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->update();
        } else {
            $data = $this->input->post();
            unset($data['submit']);
            $data['date_created'] = date('Y-m-d');
            //save data to DB
            $this->load->model('posts_model');
            if( $this->posts_model->updatePost($data,$id) ) {
                $this->session->set_flashdata('msg','Post updated successfully');
            } else {
                $this->session->set_flashdata('msg','Failed! Try again');
            }
            return redirect('main');
        }
    }

    public function view($id) {
        $this->load->model('posts_model');
        $post = $this->posts_model->getSinglePost($id);

        $this->loadHead();
        $this->load->view('view',array('post' => $post));
        $this->loadFoot();
    }

}