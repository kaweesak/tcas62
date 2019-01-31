<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Teacher_model extends CI_Model
{
    public $table = 'tbl_tcas_teacher';
    public $column_order = array('course_id', 'position', 'p_code', 'prefix', 'fullname', 'p_order', 'p_photo', 'p_status', null); //set column field database for datatable orderable
    public $column_search = array('fullname'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    public $order = array('teacher_id' => 'asc'); // default order
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //Function to add record in table
    public function add_teacher($data)
    {
        $this->db->insert('tbl_tcas_teacher', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Function to Delete selected record from table
    public function delete_teacher($id)
    {
        $this->db->where('teacher_id', $id);
        $this->db->delete('tbl_tcas_teacher');

    }

    // Function to update record in table
    public function update_teacher($data, $id)
    {
        $this->db->where('teacher_id', $id);
        if ($this->db->update('tbl_tcas_teacher', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_teachers()
    {
        //$this->db->order_by('p_order', 'ASC');
        //$query = $this->db->get_where('tbl_tcas_teacher', array('p_status' => '1'));

        return $this->db->get('tbl_tcas_teacher');
    }

    // Get Single list
    public function get_teacher_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_tcas_teacher');
        $this->db->where('teacher_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function update_file_data($data)
    {
        $this->db->where('id', $data['id']);
        unset($data['id']);
        $this->db->update('tbl_tcas_teacher', $data);
    }

    public function change_teacher_status($data)
    {
        $this->db->where('teacher_id', $data['id']);
        unset($data['id']);
        $this->db->update('tbl_tcas_teacher', $data);
    }
    //================ajax=============================
    private function _get_datatables_query()
    {
        //add custom filter here
        if ($this->input->post('cid')) {
            $this->db->where('course_id', $this->input->post('cid'));
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
        $this->db->where('teacher_id', $id);
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
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    //========================degree ===============================
    //Function to add record in table
    public function add_degree($data)
    {
        $this->db->insert('tbl_tcas_degree', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Function to Delete selected record from table
    public function delete_degree($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_tcas_degree');

    }

    // Function to update record in table
    public function update_degree($data, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('tbl_tcas_degree', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function get_detail_by_id($id)
    {
        $this->db->from('tbl_tcas_degree');
        $this->db->where('teacher_id', $id);
        $query = $this->db->get();

        return $query->row();
    }

}
