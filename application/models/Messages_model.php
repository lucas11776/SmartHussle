<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends CI_Model
{

    /**
     * Model table name
     * 
     * @var string
     */
    public const TABLE = 'messages';

    /**
     * Insert message in database
     * 
     * @param   array
     * @return  boolean
     */
    public function insert (array $data)
    {
        return $this->crud->table(self::TABLE)->insert($data);
    }

    /**
     * Get messages from database
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
     * Search for messages in database
     * 
     * @param   string
     * @param   integer
     * @param   integer
     * @return  array
     */
    public function search (string $like, int $limit = null, int $offset = null)
    {
        return $this->crud->table(self::TABLE)->search($like, $like, $offset);
    }

    /**
     * Count number of get or search  result
     * 
     * @param   array
     * @param   boolean
     * @return  integer
     */
    public function count (array $data = null, bool $search = false)
    {
        return $this->crud->table(self::TABLE)->count($data ?? [], $search);
    }

    /**
     * Delete message in database
     * 
     * @param   array
     * @return  boolean
     */
    public function delete (array $where)
    {
        return $this->crud->table(self::TABLE)->delete($where);
    }

}
