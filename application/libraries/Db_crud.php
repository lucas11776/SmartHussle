<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DB_Crud
{   
    
    /**
     * CodeIgniter database object
     * 
     * @var object
     */
    public $db;

    /**
     * CodeIgniter super global
     * 
     * @var object
     */
    protected $CI;

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
     * Select table cols
     * 
     * @param   string
     * @return  object
     */
    public function select (string $select)
    {
        $this->db->reset_query();
        $this->db->select($select);
        return $this;
    }

    /**
     * Join to tables
     * 
     * @param   string
     * @param   string
     * @return  object
     */
    public function join (string $table, string $join, string $type = 'LEFT')
    {
        $this->db->join($table, $join, $type);
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
        $this->db->reset_query();
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
        for ($i = 0; $i < count($where ?? []); $i++) {
            if ($i === 0) $this->db->where(array_keys($where)[$i], array_values($where)[$i]);
            else $this->db->or_where(array_keys($where)[$i], array_values($where)[$i]);
        }
        return $this->db//->order_by($this->db_table . '.created', 'DESC')
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
        $this->db->reset_query();
        $this->like($data);
        return $this->db->order_by($this->db_table . '.created', 'DESC')
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
    public function count (array $data = null, bool $search = false)
    {
        $this->db->reset_query();
        if ($search) $this->like($data ?? []);
        else $this->db->where($data ?? []);
        return $this->db->count_all_results($this->db_table, $data);
    }

    /**
     * Check if record exist in database
     * 
     * @param   array
     * @return  boolean
     */
    public function exist (array $where)
    {
        for ($i = 0; $i < count($where); $i++) {
            if ($i === 0) $this->db->where(array_keys($where)[$i], array_values($where)[$i]);
            else $this->db->or_where(array_keys($where)[$i], array_values($where)[$i]);
        };
        return count($this->db->get($this->db_table)->result_array()) > 0 ? true : false;
    }

    /**
     * Delete record in databse
     * 
     * @param   array
     * @return  boolean
     */
    public function delete (array $where)
    {
        $this->db->reset_query();
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
        return $this->db->get($this->db_table)->results_array();
    }
}