    <div class="container">
      <div class="content">
        <div class="row">
          <div class="span16">
          	<div class="alert-message block-message info">
	            <h1>HMVC LYS - HMVC Login Yonetim Sistemi</h1>
                <h2>Giriş Sayfası</h2>
    		</div>        
         <?php echo (isset($validation_errors)) ? $validation_errors : ''; ?>
         <?php echo form_open(site_url('login'),array('class'=>"well form-inline"));?>
            <div class="row">
           		<span class="span3"><strong>Kullanıcı Adı :</strong></span>
            		<input type="text" name="unameFromUser" value="" size="50" />
            </div>
            <div class="row">
          		<span class="span3"><strong>Şifre :</strong></span>
                  <input type="password" name="passFromUser" value="" size="50" />
           </div>
           <div class="row">
           <br />
           <div class="span3">.</div>
                <input type="submit" value="Gönder" class="btn primary" />
                <input name="Reset" type="reset" class="btn danger" value="Reset" />
    		</div>
                
			</form>


          </div>
          
        </div>
      </div>