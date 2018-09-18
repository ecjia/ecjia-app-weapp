<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia-platform.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
	ecjia.platform.platform.init();
</script>
<!-- {/block} -->

<!-- {block name="home-content"} -->

<div class="row">
    <div class="col-12">
        <div class="card">
			<div class="card-header">
                <h4 class="card-title">
                	{$ur_here}
	               	{if $action_link}
					<a class="btn btn-outline-primary plus_or_reply data-pjax float-right" href="{$action_link.href}" id="sticky_a"><i class="fa fa-reply"></i> {$action_link.text}</a>
					{/if}
                </h4>
            </div>
            <div class="col-lg-12">
				<form class="form" method="post" name="theForm" action="{$form_action}">
					<div class="card-body">
						<div class="form-body">
							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">URL(服务器地址)：</label>
								<div class="col-lg-7 controls">
									<input class="input-xlarge form-control" name="server_url" type="text" value="{$data.server_url}" autocomplete="off" />
									<span class="help-block">必须以http://或https://开头，分别支持80端口和443端口</span>
								</div>
								<span class="input-must">{lang key='system::system.require_field'}</span>
							</div>

							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">Token(令牌)：</label>
								<div class="col-lg-7 controls">
									<input class="input-xlarge form-control" name="server_token" type="text" value="{$data.server_token}" autocomplete="off" />
									<span class="help-block">必须为英文或数字，长度为3-32字符</span>
								</div>
								<span class="input-must">{lang key='system::system.require_field'}</span>
							</div>

							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">EncodingAESKey<br>(消息加密密钥)：</label>
								<div class="col-lg-7 controls">
									<input class="input-xlarge form-control" name="aeskey" type="text" value="{$data.aeskey}" autocomplete="off" maxlength="43" />
									<span class="help-block">消息加密密钥由43位字符组成，字符范围为A-Z,a-z,0-9</span>
								</div>
								<a class="btn btn-outline-primary generate_aeskey" href="javascript:;" data-url='{url path="weapp/platform_config/generate_aeskey"}' style="height: 40px;margin-right: 15px;">随机生成</a>
								<span class="input-must">{lang key='system::system.require_field'}</span>
							</div>

							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">消息加密方式：</label>
								<div class="col-lg-7 controls">
									<input type="radio" id="encryption_method_0" name="encryption_method" value="0" {if $data.encryption_method eq 0 || !$data.encryption_method}checked{/if}><label for="encryption_method_0">明文模式<span class="help-block" style="display: inline-block;margin-top: 0;margin-left: 10px;">(不使用消息体加解密功能，安全系数较低)</span></label><br>
									<input type="radio" id="encryption_method_1" name="encryption_method" value="1" {if $data.encryption_method eq 1}checked{/if}><label for="encryption_method_1">兼容模式<span class="help-block" style="display: inline-block;margin-top: 0;margin-left: 10px;">(明文、密文将共存，方便开发者调试和维护)</span></label><br>
									<input type="radio" id="encryption_method_2" name="encryption_method" value="2" {if $data.encryption_method eq 2}checked{/if}><label for="encryption_method_2">安全模式（推荐）<span class="help-block" style="display: inline-block;margin-top: 0;margin-left: 10px;">(消息包为纯密文，需要开发者加密和解密，安全系数高)</span></label>
									<span class="help-block">请根据业务需要，选择消息加密方式，启用后将立即生效</span>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-2 label-control text-right">数据格式：</label>
								<div class="col-lg-7 controls">
								<input type="radio" id="data_type_0" name="data_type" value="xml" checked><label for="data_type_0">XML</label>
									<span class="help-block">请选择微信与开发者服务器间传输的数据格式</span>
								</div>
							</div>

						</div>
					</div>

					<div class="modal-footer justify-content-center">
						<!-- {if $data} -->
						<input class="btn btn-outline-primary" type="submit" value="{lang key='wechat::wechat.update'}" />
						<!-- {else} -->
						<input class="btn btn-outline-primary" type="submit" value="{lang key='wechat::wechat.ok'}" />
						<!-- {/if} -->
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<!-- {/block} -->
