<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $params = new \stdClass();
        $client = new SoapClient("http://localhost:52790/SayHelloWS.asmx?WSDL");
        $params->firstName = "Roberto";
        $params->lastName = "Panetta";
        $resultStr = $client->SayHelloString($params)->SayHelloStringResult;
        echo $resultStr;
        echo "<br>";

        $resultJson = $client->SayHelloJson($params)->SayHelloJsonResult;
        echo $resultJson;
        echo "<br>";
        
        $resultObj = $client->SayHelloObject($params)->SayHelloObjectResult;
        echo "$resultObj->Greeting "."$resultObj->Name";
        echo "<br>";
        
        $resultLst = $client->SayAllHelloObjects($params)->SayAllHelloObjectsResult;
        $objList = $resultLst->SayHello;
        foreach ($objList as $x){
            echo "<br/>$x->Greeting "."$x->Name";            
        }
        
        ?>       
    </body>
</html>
