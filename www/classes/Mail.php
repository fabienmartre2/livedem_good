<?php
Class Mail { 
	public static function send($to, $sujet, $texte, $pjs = array()) {
		$transport = Swift_MailTransport::newInstance();
		//Create the Mailer using your created Transport
		$mailer = Swift_Mailer::newInstance($transport);
		//Create the message
		$message = Swift_Message::newInstance();
		//Set the From address with an associative array
		$message->setFrom(array(EMAIL => MARQUE));
		$message->setTo($to);
		$texte_html = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<title>'.MARQUE.' - '.$sujet.'</title>
			<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
		</head>
		<style type="text/css">
		body { margin: 0 auto; padding: 0; }
		img {border: 0;}
		</style>
		<body>
		<!-- Start of Email -->
		<table width="100%" border="0"  cellspacing="0" cellpadding="0" style="background: #D2CFC8;">
		  <tr>
		    <td align="center" valign="top">			
						<!-- Start of Content -->
						<!-- Start of Header -->
						<table width="630" bgcolor="#700000" border="0" align="center" cellpadding="0" cellspacing="0" style="padding: 16px 25px;">
							<tr>
								<td  rowspan="2" align="left" valign="middle">
									<a href="'.ADRESSE.'"><img src="'.ADRESSE.'images/logo_mailing.png" alt="" style="display: block;"/></a>
								</td>
								<td  align="right" valign="bottom" style="font-family: Open Sans, Tahoma, Arial, sans-serif; font-size: 12px; font-weight: 400; color: #dfdfdf;">
								</td>
							</tr>
							<tr>
								<td align="right" valign="top" style="font-family: Open Sans, Tahoma, Arial, sans-serif; font-size: 12px; font-weight: 400; color: #dfdfdf;">
									Le  '.date('d/m/Y').',
								</td>
							</tr>
						</table>
						<!-- End of Header -->	
						
						<table width="630" bgcolor="#ffffff" border="0" cellspacing="0" cellpadding="0" style=" box-shadow: 0 0 5px #dddddd;">
							<tr>
								<td align="left" style="padding: 15px 25px">
									'.$texte.'
								</td>
							 </tr>
						</table>
						
									
						<!-- End of Content -->
							
					
						<!-- Start of Footer -->
						<table width="630" height="40" align="center" valign="middle" border="0" bgcolor="#700000" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center" valign="middle" style="font-family: Open Sans, Tahoma, Arial, sans-serif; font-size: 12px; font-weight: 300; color: #FFFFFF;">
									<br />Copyright '.MARQUE.' &copy; '.date('Y').'
								</td>
							</tr>
						</table>
		   
		    </td>
		  </tr>
		</table><!-- End of Email -->

		</body>
		</html>';
		//Give it a body
		$message->setBody($texte_html, 'text/html');
		//Give the message a subject
		$message->setSubject($sujet);
		foreach($pjs as $pj)
			$message->attach(Swift_Attachment::newInstance($pj['data'], $pj['name'], $pj['type']));
		$mailer->send($message);
	}

}