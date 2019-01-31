<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Faculty_model extends CI_Model
{

    public $table = 'tbl_faculty';
    public $column_order = array('fac_name_th', 'fac_name_en', 'fac_intro', 'fac_detail', 'fac_status', null); //set column field database for datatable orderable
    public $column_search = array('fac_name_th', 'fac_name_en'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    public $order = array('fac_id' => 'asc'); // default order

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();

    }

    //service_request table
    //Function to add record in table
    public function add_record($data)
    {
        $this->db->insert('tbl_faculty', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Function to Delete selected record from table
    public function delete_record($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_faculty');

    }

    // Function to update record in table
    public function update_record($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('tbl_faculty', $data)) {
            return true;
        } else {
            return false;
        }
    }
    //datatable
    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }
                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('fac_id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    //ajax
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    //normal
    public function get_all_course_limit($limit)
    {
        //$this->db->order_by('n_date_create','DESC');
        $query = $this->db->get_where('tbl_faculty', array('c_status' => '1'), $limit);
        return $query->result();
    }

    public function get_all_course()
    {
        $this->db->order_by('fac_id', 'asc');
        $this->db->order_by('c_id', 'asc');
        $query = $this->db->get_where('tbl_faculty', array('c_status' => '1'));
        return $query->result();
    }

    // Get Single list
    public function get_course_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_faculty');
        $this->db->where('c_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('n_date_create', 'DESC');
        $query = $this->db->get_where('_news', array('n_status' => '1'));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_total()
    {
        $this->db->where('n_status', '1');
        $this->db->from('_news');
        return $this->db->count_all_results();
    }

    /*TCAS */
    public function get_all_tcas()
    {
        $this->db->order_by('fac_id', 'asc');
        $this->db->order_by('c_id', 'asc');
        $query = $this->db->get('tbl_tcas_course');
        return $query->result();
    }

    //==================2
    public function getView(){
        $this->db->from('crud');
        $query = $this->db->get();
        return $qurey->result();
    }

    public function postNew($data){
        $this->db->insert('crud',$data);
        return $this->db->insert_id();
    }

    public function postUpdate($id,$data){
        $this->db->update('crud',$data,$id);
        return $this->db->affected_rows();
    }

    public function getDelte($id){
       $this->db->where('id',$id);
       $this->db->delete('crud'); 
    }

}
