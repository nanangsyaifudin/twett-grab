<html>
<head>
<title>#SaveKPK</title>

<meta http-equiv="refresh" content="30"/>

</head>
<body>

<br />
<center>
<div style="-webkit-box-shadow:#888888 0 0 5px 1px; background-color:#FFFFFF; border-bottom-left-radius:3px; border-bottom-right-radius:3px; border-top-left-radius:3px; border-top-right-radius:3px; box-shadow:#888888 0 0 5px 1px; height:90px; width:200px; margin-right:5px; padding:15px;">

<br />
<b>
twitter<br />
Total #hastag #SaveKPK
<br /><br />

<?php
   global $total, $hashtag;
   //$hashtag = '#supportvisitbogor2011';
   $hashtag = '#SaveKPK';
   $total = 0;
   function getTweets($hash_tag, $page) {
      global $total, $hashtag;
      $url = 'http://search.twitter.com/search.json?q='.urlencode($hash_tag).'&';
      $url .= 'page='.$page;    
      $ch = curl_init($url);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
      $json = curl_exec ($ch);
      curl_close ($ch);
      //echo "<pre>";    
      //$json_decode = json_decode($json);
      //print_r($json_decode->results);

      $json_decode = json_decode($json);        
      $total += count($json_decode->results);    
      if($json_decode->next_page){
         $temp = explode("&",$json_decode->next_page);        
         $p = explode("=",$temp[0]);                
         getTweets($hashtag,$p[1]);
      }        
   }

   getTweets($hashtag,1);
   echo $total;
?>
</div>
</b>
</center>
</body>
</html>