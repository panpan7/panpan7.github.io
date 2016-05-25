                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">多页面抓取数据</h3>
                    </div>
                    <div class="panel-body">
                      <?php for ($i=1; $i < count($step) ; $i++) {
                        $url = 'welcome/getAllStockInfo/' . $step[$i-1] .'/' . $step[$i];
                        ?>
                      <p><a href="<?php echo site_url($url) ?>" target="_black">抓取<?php echo $step[$i-1] .'-' . $step[$i] ?>公司的财务数据</a></p>
                        <?php } ?>
                    </div>
                </div>
