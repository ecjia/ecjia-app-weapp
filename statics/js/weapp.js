// JavaScript Document
;(function(app, $) {
	app.weapp = {
		init : function() {
			ecjia.admin.weapp.search();
			ecjia.admin.weapp.edit();
		},
		
		//小程序列表 搜索/筛选
		search : function() {
			$("form[name='searchForm']").on('submit', function(e) {
				e.preventDefault();
				var keywords = $("input[name='keywords']").val();
				var url = $(this).attr('action'); 
				if (keywords) {
					url += '&keywords=' + keywords;
				}
				ecjia.pjax(url);
			});
		},
		
		//小程序 添加/编辑
		edit : function() {
			var $form = $('form[name="theForm"]');
			var option = {
				rules:{
					name : {required : true},
					appid : {required : true},
					appsecret : {required : true},
				},
				messages:{
					name : {
						required : "请输入小程序名称",
					},
					appid : {
						required : "请输入appid",
					},
					appsecret : {
						required : "请输入appsecret",
					}
				},
				submitHandler : function() {
					$form.ajaxSubmit({
						dataType : "json",
						success : function(data) {
							ecjia.admin.showmessage(data); 
						}
					});
				}
			}
			var options = $.extend(ecjia.admin.defaultOptions.validate, option);
			$form.validate(options);
		}
	};
})(ecjia.admin, jQuery);

//end