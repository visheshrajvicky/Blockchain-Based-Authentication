// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.7.0 <0.9.0;

contract certificateInfo{
    
    struct Info{
        string value;
    }
    
    struct ClientCert{
        mapping(string => Info) inforamtion;
    }
    
    
   address user;
    mapping(address => ClientCert) ClientCertInfo;
    
    function UploadCertInfo(string memory key, string memory value) public returns(int){
        user = msg.sender;
        ClientCertInfo[user].inforamtion[key].value = value;
        
        return 1;
    }
    
    function getValue(address userAddess, string memory key) public view returns(string memory){
        return ClientCertInfo[userAddess].inforamtion[key].value;
    }
}

