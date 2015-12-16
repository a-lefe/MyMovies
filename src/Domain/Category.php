<?php

namespace MyMovies\Domain;

class Categorie 
{

    private $cat_id;
    private $cat_name;

    public function get_cat_id() {
        return $this->cat_id;
    }

    public function set_cat_id($cat_id) {
        $this->cat_id = $cat_id;
    }

    public function get_cat_name() {
        return $this->cat_name;
    }

    public function set_cat_name($cat_name) {
        $this->cat_name = $cat_name;
    }
}