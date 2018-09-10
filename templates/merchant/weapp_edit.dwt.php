<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia-merchant.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
	ecjia.merchant.weapp.init();
</script>
<!-- {/block} -->

<!-- {block name="home-content"} -->
<div class="page-header">
	<div class="pull-left">
		<h2><!-- {if $ur_here}{$ur_here}{/if} --></h2>
  	</div>
  	<div class="pull-right">
  		{if $action_link}
		<a href="{$action_link.href}" class="btn btn-primary data-pjax">
			<i class="fa fa-reply"></i> {$action_link.text}
		</a>
		{/if}
  	</div>
  	<div class="clearfix"></div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel">
			<div class="panel-body">
				<form class="form-horizontal" action="{$form_action}" method="post" name="theForm" enctype="multipart/form-data">
					<div class="tab-content">
						<fieldset>
							<div class="row-fluid edit-page">
								{if $wxapp_info.id neq ''}
								<div class="form-group">
									<label class="control-label col-lg-2">UUID：</label>
									<div class="controls col-lg-6 l_h30">
										{$wxapp_info.uuid}<br>
										<input type="hidden" name="uuid" value="{$wxapp_info.uuid}" />
									</div>
								</div>
								{/if}

								<div class="form-group">
									<label class="control-label col-lg-2">小程序名称：</label>
									<div class="controls col-lg-6">
										<input class="form-control" type="text" name="name" id="name" value="{$wxapp_info.name}" />
									</div>
									<span class="input-must">{lang key='system::system.require_field'}</span>
								</div>

								<div class="form-group">
		                            <label class="control-label col-lg-2">{lang key='platform::platform.lable_logo'}</label>
		                            <div class="col-lg-6">
		                                <div class="fileupload fileupload-{if $wxapp_info.logo}exists{else}new{/if}" data-provides="fileupload">
		                                    {if $wxapp_info.logo}
		                                    <div class="fileupload-{if $wxapp_info.logo}exists{else}new{/if} thumbnail" style="max-width: 60px;">
		                                        <img src="{$wxapp_info.logo}" alt="{lang key='platform::platform.look_picture'}" style="width:50px; height:50px;"/>
		                                    </div>
		                                    {/if}
		                                    <div class="fileupload-preview fileupload-{if $wxapp_info.logo}new{else}exists{/if} thumbnail" style="max-width: 60px;max-height: 60px;line-height: 10px;"></div>
		                                    <span class="btn btn-primary btn-file btn-sm">
		                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> 浏览</span>
		                                        <span class="fileupload-exists"> 修改</span>
		                                        <input type="file" class="default" name="platform_logo" />
		                                    </span>
		                                    <a class="btn btn-danger btn-sm fileupload-exists" {if $wxapp_info.logo}data-toggle="ajaxremove" data-msg="您确定要删除该logo吗？" {else}data-dismiss="fileupload"{/if} href='{url path="weapp/merchant/remove_logo" args="id={$wxapp_info.id}"}'>删除</a>
		                                </div>
		                            </div>
		                        </div>

								<div class="form-group">
									<label class="control-label col-lg-2">{lang key='platform::platform.lable_appid'}</label>
									<div class="controls col-lg-6">
										<input class="form-control" type="text" name="appid" id="appid" value="{$wxapp_info.appid}" />
									</div>
									<span class="input-must">{lang key='system::system.require_field'}</span>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-2">{t}AppSecret：{/t}</label>
									<div class="controls col-lg-6">
										<input class="form-control" type="text" name="appsecret" id="appsecret" value="{$wxapp_info.appsecret}" />
									</div>
									<span class="input-must">{lang key='system::system.require_field'}</span>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-2">{lang key='platform::platform.lable_status'}</label>
									<div class="col-lg-6 chk_radio">
										<input type="radio" name="status" value="1" {if $wxapp_info.status eq 1}checked{/if} id="radio_1"><label for="radio_1">{lang key='platform::platform.open'}</label>
	                                    <input type="radio" name="status" value="0" {if $wxapp_info.status eq 0}checked{/if} id="radio_0"><label for="radio_0">{lang key='platform::platform.close'}</label>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-2">{lang key='platform::platform.lable_sort'}</label>
									<div class="controls col-lg-6">
										<input class="form-control" type="text" name="sort" id="sort" value="{$wxapp_info.sort|default:0}" />
									</div>
								</div>

								<div class="form-group">
		        					<div class="col-lg-offset-2 col-lg-6">
		        						{if $wxapp_info.id eq ''}
		        						<input type="submit" name="submit" value="{lang key='platform::platform.confirm'}" class="btn btn-info" />
		        						{else}
		        						<input type="submit" name="submit" value="{lang key='platform::platform.update'}" class="btn btn-info" />
		        						{/if}
										<input name="id" type="hidden"value="{$wxapp_info.id}">
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- {/block} -->
