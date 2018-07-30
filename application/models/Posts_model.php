<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Posts_model extends CI_Model
    {

        public function getPosts() {
            $query = $this->db->get('posts');
            if($query->num_rows() > 0) {
                return $query->result();
            }
        }

        public function savePost($data) {
            return $this->db->insert('posts',$data);
        }
        public function getSinglePost($id) {
            $query = $this->db->get_where('posts',array('id' => $id));
            if($query->num_rows() > 0) {
                return $query->row();
            }
        }

        public function updatePost($data, $id) {
            return $this->db->where('id',$id)
                ->update('posts',$data);
        }

    }
?>