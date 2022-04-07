<?php
    $fp="chucnang/thongke/counter.txt";
    $fo=fopen($fp, "r");
    $count=fread($fo, filesize($fp));
    $count++;
    $fc = fclose($fo);
    $fo = fopen($fp, "w");
    $fw = fwrite($fo, $count);
    $fc=fclose($fo);
?>
<div class="thongke border" style="background: #ffffff;">
    <h4 class="title">Thống kê</h4>
    <p>Hiện có <span><?php echo $count; ?></span> người đang xem</p>
</div>