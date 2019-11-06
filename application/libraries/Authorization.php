<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends DB_crud
{

    /**
     * Application roles
     * 
     * @var array
     */
    public const ROLE = ['guest' => 0, 'user' => 1, 'administratore' => 2];

    /**
     * User accounts table
     * 
     * @var string
     */
    public const TABLE = 'users';

    /**
     * User account
     * 
     * @var array
     */
    protected $user_account = [];

    /**
     * Get uid form session and get user account from database
     * 
     * @return void
     */
    public function __construct ()
    {
        // parant construct call
        parent::__construct();
        // load session library
        $this->CI->load->library('session');
        $account = ['uid' => $this->CI->session->userdata('uid')];
        $this->user_account = $this->table(self::TABLE)->get($account)[0] ?? [];
    }

    /**
     * Get user account
     * 
     * @param   string
     * @return  array
     */
    public function account (string $field = null)
    {
        if ($field !== null) {
            $field = strtolower($field);
            return isset($this->user_account[$field]) ? $this->user_account[$field] : null;
        }
        return $this->user_account;
    }

    /**
     * Check if user is guest
     * 
     * @param   boolean
     * @return  boolean
     */
    public function guest (bool $redirect = true)
    {
        $allowed = ($this->account('role') ?? 0) != self::ROLE['guest'];
        if ($redirect && $allowed === false) {
            redirect('');
        }
        return $allowed;
    }

    /**
     * Check if user is logged in
     * 
     * @param   boolean
     * @return  boolean
     */
    public function user (bool $redirect = true)
    {
        $allowed = ($this->account('role') ?? 0) >= self::ROLE['user'];
        if ($redirect && $allowed === false) {
            redirect('login');
        }
        return $allowed;
    }

    /**
     * Check if user user is administrator
     * 
     * @param   boolean
     * @return  boolean
     */
    public function administrator (bool $redirect = false)
    {
        $allowed = ($this->account('role') ?? 0) >= self::ROLE['administrator'];
        if ($redirect && $allowed === false) {
            redirect('');
        }
        return $allowed;
    }

}
