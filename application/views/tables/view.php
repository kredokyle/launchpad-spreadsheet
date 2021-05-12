<?php
$this->session->set_userdata('referred_from', current_url());
?>

<body>
    <div class="float-left pl-2 pt-1"><a class="btn btn-success btn-sm" href="<?= base_url('home/index'); ?>" title="Back to Home">
            <i class="fas fa-home float-left pr-2"></i>
            <small class="float-left">Logged in: <?= $_SESSION['uname'] ?> (<?= $_SESSION['type'] ?>)</small>
        </a></div>
    <center>
        <h2 class="text-secondary mt-1"><?= $title ?> <small>(<?= $numRows ?> entries)</small></h2>
    </center>

    <form action="<?= base_url('table/sesFilter') ?>" method="POST" class="">
        <div class="row">
            <small class="col-md-1 text-right">Industry:</small>
            <div class="col-md-3">
                <input type="text" class="form-control mb-2" name="findustry" style="font-size: 11px" value="<?php if (isset($_SESSION['filterIndustry'])) echo $_SESSION['filterIndustry'] ?>">
            </div>
            <?php if ($title !== 'Archived') { ?>
                <div class="col-1"><a class="btn btn-outline-secondary btn-sm" onclick="return confirm('Are you sure you want to load all rows?')" href="<?= base_url('table/viewAll') ?>">View All</a></div>
            <?php } ?>
        </div>
        <div class="row">
            <small class="col-md-1 text-right">State:</small>
            <div class="col-md-3">
                <input type="text" class="form-control mb-2" name="fstate" style="font-size: 11px" value="<?php if (isset($_SESSION['filterState'])) echo $_SESSION['filterState'] ?>">
            </div>
            <div class="col-1"><input class="btn btn-primary btn-sm" type="submit" value="Go"></div>
        </div>
    </form>

    <?php if (!empty($_SESSION['filterIndustry']) || !empty($_SESSION['filterState'])) { ?>
        <hr>
        <div id="loading" class="text-center"><img src="http://indiawebsoft.com/images/loader1.gif" alt="Loading..."></div>
        <div id="table" style="display: none">
            <?php if (!empty($value)) { ?>
                <?php if ($title == 'Qualified') { ?>
                    <center><small><i>Individual column search on table footer</i></small></center>
                <?php } ?>
                <div id="exportFilename" class="ml-3  text-muted"></div>
                <table id="mainTable" class="compact nowrap display table-striped table-hover table-bordered" width="100%" style="font-size: 13px">
                    <thead class="thead-light">
                        <tr>
                            <td>&nbsp;</td>
                            <?php if ($title == 'Qualified') { ?>
                                <td>ID</td>
                            <?php } ?>
                            <!-- <th>Status</th> -->
                            <th class="duplifer-highlightdups">Phone Number</th>
                            <th>Job Title</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <!-- <th>County</th>
                    <th>Area</th> -->
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th>Company Name</th>
                            <th>Industry</th>
                            <th>SIC Code</th>
                            <th>NAICS Code</th>
                            <th>Employee Size</th>
                            <th>Annual Revenue</th>
                            <th>Website</th>
                            <!-- <th>Phone Number 2</th>
                    <th>Extension Number</th>
                    <th>Direct Line</th> -->
                            <th>Email</th>
                            <!-- <th>Mobile Number</th> -->
                            <th>Comments</th>
                            <!-- <th>DM Verified</th> -->
                            <!-- <th>Prof Completed</th> -->
                            <!-- <th>Mobile Number 2</th> -->
                            <td class="text-center">
                                <?php if ($title === 'o') { ?>
                                    <button onClick="saveNewData()" data-toggle="tooltip" title="Add" class="btn btn-xl fas fa-plus btn-outline-primary"></button>
                                <?php } else if ($title === 'Profiled') { ?>
                                    <button onClick="location.href='<?php echo site_url('/table/profiled'); ?>';" data-toggle="tooltip" title="Save" class="btn btn-xl fas fa-check btn-outline-primary"></button>
                                <?php } ?>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($value as $row) : ?>
                            <tr>
                                <?php if ($row['isEdited'] != NULL && $row['isQualified'] == NULL) { ?>
                                    <td class="bg-secondary"></td>
                                <?php } elseif ($row['isQualified'] == 1) { ?>
                                    <td class="bg-primary"></td>
                                <?php } elseif ($row['isQualified'] == 2) { ?>
                                    <td class="bg-success"></td>
                                <?php } else { ?>
                                    <td class="bg-light"></td>
                                <?php } ?>
                                <?php if ($title == 'Qualified') { ?>
                                    <td><?= $row['id'] ?></td>
                                <?php } ?>
                                <!-- <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'status', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'status', $(this).html(), event)"><?= $row["status"]; ?></td> -->
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'phone_number', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'phone_number', $(this).html(), event)"><?= $row["phone_number"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'job_title', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'job_title', $(this).html(), event)"><?= $row["job_title"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'first_name', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'first_name', $(this).html(), event)"><?= $row["first_name"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'last_name', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'last_name', $(this).html(), event)"><?= $row["last_name"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'address', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'address', $(this).html(), event)"><?= $row["address"]; ?></td>
                                <!-- <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'address_county', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'address_county', $(this).html(), event)"><?= $row["address_county"]; ?></td>
                    <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'address_area', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'address_area', $(this).html(), event)"><?= $row["address_area"]; ?></td> -->
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'address_city', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'address_city', $(this).html(), event)"><?= $row["address_city"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'address_state', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'address_state', $(this).html(), event)"><?= $row["address_state"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'address_zip', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'address_zip', $(this).html(), event)"><?= $row["address_zip"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'company_name', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'company_name', $(this).html(), event)"><?= $row["company_name"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'industry', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'industry', $(this).html(), event)"><?= $row["industry"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'sic_code', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'sic_code', $(this).html(), event)"><?= $row["sic_code"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'naics_code', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'naics_code', $(this).html(), event)"><?= $row["naics_code"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'employee_size', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'employee_size', $(this).html(), event)"><?= $row["employee_size"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'annual_revenue', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'annual_revenue', $(this).html(), event)"><?= $row["annual_revenue"]; ?></td>
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'website', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'website', $(this).html(), event)"><?= $row["website"]; ?></td>
                                <!-- <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'phone_number2', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'phone_number2', $(this).html(), event)"><?= $row["phone_number2"]; ?></td>
                    <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'extension_number', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'extension_number', $(this).html(), event)"><?= $row["extension_number"]; ?></td>
                    <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'direct_line', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'direct_line', $(this).html(), event)"><?= $row["direct_line"]; ?></td> -->
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'email', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'email', $(this).html(), event)"><?= $row["email"]; ?></td>
                                <!-- <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'mobile_number', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'mobile_number', $(this).html(), event)"><?= $row["mobile_number"]; ?></td> -->
                                <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'comment', $(this).html())" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'comment', $(this).html(), event)"><?= $row["comment"]; ?></td>
                                <!-- <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'dm_verified', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'dm_verified', $(this).html(), event)"><?= $row["dm_verified"]; ?></td>
                    <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'prof_completed', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'prof_completed', $(this).html(), event)"><?= $row["prof_completed"]; ?></td>
                    <td contenteditable="true" onBlur="saveData(this,<?= $row['id'] ?>, 'mobile_number2', $(this).html())" onFocus="showEdit(this)" onKeyDown="saveEnter(this,<?= $row['id'] ?>, 'mobile_number2', $(this).html(), event)"><?= $row["mobile_number2"]; ?></td> -->
                                <td class="text-center">
                                    <?php if ($_SESSION['type'] !== 'User' && $title === 'Main') { ?>
                                        <a onclick="deleteRow(<?= $row['id'] ?>)" data-toggle="tooltip" title="Delete row" class="text-danger w-100 h-100" style=""><i class="fas fa-trash-alt" style="width: 200px; height: 50px"></i></a>
                                    <?php } elseif ($title === 'Profiled') { ?>
                                        <select onchange=" isQualifiedSelect(<?= $row['id'] ?>, this.value)">
                                            <option></option>
                                            <option value="1">Q</option>
                                            <option value="0">DQ</option>
                                        </select>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-dark">
                            <td></td>
                            <?php if ($title == 'Qualified') { ?>
                                <td></td>
                            <?php } ?>
                            <!-- <th class="table-dark">Status</th> -->
                            <th class="table-dark">PhoneNumber</th>
                            <th class="table-dark">JobTitle</th>
                            <th class="table-dark">FirstName</th>
                            <th class="table-dark">LastName</th>
                            <th class="table-dark">Address</th>
                            <!-- <th class="table-dark">County</th>
                    <th class="table-dark">Area</th> -->
                            <th class="table-dark">City</th>
                            <th class="table-dark">State</th>
                            <th class="table-dark">Zip</th>
                            <th class="table-dark">CompanyName</th>
                            <th class="table-dark">Industry</th>
                            <th class="table-dark">SICCode</th>
                            <th class="table-dark">NAICSCode</th>
                            <th class="table-dark">EmployeeSize</th>
                            <th class="table-dark">AnnualRevenue</th>
                            <th class="table-dark">Website</th>
                            <!-- <th class="table-dark">PhoneNumber2</th>
                    <th class="table-dark">ExtensionNumber</th>
                    <th class="table-dark">DirectLine</th> -->
                            <th class="table-dark">Email</th>
                            <!-- <th class="table-dark">MobileNumber</th> -->
                            <th class="table-dark">Comments</th>
                            <!-- <th class="table-dark">DMVerified</th>
                    <th class="table-dark">ProfCompleted</th>
                    <th class="table-dark">MobileNumber2</th> -->
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <!-- } else { -->
                <!-- <div class='alert alert-danger text-center m-4 font-weight-bold'>No results found.</div> -->
            <?php } else { ?>
                <div class='alert alert-danger text-center m-4 font-weight-bold'>No results found.</div>
        <?php }
        } ?>
        </div>