<?php defined('IN_ECJIA') or exit('No permission resources.');?>
<!-- {extends file="ecjia-platform.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
	ecjia.platform.subscribe_message.init();
// 	ecjia.platform.choose_material.init();
</script>
<!-- {/block} -->

<!-- {block name="home-content"} -->

<!-- {if $errormsg} -->
<div class="alert alert-danger">
	<strong>{lang key='wechat::wechat.label_notice'}</strong>{$errormsg}
</div>
<!-- {/if} -->

<!-- {if $warn && $type eq 0} -->
<div class="alert alert-danger">
	<strong>{lang key='wechat::wechat.label_notice'}</strong>{$type_error}
</div>
<!-- {/if} -->

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
				<div class="card-body">
					<div class="form-body">
						<div class="form-group row">
							<label class="col-lg-2 label-control text-right">{lang key='wechat::wechat.label_user_headimgurl'}</label>
							<div class="col-lg-8 controls">
								{if $info['headimgurl']}
									<img class="thumbnail" src="{$info['headimgurl']}" alt="{$info['nickname']}" style="width:80px;height:80px;" />
								{else}
									<img class="thumbnail" src="{RC_Uri::admin_url('statics/images/nopic.png')}" style="width:80px;height:80px;" />
								{/if}
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-lg-2 label-control text-right">{lang key='wechat::wechat.label_nickname'}</label>
							<div class="col-lg-8 controls">
								<span class="">{$info.nickname}</span>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-lg-2 label-control text-right">{lang key='wechat::wechat.label_remark'}</label>
							<div class="col-lg-8 controls">
								<span class="">
									{if $info.remark}
										<span class="remark_info p_r5">{$info.remark}</span>
									{/if}
									{if $info['group_id'] neq 1 && $info['subscribe'] neq 0}
									<a class="edit_remark_icon" ><i class="ft-edit"></i></a>
									{/if}
									<span class="remark" style="display:none;">
										<input class="remark w100 form-control f_l" type="text" name="remark" value="{$info.remark}" maxlength="30">
										<a class="edit_remark_url m_l10" href="javascript:;" 
											data-page="{$smarty.get.page}" data-remark="{$info.remark}" data-uid="{$info.uid}" 
											data-openid="{$info.openid}" data-url="{RC_Uri::url('weapp/platform_user/edit_remark')}">
											<i class="fa fa-check remark_ok"></i>
											<i class="fa fa-times remark_cancel"></i>
										</a>
									</span>
								</span>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-lg-2 label-control text-right">{lang key='wechat::wechat.lable_sex'}</label>
							<div class="col-lg-8 controls">
								<span class="">{if $info['sex'] == 1}{lang key='wechat::wechat.male'}{else if $info.sex == 2}{lang key='wechat::wechat.female'}{/if}</span>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-lg-2 label-control text-right">{lang key='wechat::wechat.label_province'}</label>
							<div class="col-lg-8 controls">
								<span class="">{$info['province']} - {$info['city']}</span>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-lg-2 label-control text-right">{lang key='wechat::wechat.label_user_tag'}</label>
							<div class="col-lg-8 controls">
								<span class="">{if $info['group_id'] eq 1}{else}{if $info['tag_name']}{$info['tag_name']}{else}{lang key='wechat::wechat.no_tag'}{/if}{/if}</span>
								<!-- {if $info.group_id neq 1 && $info.subscribe neq 0} -->
								<a class="set-label-btn" data-openid="{$info.openid}" data-uid="{$info.uid}" data-url="{$get_checked}" href="javascript:;"><i class="ft-tag"></i></a>
								<!-- {/if} -->
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-lg-2 label-control text-right">{lang key='wechat::wechat.label_subscribe_time'}</label>
							<div class="col-lg-8 controls">
								<span class="">{$info['subscribe_time']}</span>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-lg-2 label-control text-right"></label>
							<div class="col-lg-8 controls">
								<!-- {if $info.group_id eq 1} -->
								<a class="ajaxremove no-underline btn btn-outline-primary m_t14" data-toggle="ajaxremove" data-msg="{lang key='wechat::wechat.remove_blacklist_confirm'}" href='{RC_Uri::url("weapp/platform_user/black_user","openid={$info.openid}&uid={$info.uid}&type=remove_out&page={$smarty.get.page}")}' title="{lang key='wechat::wechat.remove_blacklist'}">{lang key='wechat::wechat.remove_blacklist'}</a>
								<!-- {else} -->
									<!-- {if $info.subscribe eq 0} -->
									<a class="btn m_t14" disabled>{lang key='wechat::wechat.add_blacklist'}</a>
									<!-- {else} -->
									<a class="ajaxremove no-underline btn btn-outline-primary m_t14" data-toggle="ajaxremove" data-msg="{lang key='wechat::wechat.add_blacklist_confirm'}" href='{RC_Uri::url("weapp/platform_user/black_user","openid={$info.openid}&uid={$info.uid}&page={$smarty.get.page}")}' title="{lang key='wechat::wechat.add_blacklist'}">{lang key='wechat::wechat.add_blacklist'}</a>
									<!-- {/if} -->
								<!-- {/if} -->
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="set_label">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">{lang key='wechat::wechat.set_tag'}</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
			</div>
			<!-- {if $errormsg} -->
		    <div class="alert alert-danger">
	            <strong>{lang key='wechat::wechat.label_notice'}</strong>{$errormsg}
	        </div>
			<!-- {/if} -->
			
			<!-- {if $warn} -->
				<!-- {if $type eq 0} -->
				<div class="alert alert-danger">
					<strong>{lang key='wechat::wechat.label_notice'}</strong>{$type_error}
				</div>
				<!-- {/if} -->
			<!-- {/if} -->
			
			<form class="form" method="post" action="{$label_action}&action=set_user_label" name="label_form">
				<div class="modal-body tag_popover">
					<div class="popover_inner p_b0">
						<div class="popover_content">
							<div class="popover_tag_list">
							<!-- {foreach from=$group_list.item item=val} -->
							<label class="frm_checkbox_label">
								{if $val.group_id neq 1}
								<input type="checkbox" class="frm_checkbox" name="tag_id[]" value="{$val.group_id}" id="tag_{$val.group_id}">
								<label for="tag_{$val.group_id}"></label>
								<span class="lbl_content">{$val.name}</span>
								{/if}
							</label>
							<!-- {/foreach} -->
							</div>
							<span class="label_block hide ecjiafc-red">{lang key='wechat::wechat.up_tag_count'}</span>
						</div>
			   		</div>
		   		</div>
		   	
			   	<div class="modal-footer justify-content-center">
			   		<input type="hidden" name="openid" />
			   		<input type="hidden" name="uid" />
					<button type="button" class="btn btn-outline-primary set_label" {if $errormsg}disabled{/if}>{lang key='wechat::wechat.ok'}</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- {/block} -->