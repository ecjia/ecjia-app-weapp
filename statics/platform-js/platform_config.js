// JavaScript Document
;(function(app, $) {
	app.platform = {
		init : function() {
			ecjia.platform.platform.generate_aeskey();
			ecjia.platform.platform.theForm();
		},

		generate_aeskey: function (option) {
            $('.generate_aeskey').off('click').on('click', function (e) {
                e.preventDefault();
                var $this = $(this);
                var url = $this.attr('data-url');
                 $.post(url, function (data) {
                 	var value = data.val
                 	$('input[name="aeskey"]').val(value);
                 }, 'json');
            });
        },
		
		theForm : function() {
			var $form = $('form[name="theForm"]');
			var option = {
				rules:{
					server_url: {required : true},
					server_token : {required : true, rangelength:[3, 32]},
					aeskey : {required : true, rangelength: [42, 44]},
				},
				messages:{
					server_url: {required : '请输入URL(服务器地址)'},
					server_token : {required : '请输入Token(令牌)', rangelength: '请输入一个长度介于 3 和 32 之间的字符串'},
					aeskey : {required : '请输入EncodingAESKey(消息加密密钥)', rangelength: '长度必须为43位字符'},
				},	
				submitHandler : function() {
					$form.ajaxSubmit({
						dataType : "json",
						success : function(data) {
							ecjia.platform.showmessage(data); 
						}
					});
				}
			}
			var options = $.extend(ecjia.platform.defaultOptions.validate, option);
			$form.validate(options);
		},
	};
})(ecjia.platform, jQuery);

//end