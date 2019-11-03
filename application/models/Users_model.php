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
     * Get user by username or email
     * 
     * @param   string
     * @param   array
     */
    public function user (string $user)
    {
        return $this->crud->table(self::TABLE)->get(['username' => $user, 'email' => $user])[0] ?? [];
    }

    /**
     * Insert user record in table
     * 
     * @param   array
     */
    public function insert (array $data)
    {
        return $this->crud->table(self::TABLE)->insert($data);
    }

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
        return $this->crud->table(self::TABLE)->exist(['email' => $email]);
    }

    /**
     * Check if email address exist in table
     * 
     * @param   string
     * @return  boolean
     */
    public function username_exist (string $username)
    {
        return $this->crud->table(self::TABLE)->exist(['username' => $username]);
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
