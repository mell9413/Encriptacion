<?php 
if (isset($_POST)) {
        $texto_plano = $_POST["user"];
    if (empty ( $texto_plano )){
        echo "<p style='color: red'>No dejar en blanco</p>";
    }
    else{
        echo "<p style='color: blue'>Acción llevada a cabo correctamente</p>";
        $res=openssl_pkey_new(array(
            "digest_alg" => "sha512",
            "private_key_bits" => 1024,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ));
        openssl_pkey_export($res, $privkey);
        $pubkey=openssl_pkey_get_details($res);
        $pubkey=$pubkey["key"];
        openssl_public_encrypt($texto_plano, $crypted, $pubkey);
//        echo $crypted;
//        echo "\n";
//        echo base64_encode($crypted);
//        echo "\n";
        openssl_private_decrypt($crypted, $decrypted, $privkey);
        echo $decrypted;
    }
}
?>