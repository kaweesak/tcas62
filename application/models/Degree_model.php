<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Degree_model extends CI_Model
{
    public $table = 'tbl_tcas_degree';
    public $column_order = array('teacher_id', 'degree_name', 'complete_date', 'degree_shot', 'branch_success', 'university', null); //set column field database for datatable orderable
    public $column_search = array('branch_success', 'university'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    public $order = array('degree_id' => 'asc'); // default order
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

     public function get_degrees($id)
	{
	  return $this->db->get_where("tbl_tcas_degree",array('teacher_id' => $id));
    }

    //================ajax=============================
    private function _get_datatables_query()
    {
        //add custom filter here
        if ($this->input->post('cid')) {
            $this->db->where('teacher_id', $this->input->post('cid'));
        }

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
        $this->db->where('degree_id', $id);
        $query = $this->db->get();

        return $query->row();
    }

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
        $this->db->where('degree_id', $id);
        $this->db->delete($this->table);
    }

    public function get_detail_by_id($id)
    {
        $this->db->from('tbl_tcas_degree');
        $this->db->where('teacher_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

}
