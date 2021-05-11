<?php
//creating a memo template

 $fh = fopen('php://memory', 'w');//writing to php memory

 
    $text = 
    " 
	Title:
	-----------------------------------------------------------------	

    "; // default text in the template
fputs($fh, $text);


    //move back to beginning of file
   fseek($fh, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/doc');
    header('Content-Disposition: attachment; filename="memo_template.doc";');

    //output all remaining data on a file pointer
    fpassthru($fh);
       fseek($fh, 0, SEEK_END);

    ?>