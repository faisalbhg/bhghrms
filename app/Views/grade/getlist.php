
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grade List</h4>
                                <!-- Large modal -->
                                <!-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Grade</button> -->
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Grade Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?= form_open('save-grade-salary-details',array("autocomplete"=>"off","id"=>"updateAproval")); ?>
                                                    <div class="card-body mt-0 pt-0">
                                                        <div class="row">
                                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                                                                <h4 class="card-title">Grade Details</h4>
                                                                <hr class="m-0 p-0">
                                                                <div class="row">
                                                                    <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                                        <label class="form-label">Grade Name</label>
                                                                        <input type="text" name="gradeName" class="form-control" placeholder="" value="">
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12" >
                                                                <h4 class="card-title">Salary Details</h4>
                                                                <hr class="m-0 p-0">
                                                                <div class="basic-form">
                                                                    <?= csrf_field() ?>
                                                                    <input type="hidden" name="grade" value="">
                                                                    <input type="hidden" name="budgetId" value="">
                                                                    <input type="hidden" name="roleId" value="">
                                                                    <input type="hidden" name="companyId" value="">
                                                                    <input type="hidden" name="departmentId" value="">
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                                            <label class="form-label">Min Salary</label>
                                                                            <input type="number" name="salaryFrom" class="form-control" placeholder="" value="">
                                                                        </div>
                                                                        <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                                            <label class="form-label">Max Salary</label>
                                                                            <input type="number" name="salaryTo" class="form-control" placeholder="" value="">
                                                                        </div>
                                                                        <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                                            <label class="form-label">Min Basic Salary</label>
                                                                            <input type="number" name="basicSalaryMin" class="form-control" placeholder="" value="">
                                                                        </div>
                                                                        <div class="mb-3 col-md-6 col-sm-6 col-xs-6 col-xss-6">
                                                                            <label class="form-label">Max Basic Salary</label>
                                                                            <input type="number" name="basicSalaryMax" class="form-control" placeholder="" value="">
                                                                        </div>

                                                                        <div class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                                            <label class="form-label">Joining Fare</label>
                                                                            <select name="joiningFare" class="form-control">
                                                                                <?php
                                                                                foreach(config('SiteConfig')->joiningFare as $jfKey => $joiningFare)
                                                                                {
                                                                                ?>
                                                                                <option value="<?=$jfKey;?>"><?=$joiningFare;?></option>
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
                                                                                <option value="<?=$atfKey;?>" ><?=$airTicketFreq;?></option>
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
                                                                                <option value="<?=$atefKey;?>" ><?=$airTicketEntilt;?></option>
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
                                                                                <option value="<?=$hifKey;?>" ><?=$healthInsurance;?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" id="foodallowance" type="checkbox" name="foodAllow" value="1">
                                                                                <label class="form-check-label">
                                                                                    food Allowance
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div id="allowedFoodDiv" class="mb-3 col-md-12 col-sm-12 col-xs-12 col-xss-12">
                                                                            <label class="form-label">Allowed Food</label>
                                                                            <input type="text" name="allowFood" class="form-control" placeholder="" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                <h4 class="card-title">Salary Break Down</h4>
                                                                <hr class="m-0 p-0">
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
                                                                            <tr>
                                                                                <td>Basic</td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="BasicPer" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="BasicFix" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Home Rent Allownace</td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="HomeRentAllownacePer" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="HomeRentAllownaceFix" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Transport Allownace</td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="TransportAllownacePer" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="TransportAllownaceFix" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Task Allowance</td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="TaskAllowancePer" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="TaskAllowanceFix" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Mobile Allowance</td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="MobileAllowancePer" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="MobileAllowanceFix" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Fuel Allowance</td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="FuelAllowancePer" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="FuelAllowanceFix" />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Food Allowance</td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="FoodAllowancePer" />
                                                                                </td>
                                                                                <td>
                                                                                    <input type="number" class="form-control" value="" name="FoodAllowanceFix" />
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                <?=form_close();?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-0">
                                <div class="table-responsive" id="gradeTableList">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>SL NO.</strong></th>
                                                <th><strong>GRADE</strong></th>
                                                <th><strong>COMPANY</strong></th>
                                                <th><strong></strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($grades as $key => $grade)
                                            {
                                                ?>
                                                <tr>
                                                    <td><strong><?=$key+1;?></strong></td>
                                                    <td><?=$grade['gradeName'];?></td>
                                                    <td><?=$grade['companyName'];?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <?php //echo '<pre>'; print_r($grade);echo '</pre>';?>
                                                            <a href="<?=base_url('gradeEdit/'.$grade['gradeID'].'/'.$grade['companyId']);?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-edit"></i></a>
                                                            <a href="<?=base_url('gradeDelete/'.$grade['gradeID']);?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                                
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

            