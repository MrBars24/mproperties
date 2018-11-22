<?php include('includes/header.php'); ?>
<style>
.circle{
  position:relative;
  margin:15px 0;
  left:18px
}
.circle strong{
    color: #4FBDCB;
    position: absolute;
    left: 52.2px;
    width: 75px;
    text-align: center;
    top: 47%;
    transform: translateY(-45%);
}

</style>
<div class="page-container">
    <?php include("includes/sidebar.php"); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title"><?=$property_title?></h3>

            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo site_url('/admin/users'); ?>">Properties</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#"><?=$property_title?></a>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <div style="padding:20px 0;">
                <div class="medium-6 small-5 columns">
                    <div style="width:200px;margin:0 auto;">
                        <div class="property-details circle text-center" id="detail-funding">
                            <strong></strong>
                        </div>
                    </div> 
                </div>
            </div>
           

            <!-- BEGIN PAGE CONTENT-->
            <!-- <h1>Hello</h1> -->
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
                                        <th>Investors</th>
                                        <th>Invested Amount</th>
                                        <th>Units Invested</th>
                                        <th>Percentage</th>
                                        <th>Date Invested</th>
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
        //grid.setCsrfToken('<?=$this->security->get_csrf_token_name();?>', '<?=$this->security->get_csrf_hash();?>');
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
                    "url": base_url+"admin/Property/ajax/get_property_investments", // ajax source
                    "data": {
                        '<?=$this->security->get_csrf_token_name();?>':'<?=$this->security->get_csrf_hash();?>',
                        "property_id": <?php echo $this->uri->segment(4); ?>
                        
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
            handleProperty();
        }
    };
}();

jQuery(document).ready(function() {
    Properties.init()

   

});
</script>

<script>
     $('#detail-funding').circleProgress({
        startAngle: -Math.PI / 4 * 2,
        value: <?=$total_percentage; ?>,
        size: 200,
        fill: {
            gradient: ['#ec3a2a', '#fedd06'],
			gradientAngle: Math.PI / 4
        },
        lineCap: "round"
    }).on('circle-animation-progress', function (event, progress, stepValue) {
		$(this).find('strong').html(Number(stepValue * 100).toFixed(2) + '<sup>%</sup><span class="funded">FUNDED</span>');
		//$(this).find('strong').html(percentage + '<sup>%</sup><span class="funded">FUNDED</span>');


    });
</script>