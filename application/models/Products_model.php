<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{
    
    /**
     * Model table name
     * 
     * @var string
     */
    public const TABLE = 'products';

    /**
     * Product picture extension
     * 
     * @var array
     */
    public const PICTURE_EXTENSION = ['jpg','png'];

    /**
     * Maximum picture size in kbs
     * 
     * @var integer
     */
    public const MAX_PICTURE_SIZE = 1024;

    /**
     * Minimum product picture width
     * 
     * @var integer
     */
    public const MIN_PICTURE_WIDTH = 400;

    /**
     * Minimun product picture hieght
     * 
     * @var integer
     */
    public const MIN_PICTURE_HEIGHT = 400;

    /**
     * Upload picture dir/path
     * 
     * @var string
     */
    public const PICTURE_PATH = 'uploads/';

    /**
     * Inset product in database
     * 
     * @param   array
     * @return  boolean
     */
    public function insert (array $data)
    {
        return $this->crud->table(self::TABLE)->insert($data);
    }

    /**
     * Get product from database
     * 
     * @param   array
     * @param   integer
     * @param   integer
     * @return  boolean
     */
    public function get (array $where = null, int $limit = null, int $offset = null)
    {
        return $this->crud->table(self::TABLE)->get($where, $limit, $offset);
    }

    /**
     * Check if product exist in database
     * 
     * @param   string
     * @return  boolean
     */
    public function product_exist (string $product)
    {
        return $this->crud->table(self::TABLE)->exist(['name' => $product]);
    }

    /**
     * Search for a product in database
     * 
     * @param   array
     * @param   integer
     * @param   integer
     * @return  array
     */
    public function search (array $like, int $limit = null, int $offset = null)
    {
        return $this->crud->table(self::TABLE)->search($like, $like, $offset);
    }

    /**
     * Count number of get or search results
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
     * Detele product in database
     * 
     * @param   array
     * @return  boolean
     */
    public function delete (array $where)
    {
        return $this->crud->table(self::TABLE)->delete($where);
    }

}