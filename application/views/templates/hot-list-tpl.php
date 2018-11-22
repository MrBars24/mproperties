<?php foreach($hotlist as $hot): 

if (!empty($hot->images) && $hot->images !== "null"){
    $images = $hot->images;
    $image = $images[0]->filename;

} else{
    $image = '';
}    
    
    
?>
<tr>
    <td style="background: #e5f9fe;padding:0 40px 0 40px;">
        <table cellpadding="0" cellspacing="0" align="center" width="100%" bgcolor="#ffffff" style="border: 1px solid #ececec;">
            <tr>
                <td>
                    <img src="<?=base_url() ?>uploads/images/thumbnails/<?php echo $image; ?>" width="245" height="210" style="padding: 0; margin: 0;" />
                </td>
                <td valign="middle" width="275">
                    <table cellpadding="0" cellspacing="0" align="center" width="100%">
                        <tr>
                            <td style="font-size: 18px; font-family: 'Helvetica', Arial, sans-serif; color: #333333;padding-left: 20px;" width="250"><?=$hot->property_name?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 26px; font-family: 'Helvetica', Arial, sans-serif; color: #333333;padding: 10px 0 0 20px;"><span style="font-size: 18px;">$</span><?=number_format($hot->property_price, 2)?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; font-style: italic;font-family: 'Helvetica', Arial, sans-serif;color: #999999;padding: 5px 0 0 20px;">Excludes tax and charges</td>
                        </tr>
                        <tr>
                            <td style="line-height: 30px;" height="30px;">&nbsp;</td>
                        </tr>  
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table cellpadding="0" cellspacing="0" align="center" width="100%" bgcolor="#e5f9fe">
            <tr>
                <td align="center">
                    <a href="<?=site_url('property-details/' . $hot->property_id)?>" target="_blank"><img src="{url}assets/edm/images/view-property-btn.png" width="520" height="50"></a>
                </td>
            </tr>
            <tr>
                <td style="line-height: 20px;" height="20px;">&nbsp;</td>
            </tr>
        </table>
    </td>
</tr>
<?php endforeach; ?>