
<div id="sidecolumn" class="close">
	
	<div class="info">

		<dl class="small compact">
			<dt><label><?=lang('ionize_title_php_version')?></label></dt>
			<dd><?= phpversion() ?></dd>
		</dl>
		<dl class="small compact">
			<dt><label><?=lang('ionize_title_db_version')?></label></dt>
			<dd><?=$this->db->platform().' '.$this->db->version();?></dd>
		</dl>
		<dl class="small compact">
			<dt><label><?=lang('ionize_label_file_uploads')?></label></dt>
			<dd><img src="<?= theme_url() ?>images/icon_16_<?php if(ini_get('file_uploads') == true) :?>ok<?php else :?>nok<?php endif ;?>.png" /></dd>
		</dl>
		<dl class="small compact">
			<dt><label><?=lang('ionize_label_max_upload_size')?></label></dt>
			<dd><?= ini_get('upload_max_filesize') ?></dd>
		</dl>

	</div>

	<div id="options">
		
		<!-- Database -->
		<h3 class="toggler"><?=lang('ionize_title_database')?></h3>

		<div class="element">

			<form name="databaseForm" id="databaseForm" method="post" action="<?= admin_url() ?>setting/save_database">

				<!-- Driver -->
				<dl class="small">
					<dt>
						<label for="db_driver"><?=lang('ionize_label_db_driver')?></label>
					</dt>
					<dd>
						<select name="db_driver" id="db_driver" class="select">
							<option <?php if ($this->db->platform() == 'mysql'):?>selected="selected"<?php endif;?>  value="mysql">MySQL</option>
							<option <?php if ($this->db->platform() == 'mysqli'):?>selected="selected"<?php endif;?>  value="mysqli">MySQLi</option>
							<option <?php if ($this->db->platform() == 'mssql'):?>selected="selected"<?php endif;?>  value="mssql">MS SQL</option>
							<option <?php if ($this->db->platform() == 'postgre'):?>selected="selected"<?php endif;?>  value="postgre">Postgre SQL</option>
							<option <?php if ($this->db->platform() == 'oci8'):?>selected="selected"<?php endif;?>  value="oci8">Oracle</option>
							<option <?php if ($this->db->platform() == 'sqlite'):?>selected="selected"<?php endif;?>  value="sqlite">SQLite</option>
							<option <?php if ($this->db->platform() == 'odbc'):?>selected="selected"<?php endif;?>  value="odbc">ODBC</option>
						</select>
					</dd>
				</dl>
				
				<!-- Host -->
				<dl class="small">
					<dt>
						<label for="db_host"><?=lang('ionize_label_db_host')?></label>
					</dt>
					<dd>
						<input id="db_host" name="db_host" class="inputtext w140" type="text" value="<?= $db_host ?>" />
					</dd>
				</dl>

				<!-- Database -->
				<dl class="small">
					<dt>
						<label for="db_name"><?=lang('ionize_label_db_name')?></label>
					</dt>
					<dd>
						<input id="db_name" name="db_name" class="inputtext w140" type="text" value="<?= $db_name ?>" />
					</dd>
				</dl>

				<!-- User -->
				<dl class="small">
					<dt>
						<label for="db_user"><?=lang('ionize_label_db_user')?></label>
					</dt>
					<dd>
						<input id="db_user" name="db_user" class="inputtext w140" type="text" value="<?= $db_user ?>" />
					</dd>
				</dl>

				<!-- Password -->
				<dl class="small">
					<dt>
						<label for="db_pass"><?=lang('ionize_label_db_pass')?></label>
					</dt>
					<dd>
						<input id="db_pass" name="db_pass" class="inputtext w140" type="password" value="" />
					</dd>
				</dl>

				<!-- Submit button  -->
				<dl class="small last">
					<dt>&#160;</dt>
					<dd>
						<input id="submit_database" type="submit" class="submit" value="<?= lang('ionize_button_save') ?>" />
					</dd>
				</dl>

			</form>

		</div> <!-- /element -->
			

		<!-- SMTP -->
		<h3 class="toggler"><?=lang('ionize_title_mail_send')?></h3>
		
		<div class="element">

			<form name="smtpForm" id="smtpForm" method="post" action="<?= admin_url() ?>setting/save_smtp">
			
				<!-- Website email -->
				<dl class="small">
					<dt>
						<label for="site_email"><?=lang('ionize_label_site_email')?></label>
					</dt>
					<dd>
						<input id="site_email" name="site_email" class="inputtext w140" type="text" value="<?= Settings::get('site_email') ?>" />
					</dd>
				</dl>

				<!-- Mail path -->
				<dl class="small">
					<dt>
						<label for="smtp_protocol"><?=lang('ionize_label_smtp_protocol')?></label>
					</dt>
					<dd>
						<select name="protocol" id="protocol" onchange="javascript:changeEmailDetails();" class="select">
							<option <?php if ($protocol == 'smtp'):?>selected="selected"<?php endif;?> value="smtp">SMTP</option>
							<option <?php if ($protocol == 'mail'):?>selected="selected"<?php endif;?> value="mail">Mail</option>
							<option <?php if ($protocol == 'sendmail'):?>selected="selected"<?php endif;?>  value="sendmail">SendMail</option>
						</select>
					</dd>
				</dl>
				

				<!-- Mail Path -->
				<div id="emailMailDetails" style="display:none;">
					<dl class="small">
						<dt>
							<label for="mailpath"><?=lang('ionize_label_mailpath')?></label>
						</dt>
						<dd>
							<input id="mailpath" name="mailpath" type="text" class="inputtext w140" value="<?= $mailpath ?>" />
						</dd>
					</dl>
				</div>
				
				<div id="emailSMTPDetails">
					<!-- SMTP Host -->
					<dl class="small">
						<dt>
							<label for="smtp_host"><?=lang('ionize_label_smtp_host')?></label>
						</dt>
						<dd>
							<input id="smtp_host" name="smtp_host" type="text" class="inputtext w140" value="<?= $smtp_host ?>" />
						</dd>
					</dl>
					
					<!-- SMTP User -->
					<dl class="small">
						<dt>
							<label for="smtp_user"><?=lang('ionize_label_smtp_user')?></label>
						</dt>
						<dd>
							<input id="smtp_user" name="smtp_user" type="text" class="inputtext w140" value="<?= $smtp_user ?>" />
						</dd>
					</dl>
				
					<!-- SMTP Pass -->
					<dl class="small">
						<dt>
							<label for="smtp_pass"><?=lang('ionize_label_smtp_pass')?></label>
						</dt>
						<dd>
							<input id="smtp_pass" name="smtp_pass" type="password" class="inputtext w140" value="<?= $smtp_pass ?>" />
						</dd>
					</dl>
				
					<!-- SMTP Port -->
					<dl class="small">
						<dt>
							<label for="smtp_port"><?=lang('ionize_label_smtp_port')?></label>
						</dt>
						<dd>
							<input id="smtp_port" name="smtp_port" type="text" class="inputtext w40" value="<?= $smtp_port ?>" />
						</dd>
					</dl>
				</div>
					
				<!-- Charset -->
				<dl class="small">
					<dt>
						<label for="charset"><?=lang('ionize_label_email_charset')?></label>
					</dt>
					<dd>
						<input id="charset" name="charset" type="text" class="inputtext w140" value="<?= $charset ?>" />
					</dd>
				</dl>
			
				<!-- Mailtype -->
				<dl class="small">
					<dt>
						<label for="mailtype"><?=lang('ionize_label_email_mailtype')?></label>
					</dt>
					<dd>
						<select name="mailtype" id="mailtype" class="select">
							<option <?php if ($mailtype == 'text'):?>selected="selected"<?php endif;?> value="text">Text</option>
							<option <?php if ($mailtype == 'html'):?>selected="selected"<?php endif;?> value="html">HTML</option>
						</select>
					</dd>
				</dl>
			
				<!-- Submit button  -->
				<dl class="small last">
					<dt>&#160;</dt>
					<dd>
						<input id="submit_smtp" type="submit" class="submit" value="<?= lang('ionize_button_save') ?>" />
					</dd>
				</dl>
			
			</form>
		</div>
		
			
		<!-- New thumbnail -->
		<h3 class="toggler"><?=lang('ionize_title_thumb_new')?></h3>

		<div class="element">
			
			<form name="thumbForm" id="thumbForm" method="post" action="<?= admin_url() ?>setting/save_thumb">

				<!-- Thumb name -->
				<dl class="small">
					<dt>
						<label for="thumb_name_new"><?=lang('ionize_label_thumb_dir')?></label>
					</dt>
					<dd>
						<input id="thumb_name_new" name="thumb_name_new" type="text" class="inputtext w140" value="" />
					</dd>
				</dl>

				<!-- Thumb size ? -->
				<dl class="small">
					<dt>
						<label for="thumb_size_new"><?=lang('ionize_label_thumb_size')?></label>
					</dt>
					<dd>
						<input id="thumb_size_new" name="thumb_size_new" type="text" class="inputtext w140" value="" />
					</dd>
				</dl>

				<!-- Thumb ref size (width or height) ? -->
				<dl class="small">
					<dt>
						<label><?=lang('ionize_label_thumb_sizeref')?></label>
					</dt>
					<dd>
						<input class="inputradiobox" type="radio" name="thumb_sizeref_new" id="thumb_sizeref_new1" value="width" checked="checked" /><label for="thumb_sizeref_new1"><?=lang('ionize_label_thumb_sizeref_width')?></label>
						<input class="inputradiobox" type="radio" name="thumb_sizeref_new" id="thumb_sizeref_new2" value="height" /><label for="thumb_sizeref_new2"><?=lang('ionize_label_thumb_sizeref_height')?></label>
					</dd>
				</dl>

				<!-- Thumb square resize ? -->
				<dl class="small">
					<dt>
						<label for="thumb_square_new"><?=lang('ionize_label_thumb_square')?></label>
					</dt>
					<dd>
						<input class="inputcheckbox" type="checkbox" name="thumb_square_new" id="thumb_square_new" value="true" />
					</dd>
				</dl>

				<!-- Thumb unsharp mask ? -->
				<dl class="small">
					<dt>
						<label for="thumb_unsharp_new"><?=lang('ionize_label_thumb_unsharp')?></label>
					</dt>
					<dd>
						<input class="inputcheckbox" type="checkbox" name="thumb_unsharp_new" id="thumb_unsharp_new" value="true" />
					</dd>
				</dl>

				<!-- Submit button  -->
				<dl class="small last">
					<dt>&#160;</dt>
					<dd>
						<input id="submit_thumb" type="submit" class="submit" value="<?= lang('ionize_button_save') ?>" />
					</dd>
				</dl>

			</form>

		</div> <!-- /element -->






	</div> <!-- /togglers -->

