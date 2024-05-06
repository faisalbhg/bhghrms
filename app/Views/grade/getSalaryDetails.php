                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                        <div class="card">
                            <?= form_open('get-grade-salary-details',array("autocomplete"=>"off","id"=>"updateAproval")); ?>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12" >
                                            <h4 class="card-title"><?=$salaryDetail['gradeName'];?></h4><br>
                                            <h6><?=$salaryDetail['companyName'];?></h6>
                                            <hr>
                                            <div class="basic-form">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="grade" value="<?=$salaryDetail['grade'];?>">
                                                <input type="hidden" name="budgetId" value="<?=$salaryDetail['budgetId'];?>">
                                                <input type="hidden" name="roleId" value="<?=$salaryDetail['roleId'];?>">
                                                <input type="hidden" name="companyId" value="<?=$salaryDetail['companyId'];?>">
                                                <input type="hidden" name="departmentId" value="<?=$salaryDetail['departmentId'];?>">
                                                <?php //echo '<pre>'; print_r($salaryDetail); echo '</pre>'; ?>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                        <label class="form-label">Min Salary</label>
                                                        <input type="number" name="salaryFrom" class="form-control" placeholder="" value="<?=$salaryDetail['salaryFrom'];?>">
                                                    </div>
                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                        <label class="form-label">Max Salary</label>
                                                        <input type="number" name="salaryTo" class="form-control" placeholder="" value="<?=$salaryDetail['salaryTo'];?>">
                                                    </div>
                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                        <label class="form-label">Min Basic Salary</label>
                                                        <input type="number" name="basicSalaryMin" class="form-control" placeholder="" value="<?=$salaryDetail['basicSalaryMin'];?>">
                                                    </div>
                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                        <label class="form-label">Max Basic Salary</label>
                                                        <input type="number" name="basicSalaryMax" class="form-control" placeholder="" value="<?=$salaryDetail['basicSalaryMax'];?>">
                                                    </div>

                                                    <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Joining Fare</label>
                                                        <select name="joiningFare" class="form-control">
                                                            <?php
                                                            foreach(config('SiteConfig')->joiningFare as $jfKey => $joiningFare)
                                                            {
                                                            ?>
                                                            <option value="<?=$jfKey;?>" <?php if($jfKey == $salaryDetail['joiningFare']){ ?>selected<?php } ?>><?=$joiningFare;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Air Ticket Frequency</label>
                                                        <select name="airTicketFreq" class="form-control">
                                                            <?php
                                                            foreach(config('SiteConfig')->airTicketFreq as $atfKey => $airTicketFreq)
                                                            {
                                                            ?>
                                                            <option value="<?=$atfKey;?>" <?php if($atfKey == $salaryDetail['airTicketFreq']){ ?>selected<?php } ?>><?=$airTicketFreq;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Air Ticket Entiltment</label>
                                                        <select name="airTicketEntilt" class="form-control">
                                                            <?php
                                                            foreach(config('SiteConfig')->airTicketEntilt as $atefKey => $airTicketEntilt)
                                                            {
                                                            ?>
                                                            <option value="<?=$atefKey;?>" <?php if($atefKey == $salaryDetail['airTicketEntilt']){ ?>selected<?php } ?>><?=$airTicketEntilt;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Health Insurance</label>
                                                        <select name="healthInsurance" class="form-control">
                                                            <?php
                                                            foreach(config('SiteConfig')->healthInsurance as $hifKey => $healthInsurance)
                                                            {
                                                            ?>
                                                            <option value="<?=$hifKey;?>" <?php if($hifKey == $salaryDetail['healthInsurance']){ ?>selected<?php } ?>><?=$healthInsurance;?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="foodallowance" type="checkbox" <?php if($salaryDetail['foodAllow']==1){ ?>checked<?php } ?> name="foodAllow" value="1">
                                                            <label class="form-check-label">
                                                                food Allowance
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="allowedFoodDiv" style="<?php if($salaryDetail['foodAllow']==1){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>" class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                        <label class="form-label">Allowed Food</label>
                                                        <input type="text" name="allowFood" class="form-control" placeholder="" value="<?=$salaryDetail['allowFood'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <h4 class="card-title">Salary Break Down</h4><br>
                                            <hr>
                                            <div class="table-responsive recentOrderTable">
                                                <table class="table table-striped table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Percentage</th>
                                                            <th scope="col">Fixed Amount</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach($salaryBreakdowns as $salaryBreakdown)
                                                        {
                                                            ?>
                                                            <tr>
                                                                <th>
                                                                    <?php //echo '<pre>'; print_r($salaryBreakdown); echo '</pre>';?>
                                                                    <?=$salaryBreakdown['description'];?></th>
                                                                <th><input type="number" class="form-control" value="<?=$salaryBreakdown['percentage'];?>" name="<?=str_replace(" ", "", $salaryBreakdown['description']);?>Per" /></th>
                                                                <th><input type="number" class="form-control" value="<?=$salaryBreakdown['fixedAmount'];?>" name="<?=str_replace(" ", "", $salaryBreakdown['description']);?>Fix" /></th>
                                                                
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="<?=base_url('gradeEdit/'.$salaryDetail['grade']);?>" class=" text-right badge badge-rounded badge-dark">close</a>
                                </div>
                            <?=form_close();?>
                        
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#foodallowance').click(function(){
                                        if($("#foodallowance").prop('checked') == true){
                                            $('#allowedFoodDiv').show();
                                        }
                                        else
                                        {
                                            $('#allowedFoodDiv').hide();
                                        }
                                    });
                                });
                            </script>
                        </div>
                    
                    