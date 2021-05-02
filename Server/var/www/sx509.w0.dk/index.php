<?php
/*  CREATE TABLE users(email TEXT PRIMARY KEY, serial TEXT, cn TEXT, challenge TEXT, end TEXT); */
$email = "";
$name = "";
$regex =  "echo \$_SERVER[\"SSL_CLIENT_S_DN\"]";
if (isset($_SERVER["SSL_CLIENT_S_DN"])) {
	$email = $_SERVER["SSL_CLIENT_S_DN"];
	if (preg_match("/=([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,})/i", $_SERVER["SSL_CLIENT_S_DN"], $m)) {
		$email = $m[1];
		$regex = "if (preg_match(\"/=([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,})/i\", \$_SERVER[\"SSL_CLIENT_S_DN\"], \$m)) echo \$m[1]";
	}

	if (preg_match("/(?<=CN=).*/i", $_SERVER["SSL_CLIENT_S_DN"], $x)){
		$userName = $x[0];
	}
}
?><!DOCTYPE html><html lang="en"><head>
<title>Client Certificate Demo</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src='node_modules/web3/dist/web3.min.js'></script>

<body onload = "getValue()">

<?= $_SERVER['commonName']?>
<body>

	<br /><br />
    Status: <span id="status">Loading...</span>

    <script type="text/javascript">
        async function loadWeb3() {
            if (window.ethereum) {
                window.web3 = new Web3(window.ethereum);
                window.ethereum.enable();
            }
        }

        async function loadContract() {
            return await new window.web3.eth.Contract([
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "key",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "value",
				"type": "string"
			}
		],
		"name": "UploadCertInfo",
		"outputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "userAddess",
				"type": "address"
			},
			{
				"internalType": "string",
				"name": "key",
				"type": "string"
			}
		],
		"name": "getValue",
		"outputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
        ],'0xb94b7c4b3c74ec0268f5cacb146bdb3c74598c64');
    }
        //load();

		 //const value = await window.contract.methods.getValue('0xAc2F942bDD95680011EbF90799a12486729531a5', 'f408a2d839c2c71c').call();
			//console.log(value);

		async function getCurrentAccount() {
		const accounts = await window.web3.eth.getAccounts();
		return accounts[0];
        }
        async function getValue() {
            updateStatus('fetching value ...');
			const account = await getCurrentAccount();
            const value = await window.contract.methods.getValue(account,'<?= strtolower($_SERVER["SSL_CLIENT_SERIAL"]) ?>').call();
            updateStatus(`Value: ${value}`);
        }
        async function load() {
            await loadWeb3();
            window.contract = await loadContract();
            updateStatus('Ready!');
        }

        function updateStatus(status) {
            const statusEl = document.getElementById('status');
            statusEl.innerHTML = status;
            console.log(status);
        }

        load();


    </script>
</body>

<style>
    body {
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
    BODY {
    	margin: 2em;
    }
    TABLE {
    	border: 1px solid;
    	border-collapse: collapse;
    }
    TH, TD {
    	border: 1px solid;
    }
    TH {
    	text-align: left;
    }
</style>
</head>
<body>
<p>[Main page <a href="https://ssltesting1.com/">Click here</a>]</p>
	<h1>Client Certificate Demo</h1>



<?php if (0 == strlen($_SERVER["SSL_CLIENT_SERIAL"].$_SERVER["SSL_CLIENT_FINGERPRINT"])) { ?>
<p>Error: The server did not receive a PKCS#12 certificate from your browser.</p>
<p>Something went wrong. You have not imported the client certificate correctly.</p>
<?php } else { ?>
<h2>Welcome: <?= $userName ?> '<?= $_SERVER["SSL_CLIENT_SERIAL"] ?>'.</h2>
<!-- <p>Source: <tt>Welcome: &amp;lt;&lt;?php <?= $regex ?> ?&gt;&amp;gt; '&lt;<?= $_SERVER["SSL_CLIENT_SERIAL"] ?>&gt;'</tt></p> -->
<p>Welcome <b><?= $email ?></b>.
Currently we have not registered and approved your serial number '<?= $_SERVER["SSL_CLIENT_SERIAL"] ?>'.
This will either be done by our admin or email-confirm blah blah blah (not implemented yet)
</p>
<br />
<hr />
<table summary="Environment">
<caption>Environment variables which match <tt>SSL_*</tt></caption>
<thead><tr><th>Key</th><th>Value</th></tr></thead>
<tbody>
<?php
foreach ($_SERVER as $key => $value) {
	// if (preg_match("/SSL_/", $key)) {
	// 	if (strlen($value) > 80) {
	// 		$value = substr($value,0,70)."...";
	// 	}
		echo "<tr><td>$key</td><td><tt>$value</tt></td></tr>\n";
	//}
}
?>
</tbody></table>
<?php } /* end-if */ ?>
<?php #phpinfo(32);
?>

<!-- pre><?php
$vars = array('CCA', 'FORM', 'FORMAT', 'HTTP_ACCEPT_LANGUAGE', 'HTTP_HOST', 'HTTP_REFERER', "HTTPS", 'HTTP_USER_AGENT', 'LANG', 'ORIENTATION', "REMOTE_ADDR", 'REMOTE_HOST', 'SCRIPT_NAME', 'SERVER_NAME', 'SSL_CLIENT_I_DN', 'SSL_CLIENT_SERIAL', 'SSL_CLIENT_S_DN', 'SSL_CLIENT_S_DN_CN', 'SSL_CLIENT_S_DN_G', 'SSL_CLIENT_S_DN_S', 'SSL_CLIENT_VERIFY');
foreach ($vars as $v) {
	echo "\$_SERVER['$v'] = ".$_SERVER[$v]."\n";
}
?></pre -->
	</body>
</html>