</div> <!-- /sidecolumn -->


<!-- Main Column -->
<div id="maincolumn">


	<h2 class="main settings" id="main-title"><?= lang('ionize_title_technical_settings') ?></h2>
	
	<form name="settingsForm" id="settingsForm" method="post" action="<?= admin_url() ?>setting/save_technical">


		<!-- Google Analytics -->
		<h3 class="toggler1"><?=lang('ionize_title_google_analytics')?></h3>

		<div class="element1">

			<dl class="last">
				<dt>
					<label for="google_analytics" title="<?=lang('ionize_help_setting_google_analytics')?>"><?=lang('ionize_label_google_analytics')?></label>
				</dt>
				<dd>
					<textarea name="google_analytics" id="google_analytics" class="w360 h160"><?= htmlentities(stripslashes(Settings::get('google_analytics')), ENT_QUOTES, 'utf-8') ?></textarea>
				</dd>
			</dl>
		</div>

		<!-- Article management -->
		<h3 class="toggler1"><?=lang('ionize_title_article_management')?></h3>

		<div class="element1">
			<dl class="last">
				<dt>
					<label for="texteditor"><?=lang('ionize_label_texteditor')?></label>
				</dt>
				<dd>
					<select class="select mb5" name="texteditor" id="texteditor">
						<?php foreach($texteditors as $key=>$t) :?>
							<option value="<?= $t ?>" <?php if(Settings::get('texteditor') == $t) :?> selected="selected" <?php endif ;?>><?= $t ?></option>
						<?php endforeach ;?>
					</select>
				</dd>

				<!-- TinyMCE toolbar buttons -->
				<dt>
					<label for="texteditor" title="<?=lang('ionize_help_tinybuttons')?>"><?=lang('ionize_label_tinybuttons')?></label>
				</dt>
				<dd>
					1 <input class="inputtext w360 mb5" id="tinybuttons1" name="tinybuttons1" type="text" value="<?= Settings::get('tinybuttons1') ?>"/><br />
					2 <input class="inputtext w360 mb5" id="tinybuttons2" name="tinybuttons2" type="text" value="<?= Settings::get('tinybuttons2') ?>"/><br />
					3 <input class="inputtext w360" id="tinybuttons3" name="tinybuttons3" type="text" value="<?= Settings::get('tinybuttons3') ?>"/><br />
					<a id="texteditor_default"><?=lang('ionize_label_restore_tinybuttons')?></a>
				</dd>
			</dl>
		</div>

		<!-- Media management -->
		<h3 class="toggler1"><?=lang('ionize_title_media_management')?></h3>

		<div class="element1">
			<dl>
				<dt>
					<label for="filemanager"><?=lang('ionize_label_filemanager')?></label>
				</dt>
				<dd>
					<select class="select" name="filemanager" id="filemanager">
						<?php foreach($filemanagers as $key=>$f) :?>
							<option value="<?= $f ?>" <?php if(Settings::get('filemanager') == $f) :?> selected="selected" <?php endif ;?>><?= $f ?></option>
						<?php endforeach ;?>
					</select>
				</dd>
			</dl>
	
			<dl>
				<dt>
					<label for="files_path" title="<?=lang('ionize_help_setting_files_path')?>"><?=lang('ionize_label_files_path')?></label>
				</dt>
				<dd>
					<input name="files_path" id="files_path" class="inputtext w240" type="text" value="<?= Settings::get('files_path') ?>"/>
				</dd>
			</dl>
	
			<!-- Supported media extensions, by media type -->
			<dl>
				<dt>
					<label for="media_type_picture" title="<?=lang('ionize_help_setting_media_type_picture')?>"><?=lang('ionize_label_media_type_picture')?></label>
				</dt>
				<dd>
					<input name="media_type_picture" id="media_type_picture" class="inputtext w240" type="text" value="<?= Settings::get('media_type_picture') ?>"/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="media_type_music" title="<?=lang('ionize_help_setting_media_type_music')?>"><?=lang('ionize_label_media_type_music')?></label>
				</dt>
				<dd>
					<input name="media_type_music" id="media_type_music" class="inputtext w240" type="text" value="<?= Settings::get('media_type_music') ?>"/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="media_type_video" title="<?=lang('ionize_help_setting_media_type_video')?>"><?=lang('ionize_label_media_type_video')?></label>
				</dt>
				<dd>
					<input name="media_type_video" id="media_type_video" class="inputtext w240" type="text" value="<?= Settings::get('media_type_video') ?>"/>
				</dd>
			</dl>
	
			<dl class="last">
				<dt>
					<label for="media_type_file" title="<?=lang('ionize_help_setting_media_type_file')?>"><?=lang('ionize_label_media_type_file')?></label>
				</dt>
				<dd>
					<input name="media_type_file" id="media_type_file" class="inputtext w240" type="text" value="<?= Settings::get('media_type_file') ?>"/>
				</dd>
			</dl>

			<dl class="last">
				<dt>
					<label for="media_thumb_size" title="<?=lang('ionize_help_media_thumb_size')?>"><?=lang('ionize_label_media_thumb_size')?></label>
				</dt>
				<dd>
					<input name="media_thumb_size" id="media_thumb_size" class="inputtext w40" type="text" value="<?= Settings::get('media_thumb_size') ?>"/>
				</dd>
			</dl>

		</div>

		<!-- Thumbnails -->
		<?php if ( ! empty($thumbs)) :?>
			<h3 class="toggler1"><?=lang('ionize_title_thumbs')?></h3>
			
			<div class="element1">
				<div id="thumbs">
				
				<?php 
					foreach($thumbs as $thumb)
					{
						$settings = explode(",", $thumb['content']);
						$setting = array(
							'dir' =>	substr($thumb['name'], strpos($thumb['name'], '_') + 1 ),
							'sizeref' => 	$settings[0],
							'size' => 	$settings[1],
							'square' => isset($settings[2]) ? $settings[2] : '0',
							'unsharp' => isset($settings[3]) ? $settings[3] : '0'
						);
						
					?>
					
					<div id="<?=$thumb['id_setting']?>">	
						
						<!-- Dir -->
						<dl>
							<dt>
								<label for="thumb_name_<?=$thumb['id_setting']?>"><?=lang('ionize_label_thumb_dir')?></label>
							</dt>
							<dd>
								<input name="thumb_name_<?=$thumb['id_setting']?>" id="thumb_name_<?=$thumb['id_setting']?>" class="inputtext w140" type="text" value="<?= $setting['dir'] ?>"/>
								<img  title="<?=lang('ionize_label_delete')?>" id="delThumb_<?=$thumb['id_setting']?>" class="inputicon pointer" src="<?= theme_url() ?>images/icon_16_delete.png" />
							</dd>
						</dl>
		
						<!-- Size -->
						<dl>
							<dt>
								<label for="thumb_size_<?=$thumb['id_setting']?>"><?=lang('ionize_label_thumb_size')?></label>
							</dt>
							<dd>
								<input name="thumb_size_<?=$thumb['id_setting']?>" id="thumb_size_<?=$thumb['id_setting']?>" class="inputtext w140" type="text" value="<?= $setting['size'] ?>"/>
							</dd>
						</dl>
		
						<!-- Size Reference -->
						<dl>
							<dt>
								<label><?=lang('ionize_label_thumb_sizeref')?></label>
							</dt>
							<dd>
								<input <?php if ($setting['sizeref'] == 'width'):?>checked="checked"<?php endif;?> class="inputradiobox" type="radio" name="thumb_sizeref_<?=$thumb['id_setting']?>" id="thumb_sizeref_<?=$thumb['id_setting']?>1" value="width" /><label for="thumb_sizeref_<?=$thumb['id_setting']?>1"><?=lang('ionize_label_thumb_sizeref_width')?></label>
								<input <?php if ($setting['sizeref'] == 'height'):?>checked="checked"<?php endif;?> class="inputradiobox" type="radio" name="thumb_sizeref_<?=$thumb['id_setting']?>" id="thumb_sizeref_<?=$thumb['id_setting']?>2" value="height" /><label for="thumb_sizeref_<?=$thumb['id_setting']?>2"><?=lang('ionize_label_thumb_sizeref_height')?></label>
							</dd>
						</dl>
	
						<!-- Square ? -->
						<dl>
							<dt>
								<label for="thumb_square_<?=$thumb['id_setting']?>"><?=lang('ionize_label_thumb_square')?></label>
							</dt>
							<dd>
								<input <?php if ($setting['square'] == 'true'):?>checked="checked"<?php endif;?> class="inputcheckbox" type="checkbox" name="thumb_square_<?=$thumb['id_setting']?>" value="true" />
							</dd>
						</dl>
		
						<!-- Unsharp ? -->
						<dl>
							<dt>
								<label for="thumb_unsharp_<?=$thumb['id_setting']?>"><?=lang('ionize_label_thumb_unsharp')?></label>
							</dt>
							<dd>
								<input <?php if ($setting['unsharp'] == 'true'):?>checked="checked"<?php endif;?> class="inputcheckbox" type="checkbox" name="thumb_unsharp_<?=$thumb['id_setting']?>" value="true" />
								<hr/>
							</dd>
						</dl>
						
					</div>
				
					
					<?php
					}
					?>
		
				</div>
			</div>	

			<!-- Thumbs used by ionize 
			<h3 class="toggler1"><?=lang('ionize_title_thumbs_system')?></h3>
			
			<div class="element1">
			
				<dl class="last">
					<dt>
						<label  title="<?=lang('ionize_help_setting_system_thumb_list')?>"><?=lang('ionize_label_thumbs_system')?></label>
					</dt>
					<dd>
						<?php
						
						$system_thumb_list = Settings::get('system_thumb_list');
						
						?>
						<input <?php if (empty($system_thumb_list)) :?>checked="checked"<?php endif;?> class="inputradio" type="radio" name="system_thumb_list" id="system_thumb_list" value="" />
						<label for="system_thumb_list"><?= lang('ionize_label_thumb_automatic') ?></label>
						<br/>
					
					<?php 
						foreach($thumbs as $thumb)
						{
							$dir = substr($thumb['name'], strrpos($thumb['name'], '_') + 1 );
							?>
			
							<input <?php if (Settings::get('system_thumb_list') && Settings::get('system_thumb_list') == $thumb['name']):?>checked="checked"<?php endif;?> class="inputradio" type="radio" name="system_thumb_list" id="system_thumb_list_<?=$dir?>" value="<?=$thumb['name']?>" />
							<label for="system_thumb_list_<?=$dir?>"><?=$dir?></label>
							<br/>
							<?php
						}
					?>
					</dd>
				</dl>
			</div>
			
			-->
				
		<?php endif ;?>	

		<!-- extend fields -->
		<h3 class="toggler1"><?=lang('ionize_title_extend_fields')?></h3>
		
		<div class="element1">
			<dl class="last">
				<dt>
					<label for="use_extend_fields"><?=lang('ionize_label_extend_fields_activate')?></label>
				</dt>
				<dd>
					<input <?php if (Settings::get('use_extend_fields') == '1'):?>checked="checked"<?php endif;?> class="inputcheckbox" type="checkbox" name="use_extend_fields" id="use_extend_fields" value="1" />
				</dd>
			</dl>
		</div>
		
		<!-- Form antispam key -->
		<h3 class="toggler1"><?=lang('ionize_title_form_antispam_key')?></h3>

		<div class="element1">
		
			<!-- Current key -->
			<dl class="last">
				<dt>
					<label for="form_antispam_key"><?=lang('ionize_label_current_antispam_key')?></label>
				</dt>
				<dd>
					<input id="form_antispam_key" name="form_antispam_key" type="text" class="inputtext w300 left" value="<?= $form_antispam_key ?>" />
					<a class="icon left refresh ml5" id="antispamRefresh" title="<?= lang('ionize_label_refresh_antispam_key')?>"></a>
				</dd>
			</dl>
		
		
		</div>
	</form>
	
	<!-- Admin URL -->
	<h3 class="toggler1"><?=lang('ionize_title_admin_url')?></h3>

	<div class="element1">
		
		<form name="adminUrlForm" id="adminUrlForm" method="post" action="<?= admin_url() ?>setting/save_admin_url">

			<p>
				<label for="admin_url" title="<?=lang('ionize_help_setting_admin_url')?>"><?= base_url() ?>&nbsp;&nbsp;<input id="admin_url" name="admin_url" class="inputtext w120" value="<?=config_item('admin_url')?>" /></label>
				<input id="submit_admin_url" type="submit" class="submit" value="<?= lang('ionize_button_save') ?>" />
			</p>
		</form>
	
	</div>
	

