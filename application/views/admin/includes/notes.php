<?php

$printed_message_type = 'info';

if(validation_errors())
{
	$printed_message_type = 'danger';
	$printed_message = validation_errors();
}else
{
	if($this->session->flashdata('error')!='')
	{		
	 	$printed_message = $this->session->flashdata('error');
	}else
	{
		$printed_message = $this->session->flashdata('message');	
	}
}

 if(!is_array($printed_message))
 {
 	if($printed_message!='')
 	{
 ?>
  <div class="note note-<?php echo $printed_message_type;?>">
    <p><?php echo $printed_message;?></p>
</div>
 <?php
 	}else
 	{
 ?>
 <div id="flashdata" class="note hidden">
    <p id="flashdata-msg"></p>
</div>
 <?php
 	}
 }else
 {
 	
 	if(isset($printed_message['type']))
 	{
 		$printed_message_type =  $printed_message['type'];

 		if($printed_message_type=='error')
 		{
 			$printed_message_type = 'danger';
 		}
 	}

 	if(isset($printed_message['message']))
 	{
 		$printed_message_msg =  $printed_message['message'];
 	}

 	if($printed_message_msg!='')
 	{
 ?>
 <div class="note note-<?php echo $printed_message_type;?>">
    <p><?php echo $printed_message_msg;?></p>
</div>
<?php
	}else
	{
?>
<div id="flashdata" class="note">
    <p id="flashdata-msg"></p>
</div>
<?php
	}
}

?>