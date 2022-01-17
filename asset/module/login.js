function _msgWarn(message)
{
	return `<div class="alert alert-warning alert-dismissible fade show">
				<strong>Pesan</strong>,&nbsp;<span>${message}</span>
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>`;
}

function _msgSucc(message)
{
	return `<div class="alert alert-success alert-dismissible fade show">
				<strong>Pesan</strong>,&nbsp;<span>${message}</span>
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>`;
}

function _login()
{
	let user = $('#username');
	let pass = $('#password');
	
	if(user.val() != '' && pass.val() != '') {
		
		$.ajax({
			url: base_url + '/api/login.php',
			method: 'POST',
			data:{
				username:user.val(),
				password:pass.val()
			}
		})
		.done(function(res){
			if(res.login==true) {
				
				$('#alert-pesan').empty().append(_msgSucc("Login berhasil"));
				
				setTimeout(function(){
					window.location = base_url +'/index.php?action=home';
				},1000);
			} else {
				
				$('#alert-pesan').empty().append(_msgWarn("Username / Password anda salah"));
			}
		});
	} else {
		
		$('#alert-pesan').empty().append(_msgWarn("username / password tidak boleh kosong"));
	}
}