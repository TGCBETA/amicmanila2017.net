function Submit()
{
	var key = getKey();
	var iv  = CryptoJS.enc.Hex.parse('101112131415161718191a1b1c1d1e1f');
	var enc_u = CryptoJS.AES.encrypt($("#user").val(), key, { iv: iv }); 
	var enc_p = CryptoJS.AES.encrypt($("#pass").val(), key, { iv: iv }); 
	
	 
	var u_base64 = enc_u.ciphertext.toString(CryptoJS.enc.Base64); 
	var p_base64 = enc_p.ciphertext.toString(CryptoJS.enc.Base64);
				
	var iv_base64   = enc_u.iv.toString(CryptoJS.enc.Base64);       
	var key_base64  = enc_u.key.toString(CryptoJS.enc.Base64);
	
	
	$("#txtu_base64").val(u_base64);
	$("#txtp_base64").val(p_base64);
	$("#txtiv_base64").val(iv_base64);
	$("#txtkey_base64").val(key_base64);

	$("#login").submit();
}

function getKey()
{
	var salt = CryptoJS.lib.WordArray.random(128/8);
	var key256Bits500Iterations = CryptoJS.PBKDF2("NestleClubCMS", salt, { keySize: 256/32, iterations: 500 });
	return key256Bits500Iterations;
}
