<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="row">
	<div class="small-12 medium-11 large-11 watchlist align-center">
		<div class="row no-margin">
			<div class="medium-12 columns">
				<div class="tt-title">
					<h3>My Watchlist</h3>
					<span class="ts-info-text">All the properties that you are interested to invest in are listed here.</span>
				</div>
			</div>
		</div>
		<div class="row no-margin">
			<div class="small-12 columns no_padding">
					<div class="total-properties">
						<span><?= $count_properties; ?></span> properties
					</div>
						<div class="sort-list">
						Sort Listings
					</div>
			</div>
		</div><!--row-->
			<div class="property-individual-details">
				<div class="row no-margin">
                    <div class="clearfix"></div>
                    <div class="row left-property-list">
                        <?php
                            foreach ($watchlists as $property):

                                $total_order = $this->Property_model->get_total_order($property->property_id);
                                $trust_account = $this->Property_model->get_trust_account($property->property_id);
                              
                                if(!empty($total_order)){
                                    @$funded = ($total_order * 100) / $trust_account->units_issued;
                                }else{
                                    $funded = '';
                                }
                               
                                if (!empty($property->images) && $property->images !== "null"){
                                    $images = $property->images;
                    
                                    foreach($images as $img){
                                        if($img->is_default == 1){
                                            $image = $img->filename;
                                            break;
                                        }else{
                                            $image = $images[0]->filename;
                                        }
                                    }
                                } else{
                                    $image = '';
                                }

                        ?>

                        <div class="large-3 medium-6 small-12 columns watch-container">
                            <div class="property-wrapper <?=($property->is_watchlist) ? 'active' : ''?>">
                                <div class="property-img">
                                    <input type="hidden" name="lat" value="1.2753422">
                                    <input type="hidden" name="lng" value="103.8422856">
                                    <span class="fa fa-map-pin unwatchlist" data-id="<?=$property->property_id?>"></i></span>
                                    <img src="<?=base_url() ?>uploads/images/full/<?php echo $image; ?>" alt="" />
                                </div>
                                <div class="property-name"><?php echo $property->property_name; ?></div>
                                <div class="property-address">
                                    <?php echo $property->address; ?>
                                </div>
                                <div class="property-description clearfix">
                                    <div class="row">
                                        <div class="medium-7 small-7 columns pdr">
                                            <p><?php echo number_format($property->property_price); ?> <br/><span><em>Excludes tax and charges</em></span></p>
                                        </div>
                                        <div class="medium-5 small-5 columns no_padding funded">
                                            <div class="property-details-<?php echo $property->property_id; ?> circle text-center" data-value="<?php echo $property->percent / 100; ?>" data-size="75" data-thickness="10" style="position:relative;">
                                                <strong style="position: absolute;top: 30%;left: 0;font-size:15px;width:100%;"></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="apartment-info">
                                    <ul class="clearfix">
                                        <li><?php echo number_format($property->property_size); ?><br><span>SQ. FT</span></li>
                                        <li><?php echo $property->bedrooms; ?><br><span>Bedroom</span></li>
                                        <li>$<?php echo number_format($property->sqft); ?><br><span>/SQ. FT</span></li>
                                    </ul>
                                </div>
                                <div class="property-btn text-center"><a href="<?php echo site_url('property-details/'.$property->property_id); ?>">view property <span class="fa fa-arrow-right"></span></a></div>	
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>

<script>
$(document).on('click', '.unwatchlist', function() {
	var id = $(this).data('id')
	var that = $(this)

	$.ajax({
		url: '<?=site_url('PropertyListing/action/remove_to_watchlist')?>/' + id,
		type: 'POST',
		data: {
			'<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
		},
		success: function(res) {
			if(res.success) {
				that.parents('.watch-container').remove();
			}
		}
	})
})


$('.circle').each(function(){
    console.log($(this).data("value"));
    $(this).circleProgress({
        value: $(this).data("value"),
        size: 80,
        fill: {
			gradient: ['#ec3a2a', '#fedd06'],
			gradientAngle: Math.PI / 4
		},
		lineCap: "round",
    }).on('circle-animation-progress', function (event, progress, stepValue) {
		$(this).find('strong').html(Number(stepValue * 100).toFixed(2) + '<sup>%</sup><span class="funded">FUNDED</span>');
		//$(this).find('strong').html(percentage + '<sup>%</sup><span class="funded">FUNDED</span>');


	});
});
//$('.circle').circleProgress();
</script>