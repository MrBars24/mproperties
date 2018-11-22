<?php include('includes/header.php'); ?>

<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">Rental Collections</h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo site_url('/admin/property/listings'); ?>">Properties</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Rental Collections</a>
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
                                <i class="icon-grid"></i>Rental Collections
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
                                <?php foreach ($this->session->flashdata() as $flashdata):?>
                                    <div class="alert alert-success">
                                        <?php echo $flashdata; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div> 
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <table class="table table-striped table-bordered table-hover" id="datatable_properties">
                            <thead>
                            <tr role="row" class="heading">
                                <th>Due Date</th>
                                <th>Property ID</th>
                                <th>Rental Payment</th>
                                <th>Status</th>
                                <th>In Arrears</th>
                                <th>Rental Contract Date</th>
                                <th>To Renewal</th>
                                <th>Actions</th>
                            </tr>
                            <!-- <tr role="row" class="filter">

                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][property_name]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][address]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][developer]">
                                </td>                                
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][property_price]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][district_name]">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-filter input-sm" name="filter[both][tags]">
                                </td>
                                <td>
                                    
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
                            </tr> -->
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
    var answer = confirm("Are you sure you want to delete this property?")
    if (answer) {
        //location.replace(base_url+'admin/categories/delete/'+id)

        $.ajax({
            url: base_url + 'admin/property/ajax/property_delete',
            type: 'post',
            data: {
                "id": id,
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
                    "url": base_url+"admin/Property/ajax/get_rental_collections", // ajax source
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
    Properties.init();


    // Actions
    $(document).on("change", "#select-action", function(e){
        var value = parseInt($(this).val());
        var property_id = $(this).data("id");
        var selected = $(this).find('option:selected').text();
        
        switch(value){
            case 1:
                window.location.href = base_url + 'admin/property/form/' + property_id;
                break;
            case 2:
                window.location.href = base_url + 'admin/property/investment/' + property_id;
                break;
            case 3:
                var type;
                if(selected == "Mark as Featured"){
                    type = "mark";
                }else if(selected == "Unmark as Featured"){
                    type = "unmark";
                }
                window.location.href = base_url + 'admin/property/featured/' + property_id + '/' + type;
                break;
            case 4:
                window.location.href = base_url + 'admin/property/valuation/' + property_id;
                break;
            case 5:   
                window.location.href = base_url + 'admin/property/distribution/' + property_id ;
                break;
            case 6:   
                window.location.href = base_url + 'admin/property/status/' + selected.toLowerCase() + '/' + property_id ;
                break;
            case 7:   
                window.location.href = base_url + 'admin/property/action/complete_property/' + property_id;
                break;
             case 8:   
                var trust_id =  $(this).find('option:selected').data('id');
                window.location.href = base_url + 'admin/property/transactions/' + trust_id ;
                break;
            case 9:
                deleteProperty(property_id);
                break;
        }

    });

});
</script>

