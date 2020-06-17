<?php
//読み込みたいRSS FeedのURL
$RSSpath = "http://rssblog.ameba.jp/maiko54street/rss20.xml";
 
$XML = simplexml_load_file($RSSpath);
$return_html = "<ul>";
$entry_date = "";
$i = 0;
foreach($XML->channel->item as $entry) {
    if($i >= 5) { //表示したい件数 5件
        break;
    }else{
        $title = $entry->title; //【記事タイトル】
        $entry_date = date('Y年m月d日', strtotime($entry->pubDate)); //【投稿日】
        $link = $entry->link; //【記事リンク】
 
        //出力する html
        $return_html.='<li>・<span class="top-date">'. $entry_date.'</span>&nbsp;<a href="'.$link.'" target="_blank">'. $title.'</a></li>';
        $i++;
    }
}
$return_html .= "</ul>";
echo $return_html;
?>