<?php
	$P = $_POST["Data"]["P"];	
	$SM = $_POST["Data"]["SM"];
	$PD = $_POST["Data"]["PD"];
	$ASMD = $_POST["Data"]["ASMD"];

	$soapUrl = "https://app.fantasysalesteam.com/ClientDataFeedService.asmx?WSDL";
	$xml_post_string = 
		'
		<
			soapenv:Envelope
			xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope"
			xmlns:cli="https://app.fantasysalesteam.com/ClientDataFeedService"
		>			
		<soapenv:Header/>
			<soapenv:Body>
				<cli:SaveDataFeed>
					<cli:data>
						<cli:BusinessUnitId>1516</cli:BusinessUnitId>
						<cli:BusinessUnitPassword>mol4HD*_</cli:BusinessUnitPassword>
						<cli:Data>
							<cli:ClientDataFeedRecord>
								<cli:P>124</cli:P>
								<cli:SM>3</cli:SM>
								<cli:PD>5<cli:PD>
								<cli:ASMD>2015-06-15<cli:ASMD>
							</cli:ClientDataFeedRecord>
						</cli:Data>
					</cli:data>
				</cli:SaveDataFeed>
			</soapenv:Body>
		/<soapenv:Header>
		';
	$headers = array(
					"Content-type: text/xml;charset=\"utf-8\"",
					"Accept: text/xml",
					"Cache-Control: no-cache",
					"Pragma: no-cache",
					"SOAPAction: https://app.fantasysalesteam.com/ClientDataFeedService/SaveDataFeed",
					"Content-Length: ".xtrlen($xml_post_string),
					);
	$url = $soapUrl;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$response = curl_exec($ch);
	curl_close($ch);
	print $response;
	$response1 = str_replace("<soap:Body>", "", $response);
	$response2 = str_replace("</soap:Body>", "", $response1);

	$parser = simplexml_load_string($response2);
?>