<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{

    /**
     * Model table name
     * 
     * @var string
     */
    public const TABLE = 'users';

    /**
     * Get users records
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
     * Check if email address exist in table
     * 
     * @param   string
     * @return  boolean
     */
    public function email_exist (string $email)
    {
        return count($this->get(['email' => $email])) > 0 ? true : false;
    }

    /**
     * Check if email address exist in table
     * 
     * @param   string
     * @return  boolean
     */
    public function username_exist (string $username)
    {
        return count($this->get(['username' => $username])) > 0 ? true : false;
    }

    /**
     * Get records by search results
     * 
     * @param   array
     * @param   integer
     * @param   integer
     * @return  array
     */
    public function search (array $data, int $limit = null, int $offset = null)
    {
        return $this->crud->table(self::TABLE)->search($data, $limit, $offset);
    }

    /**
     * Count number of result base on get or search
     * 
     * @param   array
     * @param   boolean
     * @return  integer
     */
    public function count (array $data, bool $search = false)
    {
        return $this->crud->table(self::TABLE)->count($data, $search);
    }

    /**
     * Delete record in database
     * 
     * @param   array
     * @return  boolean
     */
    public function delete (array $where)
    {
        return $this->crud->table(self::TABLE)->delete($where);
    }

}