</div> <!-- /maincolumn -->


<script type="text/javascript">
	
	/**
	 * Panel toolbox
	 *
	 */
	MUI.initToolbox('setting_technical_toolbox');


	/**
	 * Options Accordion
	 *
	 */
	MUI.initAccordion('.toggler', 'div.element');
	MUI.initAccordion('.toggler1', 'div.element1');

	/**
	 * Init help tips on label
	 *
	 */
	MUI.initLabelHelpLinks('#settingsForm');


	/**
	 * Database form action
	 * see mocha/init-forms.js for more information about this method
	 */
	MUI.setFormSubmit('databaseForm', 'submit_database', 'setting/save_database/true', 'mainPanel', 'setting/technical');

	/**
	 * New Thumb form action
	 * see mocha/init-forms.js for more information about this method
	 */
	MUI.setFormSubmit('thumbForm', 'submit_thumb', 'setting/save_thumb/true', 'mainPanel', 'setting/technical');

	/**
	 * SMTP form action
	 * see mocha/init-forms.js for more information about this method
	 */
	MUI.setFormSubmit('smtpForm', 'submit_smtp', 'setting/save_smtp/true', 'mainPanel', 'setting/technical');

	/**
	 * Admin URL form action
	 * see mocha/init-forms.js for more information about this method
	 */
	MUI.addConfirmation(
		'changeAdminUrl', 
		'submit_admin_url',
		function()
		{
			MUI.sendData('setting/save_admin_url', $('adminUrlForm'))
		},
		Lang.get('ionize_confirm_change_admin_url')
	);
	


	$('antispamRefresh').addEvent('click', function(e)
	{
		e.stop();
		var key = ION.generateKey(32);
		$('form_antispam_key').value = key;
		$('form_antispam_key').highlight();
	});


	/** 
	 * Add Confirmation window on thumb delete icons
	 * See mocha/init-windows.js for more information about this method
	 *
	 */
	$('thumbs').getElements('div').each(function(item)
	{
		var id = item.id;
		
		MUI.addConfirmation('confirm' + id, 
							'delThumb_' + id, 
							'setting/delete_thumb/' + id, 
							'ionize_confirm_element_delete'
							);
	});

	/**
	 * Restore tinyButtons toolbar to default config
	 *
	 */
	$('texteditor_default').addEvent('click', function()
	{
		$('tinybuttons1').value = 'pdw_toggle,|,bold,italic,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,|,bullist,numlist,|,link,unlink,image';
		$('tinybuttons2').value = 'fullscreen, undo,redo,|,pastetext,selectall,removeformat,|,media,charmap,hr,blockquote,|,template,|,codemirror';
		$('tinybuttons3').value = 'tablecontrols';
	
	});

	
	/**
	 * Show / hides Email details depending on the selected protocol
	 *
	 */
	changeEmailDetails = function()
	{
		if ($('protocol').value == 'mail')
		{
			$('emailSMTPDetails').setStyle('display', 'none');
			$('emailMailDetails').setStyle('display', 'block');
		}
		else
		{
			$('emailSMTPDetails').setStyle('display', 'block');
			$('emailMailDetails').setStyle('display', 'none');		
		}
	}
	changeEmailDetails();

	/**
	 * Notification to reload admin panel after changing filemanager/texteditor
	 */
	$('filemanager').addEvent('change', function()
	{
		MUI.information('<?php echo lang('ionize_onchange_filemanager') ;?>');
	});

	$('texteditor').addEvent('change', function()
	{
		MUI.information('<?php echo lang('ionize_onchange_texteditor') ;?>');
	});

</script>
