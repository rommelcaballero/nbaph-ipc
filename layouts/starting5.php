<!-- starting 5 start -->
<div class='section-container'  style="width: 982px; margin: 0 auto; padding: 5px 0 0 0;">
    <div class="article_header" style="background: url('images/rounded_top_982.png'); width: 952px; height: 15px">
    WHO'S YOUR STARTING 5?
        <div style="font-size: 14px; font-weight: bold; position: absolute; top: 10px; right: 15px">
            <a href="starting-five" class="blue">VOTE NOW!</a>
        </div>
    </div>
    
    <div style="width: 970px; border-left: 1px solid #d8d8d8; border-right: 1px solid #d8d8d8; padding: 10px 5px; color: #444; font-size: 12px">
        <table cellspacing="0" style="width: 100%; text-align: center; font-weight: bold" id="starting">
            <tr>
                <?php $count = 0; ?>
                <?php foreach ($names as $k => $v): ?>
                <td <?php if ($count < 4) echo 'style="border-right: 1px solid #999"';?> >
                    <div style="color: #999; font-size: 14px"><?php echo $k; ?></div>
                    <div class="blue" style="font-size: 14px"><?php echo $v; ?></div>
                    <div style="color: #f03; font-size: 15px"><?php echo number_format($votes[$k], 0); ?> votes</div>
                </td>
                <?php $count += 1; ?>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>
</div><!-- starting 5 end -->