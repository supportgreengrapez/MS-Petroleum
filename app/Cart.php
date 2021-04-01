<?php

namespace App;
use Session;

class Cart extends MY_Model
{
 
    const DB_TABLE = 'api_offers';
    const DB_TABLE_PK = 'id';

    public $id;
    public $api;
    public $data;
    public $timestamp;
    public $query;
    public $created;
    public $modified;
    public $is_active;

    public function __construct()
    {
        parent::__construct();
    }


}

