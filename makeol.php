#!/usr/bin/php
<?php
  $stdin = fopen( 'php://stdin', 'r' );
  
  while ( !feof($stdin) ) {
    $line = fgets($stdin);
    $line = str_replace( array("\r", "\n"), '', $line );
    $output .= "\t<li>" . $line . "</li>\n";
  }
  
  fclose( $stdin );
  
  echo "<ul>\n" . $output . "</ul>\n";
?>
