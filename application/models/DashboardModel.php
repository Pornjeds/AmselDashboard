<?php
class DashboardModel extends CI_Model {

        // public $title;
        // public $content;
        // public $date;

        // public function get_last_ten_entries()
        // {
        //         $query = $this->db->get('entries', 10);
        //         return $query->result();
        // }

        // public function insert_entry()
        // {
        //         $this->title    = $_POST['title']; // please read the below note
        //         $this->content  = $_POST['content'];
        //         $this->date     = time();

        //         $this->db->insert('entries', $this);
        // }

        // public function update_entry()
        // {
        //         $this->title    = $_POST['title'];
        //         $this->content  = $_POST['content'];
        //         $this->date     = time();

        //         $this->db->update('entries', $this, array('id' => $_POST['id']));
        // }
    function get_customer_list()
    {
        $sql = 'SELECT TOP 1000 * FROM [SALEPRO].[dbo].[aArs_Cus]';

        $query = $this->db->query($sql);

        return $query->num_rows() > 0 ? $query->result() : false;
    }

}
?>