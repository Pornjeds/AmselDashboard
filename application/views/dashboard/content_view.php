<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Primary Panel
                </div>
                <div class="panel-body">
                    <?php
                    $attributes = array('role' => 'form', 'id' => 'customerform');
                    echo form_open('dashboard/index', $attributes);
                    ?>
                    <div class="form-group">
                        <label>Selects</label>
                        <select class="form-control" id="customer-list">
                            <?php
                            if($customerlist)
                            {
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
                      <input type="submit" value="เลือก">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
