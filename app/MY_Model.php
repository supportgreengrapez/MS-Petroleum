<?php

class MY_Model extends CI_Model {
    const DB_TABLE = 'abstract';
    const DB_TABLE_PK = 'abstract';

    public function __construct()
        {
            parent::__construct();
            $this->db= $this->session->userdata('db_con');
        }
    
    /**
     * Create record.
     */
    protected function insert() {
        $this->created=date('Y-m-d H:i:s');
        $this->modified=date('Y-m-d H:i:s');
        $this->is_active=1;
        $this->db->insert($this::DB_TABLE, $this);
        $this->{$this::DB_TABLE_PK} = $this->db->insert_id();
    }
    
    /**
     * Update record.
     */
    protected function update() {
        $this->modified=date('Y-m-d H:i:s');
        $this->db->update($this::DB_TABLE, $this, array($this::DB_TABLE_PK=>$this->{$this::DB_TABLE_PK}));
    }
    
    /**
     * Populate from an array or standard class.
     * @param mixed $row
     */
    public function populate($row) {
        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
        $this->after_load();
    }
    
    /**
     * Load from the database.
     * @param int $id
     */
    public function load($id) {
        $query = $this->db->get_where($this::DB_TABLE, array(
            $this::DB_TABLE_PK => $id,
        ));
        $this->populate($query->row());
    }
    
    /**
     * After Load override
     * @param int $id
     */

    public function after_load(){
        return true;
    }

    /**
     * Delete the current record.
     */
    public function delete() {
        $this->db->delete($this::DB_TABLE, array(
           $this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK}, 
        ));
        unset($this->{$this::DB_TABLE_PK});

    }
    
    /**
     * Save the record.
     */
    public function save() {
        if (isset($this->{$this::DB_TABLE_PK})) {
            $this->update();
        }
        else {
            $this->insert();
        }
    }
    
    /**
     * Get an array of Models with an optional limit, offset.
     * 
     * @param int $limit Optional.
     * @param int $offset Optional; if set, requires $limit.
     * @return array Models populated by database, keyed by PK.
     */
    public function get($limit = 0, $offset = 0, $where=array()) {
        $where['is_active']=1;
        if ($limit) {
            $query = $this->db->get_where($this::DB_TABLE, $where, $limit, $offset);
        }
        else {
            $query = $this->db->get_where($this::DB_TABLE, $where);
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;
    }

    public function get_order_by($where,$order,$asc_desc)
    {
        $this->db->from($this::DB_TABLE);
        $this->db->where($where);
        $this->db->order_by($order, $asc_desc);
        $query = $this->db->get();

            return $query->result();

    }

    public function get_row($where)
    {
        $query = $this->db->get_where($this::DB_TABLE,$where);


        if($query->num_rows()>0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function single_feild($select,$where)
    {
        $this->db->select( $select );
        $this->db->from( $this::DB_TABLE );
        $this->db->where( $where );
        $qry = $this->db->get();
        $rr	=	$qry->row_array();

        return	$rr[$select];
    }

    function updateWhere($where, $data) {
        $this->db->from($this::DB_TABLE);
        $this->db->where($where);
        $this->db->update($this::DB_TABLE, $data);
    }

    public function check($select,$where)
    {
        $this->db->select( $select );
        $this->db->from( $this::DB_TABLE );
        $this->db->where( $where );
        $qry = $this->db->get();

        if($qry->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function like($like) {
        $this->db->from($this::DB_TABLE);
        $this->db->like($like);

        $qry = $this->db->get();
        return $qry->result();
    }

    public function sort($col,$sort,$where)
    {
        $this->db->from($this::DB_TABLE);
        $this->db->where($where);
        $this->db->order_by($col,$sort);
        $qry = $this->db->get();
        return $qry->result();
    }

}