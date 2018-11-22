<?php include('includes/header.php'); ?>

<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Deposits</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo site_url('/admin/users'); ?>">Transactions</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Deposits</a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-grid"></i>Deposit Listings
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body">
                        <?php if($this->session->flashdata('message')): ?>
                            <div class="alert alert-success">
                                <p><?=$this->session->flashdata('message')?></p>
                            </div>
                        <?php endif; ?>
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover" id="datatable_properties">
                            <thead>
                            <tr role="row" class="heading">
                                <th width="5%">User ID</th>
                                <th width="15%">First Name</th>
                                <th width="15%">Last Name</th>
                                <th width="10%">Amount</th>
                                <th width="10%">Date Requested</th>
                                <th width="10%">Date Received</th>
                                <th width="15%">Status</th>
                                <th width="15%">
                                     Actions
                                </th>
                            </tr>
                            <tr role="row" class="filter">     
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][user]">
                                </td> 
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][first_name]">
                                </td>                                                  
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][last_name]">
                                </td>                                                  
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][amount]">
                                </td>    
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][date_deposit]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][date_approved]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][status]">
                                </td>                                                                
                                <td>
                                    <div class="margin-bottom-5">
                                        <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                                        <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                    </div>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
            <!-- END PAGE CONTENT-->
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script>
var base_url = '<?php echo site_url(); ?>';

function deleteProperty(id)
{
    var answer = confirm("Are you sure you want to delete this user?")
    if (answer) {
        //location.replace(base_url+'admin/categories/delete/'+id)

        $.ajax({
            url: base_url + 'admin/property/ajax/property_delete',
            type: 'post',
            data: {
                'id': id,
                '<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
            },
            dataType: 'json',
            success: function (data) {
                console.log(data)

                location.replace(base_url + 'admin/property/listings')
            }
        })
    }
    else {
        
    }
}

var Properties = function () {

    var handleProperty = function () {

        var grid = new Datatable();
        grid.setCsrfToken('<?=$this->security->get_csrf_token_name();?>', '<?=$this->security->get_csrf_hash();?>');
        grid.init({
            src: $("#datatable_properties"),
            onSuccess: function (grid) {
                // execute some code on network or other general error  
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            loadingMessage: 'Loading...',
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 
                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
                // So when dropdowns used the scrollable div should be removed. 
                //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

                "lengthMenu": [
                    [10, 20, 50, 100, 150],
                    [10, 20, 50, 100, 150] // change per page values here
                ],
                "pageLength": 10, // default record count per page
                "ajax": {
                    "url": base_url+"admin/transactions/action/get_all_deposits", // ajax source
                    
                },
                "order": [
                    [0, "desc"]
                ] // set first column as a default sort by asc
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleProperty();
        }
    };
}();

jQuery(document).ready(function() {
    Properties.init()

    $(document).on('click', '.btn-receive', function(e) {
        var answer = confirm("Are you sure you want to continue this process?")
        if (!answer) {
            e.preventDefault();
        }
    });

    $(document).on("change", "#select_status", function(e){
        var id = $(this).data("id");
        $("#deposit_form_"+id).submit();
    });



});
</script>