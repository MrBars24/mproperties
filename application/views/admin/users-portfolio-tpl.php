<?php include('includes/header.php'); ?>

<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title"><?php echo $name ?></h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo site_url('/admin/users'); ?>">Users</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Portfolio</a>
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
                                <i class="icon-grid"></i><?php echo $name ?>
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
                                <th>Property</th>
                                <th>Property Price</th>
                                <th>Price/ SQ.FT.</th>
                                <th>Unit Invested</th>
                                <th>Amount Invested</th>
                                <th>Fund percentage</th>
                            </tr>
                            <tr role="row" class="filter">
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][property]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][valuation_price]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][sqft]">
                                </td>                                
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][unit_invested]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][amount]">
                                </td>
                                <td>

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

function deleteUser(id)
{
    var answer = confirm("Are you sure you want to delete this user?")
    if (answer) {
        //location.replace(base_url+'admin/categories/delete/'+id)

        $.ajax({
            url: base_url + 'admin/users/ajax/user_delete',
            type: 'post',
            data: {
                "id": id,
                '<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
            },
            dataType: 'json',
            success: function (data) {
                console.log(data)

                location.replace(base_url + 'admin/users')
            }
        })
    }
    else {
        
    }
}

var Users = function () {

    var handleUsers = function () {

        var grid = new Datatable();
      
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
                    "url": base_url+"admin/users/ajax/users_portfolio", // ajax source
                    "data": {
                        "<?=$this->security->get_csrf_token_name();?>" : "<?=$this->security->get_csrf_hash();?>",
                        "user_id" : <?php echo $user_id ?>
                    }
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
    Users.init();


    // when #select-action change
    $(document).on('change', '#select-action', function(e){
        var action = e.target.value;
        var user_id = e.target.dataset.id;
        switch(action){
            case "1":
                window.location.href = base_url + 'admin/users/form/'+user_id;
                break;
            case "2":
                window.location.href = base_url + 'admin/users/bank/details/'+user_id;
                break;
            case "3":
                window.location.href = base_url + 'admin/users/portfolio/details/'+user_id;
                break;
            case "4":
                window.location.href = base_url + 'admin/users/deposit/history/'+user_id;
                break;
            case "5":
                deleteUser(user_id);
                break;
        }

    });


});
</script>