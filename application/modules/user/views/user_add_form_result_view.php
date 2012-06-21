 <div class="container">
	<div class="page-header">
	   <h1>Kullanıcı Ekleme Sayfası<small>formu doldurup butona basin.</small></h1>
    </div>
	<div class="alert alert-{$messageArr.alert|default:'info'}">
    	 <a class="close" data-dismiss="alert">×</a>
    	 <!--{$resultMessage|default:'&nbsp;'}
            {if $mukerrerStatus == "true"}
                {$mukerrerResult.uname|default:'&nbsp;'}
                <br />
                {$mukerrerResult.email|default:'&nbsp;'}
            {else}
                {foreach key = i item = data from = $validation_errors}
                    {$data}
                {/foreach}
            {/if}   --> 
    </div>
    <?php echo $result; ?><br />
    <?php foreach ($userAddFormData as $key => $item):?>

	<?php echo "$key : $item";?><br />

	<?php endforeach;?>
	
    <p>Page rendered in <strong>{elapsed_time}</strong> seconds - viva HMVC!</p>