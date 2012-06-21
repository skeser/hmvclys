 <div class="container">
	<div class="page-header">
	    <h1>Kullanıcı Düzenleme Sayfası<small>formu doldurup butona basin.</small></h1>
    </div>
	<div class="alert alert-{$messageArr.alert|default:'info'}">
    	 <a class="close" data-dismiss="alert">×</a>
    	<!-- {$resultMessage|default:'&nbsp;'}
    		{if $mukerrerStatus == "true"}
       			 {$mukerrerResult.uname|default:'&nbsp;'}<br />
       			 {$mukerrerResult.email|default:'&nbsp;'}
   			
            	{else}
        			{foreach key = i item = data from = $validation_errors}
            			{$data|default:'&nbsp;'}
        			{/foreach}
    		{/if}  -->   
    <?php echo (isset($result)) ? $result : ''; ?>
    </div>
   	<?php echo form_open(site_url('user/userEdit/'.$userObj['userID'].''),array('class'=>"well form-inline"));?>
      <div class="control-group">
       <label class="control-label" for="siteAdi">Ad*	:</label>
          <div class="controls">
            <input name="ad" type="text" id="ad" size="35" maxlength="30" value="<?php echo $userObj['ad']; ?>" />
          </div>
      </div><!-- /clearfix -->
      <div class="control-group">
        <label class="control-label" for="siteAdi">Soyad*:</label>
      <div class="controls">
         <input name="soyad" type="text" id="soyad" size="35" maxlength="30" value="<?php echo $userObj['soyad']; ?>" />
      </div>
      </div><!-- /clearfix -->
      <div class="control-group">
        <label class="control-label" for="siteAdi">email*:</label>
      <div class="controls">
        <input name="email" type="text" id="email" size="40" maxlength="50" value="<?php echo $userObj['email']; ?>" />
        <span id="repeadTestResult"></span>
       </div>
      </div><!-- /clearfix -->
      <div class="control-group">
        <label class="control-label" for="siteAdi">Cep Telefonu:</label>
      <div class="controls">
      <input name="ceptel" type="text" id="ceptel" size="10" maxlength="10" value="<?php echo $userObj['ceptel']; ?>" />
      </div>
      </div><!-- /clearfix -->
      <div class="control-group">
        <label class="control-label" for="siteAdi"> Kullanıcı Adı:</label>
      <div class="controls">
        <input name="uname" type="text" id="uname" size="25" maxlength="20" value="<?php echo $userObj['uname']; ?>" disabled="disabled" />
       </div>
      </div><!-- /clearfix -->
      <div class="control-group">
        <label class="control-label" for="siteAdi"> Şifre:</label>
      <div class="controls">
      <input name="upass" type="password" id="upass" size="10" maxlength="8" />
     </div>
      </div><!-- /clearfix -->
      <div class="control-group">
        <label class="control-label" for="siteAdi">Şifre (Tekrar):</label>
      <div class="controls">
          <input name="upassCheck" type="password" id="upassCheck" size="10" maxlength="8" />
      </div>
      </div><!-- /clearfix -->
  <input name="userID" type="hidden" id="userID" value="<?php echo $userObj['userID']; ?>"/>
  <div class="form-actions">
  	<input type="submit" name="userEditButton" id="userEditButton" class="btn btn-danger" value="Güncelle" />
    <input type="reset" name="userEditButtonReset" id="userEditButtonReset" class="btn" value="Formu Temizle" />
  </div>
<?php echo form_close();?>
<p>Page rendered in <strong>{elapsed_time}</strong> seconds - viva HMVC!</p>