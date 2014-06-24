#!/usr/bin/php
<?php
  $stdin = fopen( 'php://stdin', 'r' );
  
  while ( !feof($stdin) ) {
    $line = fgets($stdin);
    $line = str_replace(array("\r", "\n"), '', $line);
    if ($line != '') {
      $output .= "\t<li>" . $line . "</li>\n";
    }
  }
  
  fclose( $stdin );
  
  $stdout = fopen("php://stdout", "w");
  fwrite( $stdout, "<ul>\n" . $output . "</ul>\n" );
  fclose( $stdout );
  
?>
