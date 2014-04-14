$(function () {
	$('.test-submit').click(function () {
		var code = $('#AnswerCode').val();
		var $test = $(this).closest('.test');
		var answer = $test.find('.test-answer').text();
		
		$test.find('.test-input').each(function () {
			var input = $(this).text();
			var data = input.split(':');
			code = code.replace(data[0], data[1]);
		});
		
		$.ajax({
			url: 'http://api.dan.co.jp/lleval.cgi',
			data: {
				s: code,
				l: $('#AnswerLanguage').val()
			},
			dataType: 'json',
			success: function (data) {
				data.stdout = data.stdout.replace(/\r\n/g, "");
				data.stdout = data.stdout.replace(/\n/g, "");
				
				data.stderr ? 
					alert(data.stderr) : 
					(
						data.stdout == answer ? 
							alert('correct!') : 
							alert('wrong:'+data.stdout)
					)
			}
		});
	});
});