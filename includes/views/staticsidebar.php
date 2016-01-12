<div class="middle_two_right_announces">
    <div id="craftysyntax_1">
        <script type="text/javascript" src="/~httpsylc/live-chat/livehelp_js.php?eo=0&amp;relative=Y&amp;department=1&amp;serversession=1&amp;pingtimes=10&amp;dynamic=Y&amp;creditline=L"></script>
    </div>
    <div class="add_area">
    <?php	$common = new common(); $slide = $common->CustomQuery("Select * from banner where publish = 1 and type = 5 order by rand()");
        while($image = mysql_fetch_object($slide))
        {

        ?>

        <?php if($image->website != "") { ?>
            <a href="<?php echo $image->website; ?>" target="_blank"> 
        <?php } ?>
            <img src="<?php echo DEFAULT_URL; ?>/images/banner/<?php echo $image->image;  ?>" alt="Banner" />
        <?php if($image->website != "") { ?></a> <?php } ?>
        <?php } ?>
    </div>
    <div class="clear"></div>
 
