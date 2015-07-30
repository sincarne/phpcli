#!/usr/bin/php
<?
$foundPlist = false;
$output = "\n";
libxml_use_internal_errors(true);

if ($argv[1]=='') {
    echo<<<EOF
\033[1mConvert .webloc files to a Markdown-formatted list.\033[0m
Files must be in XML format. Binary .webloc files can be converted with `plutil`
Usage: webloc2md [Source Directory]

EOF;
} else {
    shell_exec("plutil -convert xml1 "  . $argv[1] . "/*.webloc");
    $dirContents = scandir($argv[1]);
    foreach ($dirContents as $file) {
        if (pathinfo($argv[1] . '/' . $file, PATHINFO_EXTENSION) == 'webloc') {
            $content = simplexml_load_file($argv[1] . '/' . $file);
            if (!$content) {
                $foundPlist = true;
            } else {
                $url = $content->dict->string;
                $name = str_replace('.webloc', '', $file);
                $output.="* [$name]($url)\n";
            }
        }
    }
    if ($foundPlist) {
        $output .= "* **One or more .webloc files were binary.** You can convert them to XML using [plutil](https://developer.apple.com/library/mac/#documentation/Darwin/Reference/ManPages/man1/plutil.1.html)\n";
    }
    echo $output."\n";
}
?>
