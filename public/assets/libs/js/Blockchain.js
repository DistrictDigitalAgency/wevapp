function setQuestionToTheNetwork(event,questionArray)
{



    //Blockii el formulaire mel sumbission
    event.preventDefault();




    //Submit the questions lel blockchain testnet with my account :p
    console.log("blockchain should be started now !!");
    let infura = 'https://ropsten.infura.io/v3/45834af3fb554911902132eb3179979f';
    let web3 = new Web3(new Web3.providers.HttpProvider(infura));
    web3.eth.defaultAccount = '0x03dD48602ef47AfBD3cB76566D8544F35325217b';
    let abi = [{"constant": false,"inputs": [{"name": "_QID","type": "string"}],"name": "addQuestion","outputs": [],"payable": false,"stateMutability": "nonpayable","type": "function"},{"constant": false,"inputs": [{"name": "_QID","type": "string"},{"name": "answer","type": "int256"}],"name": "addVoteToQuestion","outputs": [],"payable": false,"stateMutability": "nonpayable","type": "function"},{"constant": true,"inputs": [],"name": "countQuestions","outputs": [{"name": "","type": "uint256"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": true,"inputs": [],"name": "getAllTheQuestionsIDS","outputs": [{"name": "","type": "string[]"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": true,"inputs": [{"name": "_QID","type": "string"},{"name": "answer","type": "int256"}],"name": "getVoteFromAQuestion","outputs": [{"name": "","type": "int256"}],"payable": false,"stateMutability": "view","type": "function"},{"constant": true,"inputs": [{"name": "","type": "uint256"}],"name": "questionIDS","outputs": [{"name": "","type": "string"}],"payable": false,"stateMutability": "view","type": "function"}];

    // private key of your account
    let pk  = new ethereumjs.Buffer.Buffer('37557809B184727B77CEFB5B9EF55C8643E581DB2623DF4DFEF67A51D180C58B', 'hex');
    let address = '0xc1e3b2723a3595d1d43c71433de82636577a39ad'; //Contract Address

    let contract = new web3.eth.Contract(abi,address);


    for(let i= 0; i < questionArray.length; i++)
    {

        console.log("wiioow !!");

        web3.eth.getTransactionCount(web3.eth.defaultAccount, 'pending', function (err, nonce) {
            console.log("nonce value is ", nonce+i);

            //Build the transaction object
            let details = {
                "nonce": web3.utils.toHex(nonce+i),
                "gasPrice": web3.utils.toHex(web3.utils.toWei('10', 'gwei')),
                "gasLimit": web3.utils.toHex(800000),
                "to": address,
                "data": contract.methods.addQuestion(String(questionArray[i]["id"])).encodeABI()
            };

            //Sign the transaction
            let transaction = new ethereumjs.Tx(details);
            transaction.sign(pk); //sign with my private key

            //Serialize the transaction
            let rawdata = '0x' + transaction.serialize().toString('hex');

            //send the transaction to the network
            web3.eth.sendSignedTransaction(rawdata, (err,txHash)=> {
                console.log('err:',err,'txHash:',txHash)
            });

        });

        wait(2000);

    }



        event.currentTarget.submit();
}

function wait(ms){
    var start = new Date().getTime();
    var end = start;
    while(end < start + ms) {
        end = new Date().getTime();
    }
}

