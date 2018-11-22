<?php include('includes/header.php'); ?>

<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Account Managers</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo site_url('/admin/users'); ?>">Account Managers</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Account Managers</a>
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
                                <i class="icon-grid"></i>Account Managers
                            </div> 
                            <div class="actions">
                                <a href="<?php echo site_url('admin/account-managers/form/0');?>" class="btn default yellow-stripe">
                                <i class="fa fa-plus"></i>
                                <span class="hidden-480">
                                Add New Account Manager </span>
                                </a>                               
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body">
                        <div class="table-container">
                            <?php if($this->session->flashdata()): ?>
                                <?php foreach($this->session->flashdata() as $flashdata): ?>
                                    <div class="alert alert-success">
                                        <?php echo $flashdata; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <table class="table table-striped table-bordered table-hover" id="datatable_users">
                            <thead>
                            <tr role="row" class="heading">
                                <th width="15%">User Name</th>
                                <th width="15%">First Name</th>
                                <th width="15%">Last Name</th>
                                <th width="15%">E-mail Address</th>
                                <th width="15%">
                                     Actions
                                </th>
                            </tr>
                            <tr role="row" class="filter">
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][username]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][first_name]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][last_name]">
                                </td>                                
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][email]">
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

function deleteAccountManager(id)
{
    var answer = confirm("Are you sure you want to delete this user?")
    if (answer) {
        //location.replace(base_url+'admin/categories/delete/'+id)

        $.ajax({
            url: base_url + 'admin/account-managers/ajax/amanager_delete',
            type: 'post',
            data: {
                'id': id,
                '<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
            },
            dataType: 'json',
            success: function (data) {
                console.log(data)
                
                location.replace(base_url + 'admin/account-managers')
            }
        })
    }
    else {
        
    }
}

var Users = function () {

    var handleUsers = function () {

        var grid = new Datatable();
        grid.setAjaxParam('<?=$this->security->get_csrf_token_name();?>', '<?=$this->security->get_csrf_hash();?>');
        grid.init({
            src: $("#datatable_users"),
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
                    "url": base_url+"admin/account-managers/ajax/get_all_users", // ajax source
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
            handleUsers();
        }
    };
}();

jQuery(document).ready(function() {
    Users.init()
});
</script>