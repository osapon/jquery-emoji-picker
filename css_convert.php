<?php
$css = file_get_contents("./css/jquery.emojipicker.tw.css");
$res = preg_match_all('/url\("(.+?)"\)/', $css, $match);
$preload = '';
$max = count($match[1]);
foreach( $match[1] as $idx => $url ) {
  printf("%d/%d\n", $idx, $max);
  $b64 = base64_encode(file_get_contents($url));
  $css = str_replace( $url, 'data:image/png;base64,'.$b64, $css );
}
file_put_contents("./css/jquery.emojipicker.tw2.css", $css);
