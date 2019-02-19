<?php defined('IN_ECJIA') or exit('No permission resources.'); ?>
<!-- {extends file="ecjia-platform.dwt.php"} -->

<!-- {block name="footer"} -->
<script type="text/javascript">
    ecjia.platform.admin_subscribe.init();
</script>
<!-- {/block} -->
<!-- {block name="home-content"} -->

<!-- {if $errormsg} -->
<div class="alert alert-danger">
    <strong>{t domain="weapp"}温馨提示：{/t}</strong>{$errormsg}
</div>
<!-- {/if} -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {$ur_here}
                    {if $action_link}
                    <a class="btn btn-outline-primary plus_or_reply data-pjax float-right subscribe-icon-plus" href="{$action_link.href}" id="sticky_a"><i class="fa fa-plus"></i> {$action_link.text}</a>
                    {/if}
                </h4>
            </div>
            <div class="col-md-12">
                <table class="table table-hide-edit">
                    <thead>
                        <tr>
                            <th class="w150">标签名称</th>
                            <th class="w150">用户数</th>
                            <th class="w100">操作</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- {foreach from=$list.item item=val} -->
                        <tr>
                            <td>
                                <a href="{RC_Uri::url('weapp/platform_user/init')}&tag_id={$val.tag_id}" target="__blank">{$val.name}</a>
                            </td>
                            <td>{$val.count}</td>
                            <td>
                                {if $val['tag_id'] != 0 && $val['tag_id'] != 1 && $val['tag_id'] != 2}
                                <a class="subscribe-icon-edit {if $val.id eq $smarty.get.id}white{/if}" title="{lang key='wechat::wechat.edit_user_tag'}" data-name="{$val.name}" value="{$val.id}"><i class="ft-edit f_s15"></i></a>
                                <a class="ajaxremove no-underline {if $val.id eq $smarty.get.id}white{/if}" data-toggle="ajaxremove" data-msg="{lang key='wechat::wechat.remove_tag_confirm'}" href='{RC_Uri::url("weapp/platform_user/remove","id={$val.id}&tag_id={$val.tag_id}")}' title="{lang key='wechat::wechat.remove_user_tag'}"><i class="ft-trash-2 f_s15 m_l5"></i></a>
                                {/if}
                            </td>
                        </tr>
                        <!--  {foreachelse} -->
                        <tr>
                            <td class="no-records" colspan="3">{t domain="weapp"}没有找到任何记录{/t}</td>
                        </tr>
                        <!-- {/foreach} -->
                    </tbody>
                </table>
            </div>
            <!-- {$list.page} -->
        </div>
    </div>
</div>

<div class="modal fade text-left" id="add_tag">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{lang key='wechat::wechat.add_user_tag'}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- {if $errormsg} -->
            <div class="alert alert-danger">
                <strong>{t domain="weapp"}温馨提示：{/t}</strong>{$errormsg}
            </div>
            <!-- {/if} -->

            <form class="form" method="post" name="add_tag" action="{url path='weapp/platform_user/edit_tag'}">
                <div class="card-body">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-3 label-control new_tag_name text-right">{lang key='wechat::wechat.label_tag_name'}</label>
                            <div class="col-md-8 controls">
                                <input class="form-control" type="text" name="new_tag" autocomplete="off"/>
                            </div>
                            <div class="col-md-1"><span class="input-must">*</span></div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <input type="hidden" name="openid"/>
                    <input type="submit" class="btn btn-outline-primary" {if $errormsg}disabled{/if} value="{lang key='wechat::wechat.ok'}" />
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade text-left" id="edit_tag">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{lang key='wechat::wechat.edit_user_tag'}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- {if $errormsg} -->
            <div class="alert alert-danger">
                <strong>{t domain="weapp"}温馨提示：{/t}</strong>{$errormsg}
            </div>
            <!-- {/if} -->

            <form class="form" method="post" name="edit_tag" action="{url path='weapp/platform_user/edit_tag'}">
                <div class="card-body">
                    <div class="form-body">

                        <div class="form-group row">
                            <label class="col-md-3 label-control old_tag_name text-right">{lang key='wechat::wechat.label_old_tag_name'}</label>
                            <div class="col-md-8">
                                <span class="old_tag"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control text-right">{lang key='wechat::wechat.label_new_tag_name'}</label>
                            <div class="col-md-8 controls">
                                <input class="form-control" type="text" name="new_tag" autocomplete="off"/>
                            </div>
                            <div class="col-md-1"><span class="input-must">*</span></div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <input type="hidden" name="id"/>
                    <input type="submit" class="btn btn-outline-primary" {if $errormsg}disabled{/if} value="{lang key='wechat::wechat.ok'}" />
                </div>
            </form>

        </div>
    </div>
</div>

<!-- {/block} -->