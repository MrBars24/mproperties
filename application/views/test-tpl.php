<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
    <form action="<?=base_url()?>cron/property_valuation/4" method="post">
        Date:
        <input type="date" name="test_date" placeholder="date"><br><br>
        Valuation:
        <input type="text" name="property_value" placeholder="value"><br><br>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
        <button type="submit" name="submit">Submit</button>
    </form>

    <h1>RENTAL TEST</h1>
    <?=form_open('cron/generate_rental_payment/1')?>
        Date:
        <input type="date" name="test_date" placeholder="date"><br><br>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>