<?php
class DashboardModel extends CI_Model {

    function get_customer_list()
    {
        $sql = 'SELECT C.[CusCd] CUSTOMER_ID, 
                       C.[CusNam] CUSTOMER_NAME,
                       P.Province PROVINCE
                FROM [aArs_Cus] C
                JOIN [aSys_Province] P
                ON C.Province = P.Province_Id
                ORDER BY P.Province, C.CusNam';

        $query = $this->db->query($sql);

        return $query->num_rows() > 0 ? $query->result() : false;
    }

}
?>