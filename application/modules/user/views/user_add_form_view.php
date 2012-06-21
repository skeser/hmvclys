 <div class="container">
	<div class="page-header">
	   <h1>Kullanıcı Ekleme Sayfası<small>.</small></h1>
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
     <?php echo (isset($validation_errors)) ? $validation_errors : ''; ?>
    </div>
  <?php echo form_open(site_url('user/userAdd'),array('class'=>"well form-inline"));?>
	<div class="control-group">
      <label class="control-label" for="siteAdi">Ad*	:</label>
      <div class="controls">
		<input name="ad" type="text" id="ad" size="35" maxlength="30" class="span5" />
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="siteAdi">Soyad*:</label>
      <div class="controls">
      	<input name="soyad" type="text" id="soyad" size="35" maxlength="30" class="span5" />
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="siteAdi">email*:</label>
      <div class="controls">
      	<input name="email" type="text" id="email" size="40" maxlength="50" class="span5" />
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="siteAdi">Cep Telefonu:</label>
      <div class="controls">
    	<input name="ceptel" type="text" id="ceptel" size="10" maxlength="10" class="span5" />
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="siteAdi"> Kullanıcı Adı:</label>
      <div class="controls">
      	<input name="uname" type="text" id="uname" size="25" maxlength="20" class="span3" />
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="siteAdi"> Şifre:</label>
      <div class="controls">
    	<input name="upass" type="password" id="upass" size="10" maxlength="8" class="span3" />
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="siteAdi">Şifre (Tekrar):</label>
      <div class="controls">
      	<input name="upassCheck" type="password" id="upassCheck" size="10" maxlength="8" class="span3" />
      </div>
    </div>
    
    <div class="form-actions">
    	<input type="submit" name="userAddButton" id="userAddButton" class="btn btn-primary" value="Kullanıcı Ekle" />
        <input type="reset" name="userAddButtonReset" id="userAddButtonReset" class="btn" value="Formu Temizle" />
    </div>
<?php echo form_close()?>