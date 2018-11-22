<div class="property-title">
    <h1><?php echo $count_properties; ?> properties</h1>
</div>
<div class="row left-property-list">
    <?php
        foreach ($properties as $property):

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

    <div class="large-6 medium-12 small-12 columns">
        <div class="property-wrapper <?=($property->is_watchlist) ? 'active' : ''?>">
          <div class="property-img">
            <input type="hidden" name="lat" value="<?=$property->lat?>">
            <input type="hidden" name="lng" value="<?=$property->lng?>">
            <span class="fa fa-map-pin watchlist" data-id="<?=$property->property_id?>"></i></span>
            <img src="<?=base_url() ?>uploads/images/full/<?php echo $image; ?>" alt="" />
          </div>
          <div class="property-name"><?php echo $property->property_name; ?></div>
          <div class="property-address">
              <?php echo $property->address; ?>
          </div>
          <div class="property-description clearfix">
              <div class="row">
                  <div class="medium-7 small-7 columns pdr">
                      <p><?php echo number_format($property->property_price, 2); ?> <br/><span><em>Excludes tax and charges</em></span></p>
                  </div>
                  <div class="medium-5 small-5 columns no_padding funded">
                        <div class="property-details property-details-<?php echo $property->property_id; ?> circle text-center" data-value="<?=$property->percent / 100?>" data-size="70" data-thickness="8">
                            <strong></strong>
                        </div>
                    </div>
              </div>
          </div>
          <div class="apartment-info">
                <ul class="clearfix">
                    <li><?php echo number_format($property->property_size); ?><br><span>SQ. FT.</span></li>
                    <li><?php echo $property->bedrooms; ?><br><span>Bedroom</span></li>
                    <li>$<?php echo number_format($property->sqft); ?><br><span>/SQ. FT.</span></li>
                </ul>
          </div>
          <div class="property-btn text-center"><a href="<?php echo site_url('property-details/'.$property->property_id); ?>">view property <span class="fa fa-arrow-right"></span></a></div>
          <!-- MAP -->
          <div class="map-content" style="display:none">
            <div class="property-wrapper">
                <div class="property-img">
                   <span class="fa fa-map-pin watchlist" data-id="<?=$property->property_id?>"></i></span>
                   <img src="<?=base_url() ?>uploads/images/full/<?php echo $image; ?>" alt="" />
                </div>
                <div class="property-name"><?=$property->property_name?></div>
                <div class="property-address">
                    <?=$property->address?>
                </div>
                <div class="property-description clearfix">
                    <div class="row">
                        <div class="medium-7 small-7 columns pdr">
                            <p><?=number_format($property->property_price, 2)?> <br/><span><em>Excludes tax and charges</em></span></p>
                        </div>
                        <div class="medium-5 small-5 columns">
                            <div class="property-details circle text-center" data-value="<?=$property->percent / 100?>" data-size="70" data-thickness="8">
                                <strong></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property-profile clearfix text-center">
                    <div class="row">
                    <div class="medium-4 small-4 columns">
                        <p><?=number_format($property->property_size)?> <br/><span>SQ. FT.</span></p>
                        </div>
                        <div class="medium-4 small-4 columns">
                            <p><?=$property->bedrooms?><br/> <span>Bedrooms</span></p>
                        </div>
                        <div class="medium-4 small-4 columns">
                            <p>$<?=number_format($property->sqft)?><br/> <span>/SQ. FT.</span></p>
                        </div>
                    </div>
                </div>
                <div class="property-btn text-center"><a href="<?=site_url('property-details/' . $property->property_id)?>">view property <span class="fa fa-arrow-right"></span></a></div>
            </div>
          </div>
          <!-- END MAP -->
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php if(!empty($properties)): ?>
<input type="hidden" id="page" value="<?php echo $page; ?>">
<input type="hidden" id="last" value="<?php echo $last; ?>">
<input type="hidden" id="prev" value="<?php echo $prev; ?>">
<input type="hidden" id="next" value="<?php echo $next; ?>">

