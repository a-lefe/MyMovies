<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Categorie;

class CategoryDAO extends DAO
{
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from category order by cat_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $category = array();
        foreach ($result as $row) {
            $id_category = $row['cat_id'];
            $category[$id_category] = $this->buildDomainObject($row);
        }
        return $category;
    }

    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \GoodieSotre\Domain\Categorie
     */
    protected function buildDomainObject($row) {
        $category = new Category();
        $category->set_cat_id($row['cat_id']);
        $category->set_cat_name($row['cat_name']);
        return $category;
    }
    /**
     * Returns an category matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MyMovies\Domain\Categorie|throws an exception if no matching article is found
     */
    public function find($id_category) {
        $sql = "select * from category where cat_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id_category));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("La categorie". $id."n'existe pas " );
    }
}