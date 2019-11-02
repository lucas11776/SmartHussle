<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_Crud
{
    /**
     * CodeIgniter super global
     * 
     * @var object
     */
    protected $CI;

    /**
     * CodeIgniter database object
     * 
     * @var object
     */
    protected $db;

    /**
     * Database table
     * 
     * @var string
     */
    private $db_table;
    
    public function __construct ()
    {
        $this->CI =& get_instance();
        // load dependency
        $this->CI->load->database();
        // load dababse class
        $this->db = $this->CI->db;
    }

    /**
     * Select database table
     * 
     * @param   string
     * @return  object
     */
    public function table (string $table)
    {
        $this->db_table = $table;
        return $this;
    }

    /**
     * Insert data in table
     * 
     * @param   array
     * @return  boolean
     */
    public function insert (array $data)
    {
        return $this->db->insert($this->db_table, $data);
    }

    /**
     * Get records from table in database
     * 
     * @param   array
     * @param   integer
     * @param   integer
     * @return  array
     */
    public function get (array $where = null, int $limit = null, int $offset = null)
    {
        return $this->db->where($where === null ? [] : $where)
                        ->order_by('created', 'DESC')
                        ->get($this->db_table, $limit, $offset)
                        ->result_array();
    }

    /**
     * Search table
     * 
     * @param   array
     * @param   integer
     * @param   integer
     * @return  array
     */
    public function search (array $like = [], int $limit = null, int $offset = null)
    {
        $this->like($data);
        return $this->db->order_by('created', 'DESC')
                        ->get($this->db_table, $limit, $offset)
                        ->result_array();
    }

    /**
     * Count number of result in database
     * 
     * @param   array
     * @param   boolean
     * @return  integer
     */
    public function count (array $data, bool $search = false)
    {
        if ($search) $this->like($data);
        else $this->db->where($data);
        return $this->db->count_all_results($this->db_table, $data);
    }

    /**
     * Delete record in databse
     * 
     * @param   array
     * @return  boolean
     */
    public function delete (array $where)
    {
        return $this->db->where($where)
                        ->delete($this->db_table);
    }

    /**
     * Make like query CodeIgniter db object
     * 
     * @param   array
     */
    protected function like (array $like)
    {
        for ($i = 0; $i < count($like); $i++) {
            if ($i === 0) $this->db->like(array_keys($like)[$i], array_values($like)[$i]);
            else $this->db->or_like(array_keys($like)[$i], array_values($like)[$i]);
        }
        return $this;
    }
}