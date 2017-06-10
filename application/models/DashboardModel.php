<?php
class DashboardModel extends CI_Model {

    function get_customer_list()
    {
      try
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
      catch(Exception $ex)
      {
        echo $ex->getMessage();
      }
    }

    function get_customer_by_customer_id($customerid)
    {
      try
      {
        $sql = "SELECT  C.[CusCd] CUSTOMER_ID,
                        C.[CusNam] CUSTOMER_NAME,
                        P.Province PROVINCE,
                    		C.[Addr1] ADDRESS1,
                    		C.[Addr2] ADDRESS2,
                    		C.[Addr3] ADDRESS3,
                    		C.[ZipCd] ZIPCODE,
                    		C.[Tel] TELEPHONE_NUMBER,
                    		C.[ConNam] CONTACT
                FROM [SALEPRO].[dbo].[aArs_Cus] C
                JOIN [SALEPRO].[dbo].[aSys_Province] P
                ON C.Province = P.Province_Id
                WHERE C.CusCd = '$customerid'
                ORDER BY P.Province, C.CusNam";

        $query = $this->db->query($sql);

        return $query->num_rows() > 0 ? $query->row() : false;
      }
      catch(Exception $ex)
      {
        echo $ex->getMessage();
      }
    }

    function get_invoice_by_customerid($customerid)
    {
      try
      {
        $sql = "SELECT [CusCd] CustomerID,
                			 SUM([ItmAmt]) ItemAmount,
                			 SUM([Disamt]) DiscountAmount,
                			 SUM([TltAmtI]) TotalAmount,
                			 SUM([VatAmt]) VatAmount,
                			 SUM([NetAmt]) NetAmount,
                			 YEAR([AddDat]) INVOICE_YEAR,
                			 MONTH([AddDat]) INVOICE_MONTH,
                			 CONCAT(MONTH([AddDat]),'-',YEAR([AddDat])) INVOICE_MONTH_YEAR
            	  FROM [SALEPRO].[dbo].[aArs_Invh] I
            	  WHERE CusCd = '$customerid'
            	  GROUP BY YEAR([AddDat]), MONTH([AddDat]), CONCAT(MONTH([AddDat]),'-',YEAR([AddDat])), I.CusCd
            	  ORDER BY YEAR([AddDat]) DESC, MONTH([AddDat]) DESC";

          $query = $this->db->query($sql);

          return $query->num_rows() > 0 ? $query->result() : false;
      }
      catch(Exception $ex)
      {
        echo $ex->getMessage();
      }
    }

    function get_customer_summary($customerid)
    {
      try
      {
        $sql = "SELECT [CusNam] CustomerName,
                			 SUM([ItmAmt]) ItemAmount,
                			 SUM([Disamt]) DiscountAmount,
                			 SUM([TltAmtI]) TotalAmount,
                			 SUM([VatAmt]) VatAmount,
                			 SUM([NetAmt]) NetAmount
            	  FROM [SALEPRO].[dbo].[aArs_Invh] I
            	  WHERE CusCd = '$customerid'
            	  GROUP BY I.CusCd, I.CusNam";

        $query = $this->db->query($sql);

        return $query->num_rows() > 0 ? $query->result() : false;
      }
      catch(Exception $ex)
      {
        echo $ex->getMessage();
      }
    }
}
?>
