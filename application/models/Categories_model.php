<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model
{

    /**
     * Model table name
     * 
     * @var string
     */
    public const TABLE = 'categories';

    /**
     * Insert category in table
     * 
     * @param   array
     * @return  boolean
     */
    public function insert (array $data)
    {
        return $this->crud->table(self::TABLE)->insert($data);
    }

    /**
     * Get categories
     * 
     * @param   array
     * @param   integer
     * @param   integer
     * @return  array
     */
    public function get (array $where = null, int $limit = null, int $offset = null)
    {
        return $this->crud->table(self::TABLE)->get($where, $limit, $offset);
    }

    /**
     * Check if category exist
     * 
     * @param   string
     * @return  boolean
     */
    public function category_exist (string $category)
    {
        return $this->crud->table(self::TABLE)->exist(['slug' => $category, 'name' => $category]);
    }

    /**
     * Count number of category in table
     * 
     * @return  integer
     */
    public function count ()
    {
        return $this->crud->table(self::TABLE)->count();
    }

    /**
     * Delete category from table
     * 
     * @param   array
     * @return  boolean
     */
    public function delete (array $where)
    {
        return $this->crud->table(self::TABLE)->delete($where);
    }
    
}