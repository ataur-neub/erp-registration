<?php

	function sent_mail($to,$from,$company_name,$subject,$msg)
	{
        //$name of from person and $from email of from person
        $headers[]= 'Reply-To: '.$company_name.' <'.$from.'>';
        $headers[]= 'Return-Path: '.$company_name.' <'.$from.'>';
        $headers[]= 'From: '.$company_name.' <'.$from.'>'; 
        //$headers[] = 'Cc: '.$from.'';
        //$headers[]= 'Organization: '.$name.'';
        $headers[]= 'MIME-Version: 1.0'; 
        $headers[]= 'Content-type: text/html; charset=iso-8859-1';
        $headers[]= 'X-Priority: 3';
        $headers[]= 'X-Mailer: PHP'. phpversion();
        
        
		mail($to, $subject, $msg, implode("\r\n", $headers));
	}


?>