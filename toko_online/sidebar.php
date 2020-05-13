
<div id="left">
<div id="hightlight2"><i class="fa fa-tasks"></i> Kategori Furniture</div>
<div class="kiri_kategori">
<?php
 //$idbarang = "SELECT id FROM php_shop_products WHERE id=".$_GET['id']"";
echo"<form method='post' action='list_barang.php'>";
$rcat=@mysql_query("SELECT * FROM categories");

    
while ($rowcat = @mysql_fetch_array($rcat)) {

      echo"<div id='kategori'>";
         echo"<ul id=''>";
           echo "<li><i class='fa fa-check-square'></i>
           <a href=\"list_barang.php?category=".$rowcat['nama']."\">".$rowcat['nama']. " </a>";
           ?>

           <?php
           $idkat = "SELECT id categories";

           $jumlahkategori = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE id = $idkat"));
           ?> <?php echo"".$jumlahkategori.""?> </li>

<?php

         echo"</ul>";
       echo"</div>";
}
echo"</form>";
echo"</div>";
echo"<br>";
?>



<div id="hightlight2"><i class="fa fa-user-plus"></i> Twitter Kami</div>
<div class="kiri">

<<a class="twitter-timeline"  href="https://twitter.com/intent/tweet?screen_name=goldionirvana&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-show-count="false">Tweet to @goldionirvana</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs")</script>
</div><br>





</div>