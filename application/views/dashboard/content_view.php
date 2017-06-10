<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                
                <div class="panel-body">
                    <?php
                    $attributes = array('role' => 'form', 'id' => 'customerform', 'onsubmit' => 'return validateForm()');
                    echo form_open('dashboard/index', $attributes);
                    ?>
                    <div class="form-group">
                        <label>ร้าน</label>
                        <select class="form-control" id="customer-list" name="customer">
                            <?php
                            if($customerlist)
                            {

                              echo '<option value="0">เลือกร้าน</option>';

                                $province = '';
                                foreach($customerlist as $customer)
                                {
                                    if($province === $customer->PROVINCE)
                                    {
                                        //ignore share the same group
                                    }
                                    else if($province == '')
                                    {
                                        $province = $customer->PROVINCE;
                                        echo '<optgroup label="'.$province.'">';
                                    }
                                    else
                                    {
                                        echo '</optgroup>'; // close group
                                        $province = $customer->PROVINCE;
                                        echo '<optgroup label="'.$customer->PROVINCE.'">'; //new group
                                    }
                                    echo '<option value="'.$customer->CUSTOMER_ID.'">'.$customer->CUSTOMER_NAME.'</option>';
                                }
                                echo '</optgroup>'; // close last group
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="เลือก">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($customerid))
    {
    ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
              รายละเอียดร้านค้า
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <label>รหัสร้าน</label>
                      <p class="form-control-static"><?php echo $customerdetail->CUSTOMER_ID; ?></p>
                  </div>
                  <div class="form-group">
                      <label>ชื่อร้าน</label>
                      <p class="form-control-static"><?php echo $customerdetail->CUSTOMER_NAME; ?></p>
                  </div>
                  <div class="form-group">
                      <label>ที่อยู่</label>
                      <p class="form-control-static"><?php echo $customerdetail->ADDRESS1.' '.$customerdetail->ADDRESS2.' '.$customerdetail->ADDRESS3.' '.$customerdetail->ZIPCODE  ?></p>
                  </div>
                  <div class="form-group">
                      <label>เบอร์โทร</label>
                      <p class="form-control-static"><?php echo $customerdetail->TELEPHONE_NUMBER; ?></p>
                  </div>
                  <div class="form-group">
                      <label>ผู้ติดต่อ</label>
                      <p class="form-control-static"><?php echo $customerdetail->CONTACT; ?></p>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                รายละเอียดใบแจ้งหนี้
            </div>
            <div class="panel-body">
              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-customer-data">
                  <thead>
                      <tr>
                          <th class="text-center">เดือน-ปี</th>
                          <th class="text-center">มูลค่า</th>
                          <th class="text-center">ส่วนลด</th>
                          <th class="text-center">มูลค่าหลังหักส่วนลด</th>
                          <th class="text-center">VAT</th>
                          <th class="text-center">มูลค่าสูทธิ</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      if($invoicelist)
                      {
                        foreach($invoicelist as $invoice)
                        {
                          ?>
                          <tr class="odd">
                              <td class="text-center"><strong><?php echo $invoice->INVOICE_MONTH_YEAR; ?></strong></td>
                              <td class="text-right"><?php echo number_format($invoice->ItemAmount); ?></td>
                              <td class="text-right"><?php echo number_format($invoice->DiscountAmount); ?></td>
                              <td class="text-right"><?php echo number_format($invoice->TotalAmount); ?></td>
                              <td class="text-right"><?php echo number_format($invoice->VatAmount); ?></td>
                              <td class="text-right"><strong><?php echo number_format($invoice->NetAmount); ?></strong></td>
                          </tr>
                          <?php
                        }
                      }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
</div>
