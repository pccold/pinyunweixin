<?php
$sub = new items();
$sub->item();
class items{
     public function item(){
   $items = "<!doctype html>"
  ."<html>"
  . "<head>"
  . "<meta charset=\"utf-8\">"
  . "<title>线路列表</title>"
  . "<link rel=\"stylesheet\" type=\"text/css\" href=\"css.css\">"
  . "</head>"
  . "<body>"
  . "<div class=\"container\">"
  . " <div class=\"header\"><a href=\"javascript:history.go(-1)\"><strong><</strong></a><h3>线路列表</h3></div>"
  . " <article class=\"content\">"
  . "      <ul class=\"items\">"
  . "         <li>"
  . "            <img src=\"img/img01.jpg\">"
  . "            <div class=\"content-info\">"
  . "                <h4><a href=\"#\">[错峰游]曼谷-芭堤雅5晚七日游[错峰游]曼谷-芭堤雅5晚七日游[错峰游]</a></h4>"
  . "                <p>日期：<span>12-23</span><span>12-23</span><span>12-23</span></p>"
  . "                <p><span>￥</span><strong>6300</strong></font></p>"
  . "            </div>"
  . "         </li>"
  . "      </ul>    "
  . " </article>"
  . "<div>"
  . "<body>"
  . "<html>";
   echo $items;
    }
}

