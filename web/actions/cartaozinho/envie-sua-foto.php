<?php
include("/var/frontend/web/actions/includes/functions.php");


if($_SERVER['REQUEST_METHOD'] == 'POST') {
  //if(strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) > 0) {
    //$to = "georgia.catarina@gmail.com"; //"vilasesamooficial@gmail.com";
    $to = "cartaozinhonacopa@gmail.com	";
    $email = strip_tags($_REQUEST['email']);
    $name = strip_tags($_REQUEST['nome']);
    $from = "{$name} <{$email}>";
    $subject = '[Cartãozinho][Copa] '.$name.' <'.$email.'>';
    
    $message = "Formulário Preenchido em " . date("d/m/Y") . " as " . date("H:i:s") . ", seguem abaixo os dados:<br><br>";
		 
    while(list($field, $value) = each($_REQUEST)) {
      if(!in_array(ucwords($field), array('Form_action', 'X', 'Y', 'Enviar', 'Undefinedform_action')))
        $message .= "<b>" . ucwords($field) . ":</b> " . strip_tags($value) . "<br>";
    }
		
		if(isset($_FILES['datafile']['tmp_name'])) {
			
	    $file_name = basename($_FILES['datafile']['name']);
	    $data = file_get_contents($_FILES['datafile']['tmp_name']); 
	    $file_contents = chunk_split(base64_encode($data));
	    $file_size = $_FILES['datafile']['size'];
	    $file_mime_type = getMimeType($_FILES['datafile']['name']);
	    //$file_mime_type = "image/jpg";
	    //$extension = strtolower(end(explode('.',$_FILES['datafile']['name'])));
	    //$file_mime_type = "image/".$extension;
	    $attach = array();
	    $attach[] = array($_FILES['datafile']['tmp_name'], $file_mime_type);
	    //die($file_mime_type);
	    if (!in_array($file_mime_type, array("image/gif", "image/png", "image/jpg"))) {
	      if (unlink($_FILES['datafile']['tmp_name'])) {
	        header("Location:http://tvcultura.cmais.com.br/cartaozinho/mande-sua-foto?error=2");
	        //die("1");
	      }
	    }
	    else if ($file_size > 15728640) { // 15MB
	      if (unlink($_FILES['datafile']['tmp_name'])) {
	        header("Location:http://tvcultura.cmais.com.br/cartaozinho/mande-sua-foto?error=3");
	        //die("2");
	      }
	    }
	    else {
	      
	      if(sendMailAtt($to, $from, $subject, $message, $attach)) {
	        if (unlink($_FILES['datafile']['tmp_name'])) {
	        	//die("Location: http://172.20.16.219/cartaozinho/mande-sua-foto?success=1#esquerda");
	          header("Location:http://tvcultura.cmais.com.br/cartaozinho/mande-sua-foto?success=2");
	          
	        }
	      }
	      else{
	        if (unlink($_FILES['datafile']['tmp_name'])) {
	          header("Location:http://tvcultura.cmais.com.br/cartaozinho/mande-sua-foto?error=1");
	          //die("3");
	        }
	      }
	    }
	  }else{
	   	if(sendMailAtt($to, $from, $subject, $message)) {
	   			die("Location:http://tvcultura.cmais.com.br/cartaozinho/mande-sua-foto?success=2#esquerda");
	        header("Location:http://tvcultura.cmais.com.br/cartaozinho/mande-sua-foto?success=2#esquerda");
				
			}else{
	    	header("Location:http://tvcultura.cmais.com.br/cartaozinho/mande-sua-foto?error=1#esquerda");
	        die("3");
	      
	    }
	  }
  //}
}

?>                