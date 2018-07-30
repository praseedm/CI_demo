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
    }
?>