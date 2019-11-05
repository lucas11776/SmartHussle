<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model
{
    
    /**
     * Model table name
     * 
     * @var string
     */
    public const TABLE = 'orders';

    /**
     * Join products and orders table
     * 
     * @return  string
     */
    private function join_table()
    {
        return $this->products::TABLE.'.pid='.self::TABLE.'.pid';
    }

    /**
     * Insert order in database
     * 
     * @param   array
     * @return  boolean
     */
    public function insert (array $data)
    {
        return $this->crud->table(self::TABLE)->insert($data);
    }

    /**
     * Get orders records from database
     * 
     * @param   array
     * @param   integer
     * @param   integer
     * @return  boolean
     */
    public function get (array $where = null, int $limit = null, int $offset = null)
    {
        return $this->crud->table(self::TABLE)
                          ->join($this->products::TABLE, $this->join_table())
                          ->get($where, $limit, $offset);
    }

    /**
     * Search for order records in database
     * 
     * @param   array
     * @param   integer
     * @param   integer
     * @return  boolean
     */
    public function search (array $like, int $limit = null, int $offset = null)
    {
        return $this->crud->table(self::TABLE)
                          ->join($this->products::TABLE, $this->join_table())
                          ->search($where, $limit, $offset);
    }

    /**
     * Count number of result for get and search
     * 
     * @param   array
     * @param   boolean
     */
    public function count (array $where = null, bool $search = false)
    {
        return $this->crud->table(self::TABLE)
                          ->join($this->products::TABLE, $this->join_table())
                          ->count($where, $search);
    }

    /**
     * Delete order in database
     * 
     * @param   array
     * @return  boolean
     */
    public function delete (array $where)
    {
        return $this->crud->table(self::TABLE)->delete($where);
    }

}
