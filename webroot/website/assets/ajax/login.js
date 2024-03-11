function registerUser()
{
	var username = document.getElementById('username').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var password2 = document.getElementById('password2').value;
	var dataString='username='+username + 'email='+email + '&password='+password + '&password2='+password2;
	
	$.ajax(
	{
		type:"post",
		url: "/?page=ajax&function=userlogin",
		data:dataString,
		cache:false,
		success: function(html)
		{
			$('#ajax').html(html);
		}
	});
	return false;
}