<?php include("application/views/includes/header.php"); ?>
	<body>

		<?php include("application/views/includes/menu.php"); ?>
		
<div class="row">
	<div class="small-12 medium-11 large-11 notifications align-center">
		<div class="row no-margin">
			<div class="medium-12 columns">
				<div class="tt-title">
					<h3>Notifications</h3>
                    <span class="ts-info-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span>
				</div>
			</div>
		</div>
        <div id="notifications">
            <!-- <?php foreach($notifications as $notif):  ?>
            <?php 
                if($notif->type_id == $this->config->item('n_fulfillment') || $notif->type_id == $this->config->item('n_cancel_order')) {
                    $icon = "fa-home";
                }else{
                    $icon = "fa-user-o";
                }
            ?>
            <div class="notibox-wrapper">
                <div class="row border-image">
                    <div class="noti-item">
                        <div class="large-2 medium-2 small-2 columns text-center">
                        <i class="fa <?=$icon?>" aria-hidden="true"></i>
                        </div>
                        <div class="large-8 medium-8 small-6 columns">
                            <a href="<?=base_url().$notif->link; ?>">
                                <?=$notif->summary;?>
                            </a>
                            <p><?=$notif->message;?></p>
                        </div>
                        <div class="large-2 medium-2 small-4 columns">
                            <?=$notif->created_at;?>
                        </div>
                        <br clear="all">
                    </div>
                </div>
            </div>
            <?php endforeach; ?> -->
        </div>
	</div>
</div>

<?php include("application/views/includes/footer.php"); ?>

<?php include("application/views/includes/scripts.php"); ?>
<script>
var start = 0
var limit = 10
var reached = false;

$(function(){

    getNotif()

    $(window).scroll(function(){
 
        if($(window).scrollTop() == $(document).height() - $(window).height()){
            getNotif()
        }

    })

})

function getNotif()
{
    if(reached)
        return

    $.ajax({
        url: '<?=base_url()?>users/get_notifications',
        type: 'POST',
        data: {
            <?=$this->security->get_csrf_token_name()?> : '<?=$this->security->get_csrf_hash() ?>',
            getData: 1,
            start: start,
            limit: limit
        },
        success: function(res)
        {   

            console.log(res)
            if(res.notifications.length > 0){

                
                start += limit
                var template = '';
                var icon;
                res.notifications.forEach(function(notif, key){

                    if(notif.type_id == <?=$this->config->item('n_fulfillment')?> || notif.type_id == <?=$this->config->item('n_cancel_order')?>){
                        icon = "fa-home"
                    }else{
                        icon = "fa-user-o"
                    }
                   
                    template += ` <div class="notibox-wrapper">
                                    <div class="row border-image">
                                        <div class="noti-item">
                                            <div class="large-2 medium-2 small-2 columns text-center">
                                                <i class="fa ${icon}" aria-hidden="true"></i>
                                            </div>
                                            <div class="large-8 medium-8 small-6 columns">
                                                <a href="<?=base_url()?>${notif.link}">
                                                   ${notif.summary}
                                                </a>
                                                <p>${notif.message}</p>
                                            </div>
                                            <div class="large-2 medium-2 small-4 columns">
                                                ${notif.created_at}
                                            </div>
                                            <br clear="all">
                                        </div>
                                    </div>
                                </div>`
                })
                $("#notifications").append(template)
            } else{
                reached = true
            }
        }
    })
}


</script>
</body>
</html>
<script>




</script>