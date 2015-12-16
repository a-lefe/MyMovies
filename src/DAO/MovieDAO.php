<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Movie;

class MovieDAO extends DAO
{
    
    private $categoryDAO;
    
    public function setCategoryDAO(CategoryDAO $categoryDAO) {
        $this->categoryDAO = $categoryDAO;
    }
    /**
     * Return a list of all movies.
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from movie order by mov_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $movies = array();
        foreach ($result as $row) {
            $id_movie = $row['mov_id'];
            $movie[$id_movie] = $this->buildDomainObject($row);
        }
        return $movies;
    }
    
    
     public function findAllByCategorie($idCategory) {
        // The associated category is retrieved only once
        $category = $this->categoryDAO->find($idCategory);

        // idCategorie is not selected by the SQL query
        // The category won't be retrieved during domain objet construction
        $sql = "select * from movie where cat_id=? order by cat_id";
        $result = $this->getDb()->fetchAll($sql, array($idCategory));

        // Convert query result to an array of domain objects
        $movies = array();
        foreach ($result as $row) {
            $id_movie = $row['mov_id'];
            $movie = $this->buildDomainObject($row);
            // The associated category is defined for the constructed comment
            $movie->setCategory($category);
            $movies[$id_movie] = $movie;
        }
        return $movies;
    }

    /**
     * Creates a Movie object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \GoodieSotre\Domain\Produit
     */
    protected function buildDomainObject($row) {
        $movie = new Movie();  
        $movie->set_mov_id($row['mov_id']);
        $movie->set_mov_title($row['mov_title']);
        $movie->set_mov_descritpion_short($row['mov_description_short']);
        $movie->set_mov_descritpion_long($row['mov_description_long']);
        $movie->set_mov_director($row['mov_director']);
        $movie->set_mov_year($row['mov_year']);
        $movie->set_mov_image($row['mov_image']);
         
        return $movie;
    }
    /**
     * Returns an movie matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MyMovies\Domain\Produit|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from movie where mov_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("La categorie". $id."n'existe pas " );
    }
}