<input type="hidden" id="theme-selected" value="<?php echo $theme; ?>">
<input type="hidden" id="district-selected" value="<?php echo $district; ?>">
<input type="hidden" id="price-range" value="<?php echo $valuation; ?>">
<input type="hidden" id="psqft-range" value="<?php echo $psqft; ?>">

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <div class="property-pagination text-center">
          <?php if($page > 1): ?>
            <a href="javascript:;"><img src="<?php echo base_url('assets/frontend/images/pagi-left-arrow.png'); ?>" alt="" class="pagi-left"></a>
          <?php endif; ?>
                <?php echo $page; ?> of <?php echo $last; ?>
          <?php if($page < $last): ?>
            <a href="javascript:;"><img src="<?php echo base_url('assets/frontend/images/pagi-right-arrow.png'); ?>" alt="" class="pagi-right"></a>
          <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
    // function property_listing_ajax(theme, district, valuation, psqft, search, page){

    //     $.ajax({
    //         url: site_url+"property-listing/ajax/listings",
    //         data:{'theme' : theme, 'district' : district, 'valuation' : valuation, 'psqft' : psqft, 'page' : page, 'search' : search, '<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'},
    //         dataType: 'html',
    //         success: function(data) {           
                
    //             $("#listing-container").html(data);

    //         },
    //         type: 'POST',
    //     });

        
    // }

    // $(".pagi-left").on('click', function (){

    //     var prev = $('#prev').val();

    //     var theme = $('#theme-selected').val();
    //     var district = $('#district-selected').val();
    //     var valuation = $('#price-range').val();
    //     var psqft = $('#psqft-range').val();
    //     var page = $('#prev').val();
    //     var search = '<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>';

    //     property_listing_ajax(theme, district, valuation, psqft, search, page);
    // });

    // $(".pagi-right").on('click', function (){

    //     var next = $('#next').val();

    //     var theme = $('#theme-selected').val();
    //     var district = $('#district-selected').val();
    //     var valuation = $('#price-range').val();
    //     var psqft = $('#psqft-range').val();
    //     var page = $('#next').val();
    //     var search = '<?php echo isset($_GET["search"]) ? $_GET["search"] : "" ?>';

    //     property_listing_ajax(theme, district, valuation, psqft, search, page);

    // });
    var watchlist_flag = true;

    $(document).on('click', '.watchlist', function() {
        var id = $(this).data('id')
        var that = $(this)
        that.parents('.property-wrapper').addClass('active');

        if(watchlist_flag) {
            watchlist_flag = false;
        
            $.ajax({
                url: '<?=site_url('PropertyListing/action/add_to_watchlist')?>/' + id,
                type: 'POST',
                data: {
                    '<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
                },
                success: function(res) {
                    watchlist_flag = true;
                    if(res.success) {
                        that.removeClass('watchlist')
                        that.addClass('unwatchlist')
                    } else {
                        that.parents('.property-wrapper').removeClass('active');
                    }
                },
                error: function(msg) {
                    watchlist_flag = true;
                    that.parents('.property-wrapper').removeClass('active');
                }
            })
        }
    })

    $(document).on('click', '.unwatchlist', function() {
        var id = $(this).data('id')
        var that = $(this)
        that.parents('.property-wrapper').removeClass('active');

        if(watchlist_flag) {
            watchlist_flag = false;
        
            $.ajax({
                url: '<?=site_url('PropertyListing/action/remove_to_watchlist')?>/' + id,
                type: 'POST',
                data: {
                    '<?=$this->security->get_csrf_token_name();?>' : '<?=$this->security->get_csrf_hash();?>'
                },
                success: function(res) {
                    watchlist_flag = true;
                    if(res.success) {
                        that.removeClass('unwatchlist')
                        that.addClass('watchlist')
                    } else {
                        that.parents('.property-wrapper').addClass('active');
                    }
                },
                error: function(msg) {
                    watchlist_flag = true;
                    that.parents('.property-wrapper').addClass('active');
                }
            })
        }
    })
</script>