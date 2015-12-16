<?php

namespace MyMovies\Domain;

class Movie 
{

    private $mov_id;
    private $mov_title;
    private $mov_descritpion_short;
    private $mov_descritpion_long;
    private $mov_director;
    private $mov_year;
    private $mov_image;
    private $category;

    public function get_mov_id() {
        return $this->mov_id;
    }

    public function set_mov_id($mov_id) {
        $this->mov_id = $mov_id;
    }
    
    public function get_mov_title() {
        return $this->mov_title;
    }

    public function set_mov_title($mov_title) {
        $this->mov_title = $mov_title;
    }

    public function get_mov_descritpion_short() {
        return $this->mov_descritpion_short;
    }

    public function set_mov_descritpion_short($mov_descritpion_short) {
        $this->mov_descritpion_short = $mov_descritpion_short;
    }
    
    public function get_mov_descritpion_long() {
        return $this->mov_descritpion_long;
    }

    public function set_mov_descritpion_long($mov_descritpion_long) {
        $this->mov_descritpion_long = $mov_descritpion_long;
    } 
    
    public function get_mov_director() {
        return $this->mov_director;
    }

    public function set_mov_director($mov_director) {
        $this->mov_director = $mov_director;
    }
    
    public function get_mov_year() {
        return $this->mov_year;
    }

    public function set_mov_year($mov_year) {
        $this->mov_year = $mov_year;
    }
    
     public function get_mov_image() {
        return $this->mov_image;
    }

    public function set_mov_image($mov_image) {
        $this->mov_image = $mov_image;
    }
    public function get_category() {
        return $this->category;
    }

    public function set_category(Category $category) {
        $this->category = $category;
    }
}