<!DOCTYPE html><html lang="en"><head>
<title>Client Certificate Demo</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body {
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
    BODY {
        margin: 2em;
    }
</style>
</head>
<body>
<h1>Client Certificate Demo</h1>


<form>
    <input class="form-control form-stacked" name="username" placeholder="Username" type="text" required="true" id="username">
</br>
    <input class="form-control form-stacked last" name="password" placeholder="Password" type="password" required="true" id="password">
</br>
    <button >Login</button>
</form>

<!-- <h1>To store your certificate information on blockchain. </h1> -->

<!-- <form>
    <input class="form-control form-stacked" name="key" placeholder="Key" type="text" required="true" id="key">
</br>
    <input class="form-control form-stacked last" name="value" placeholder="Value" type="text" required="true" id="value">
</br>
    <button onclick="Uploadinfo();">Upload</button>
</form>

</br> -->


<p><a href="https://ssltesting2.com">Login using Certificate</a> Click here to logon with Client Certificate (use Mozilla Firefox)</p>

<br />

<p>If you are a new user than please cick here to register yourself on blockchain. <a href="register.php">Register here</a>.</p>

<!-- <script src='node_modules/web3/dist/web3.min.js'></script>

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
		
		async function getCurrentAccount() {
            const accounts = await window.web3.eth.getAccounts();
            return accounts[0];
        }

		// const value = await window.contract.methods.getValue('0xAc2F942bDD95680011EbF90799a12486729531a5', 'f408a2d839c2c71c').call();
		// console.log(value);
        async function Uploadinfo() {

			var key = document.getElementById("key").value;
      		var value = document.getElementById("value").value;
            updateStatus('Uploading data ...');
			const account = await getCurrentAccount();
			console.log(key, document.getElementById("value").value);
            await window.contract.methods.UploadCertInfo(document.getElementById("key").value,document.getElementById("value").value).send({ from: account });
            updateStatus(`Uploaded`);
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


    </script> -->

</body>
