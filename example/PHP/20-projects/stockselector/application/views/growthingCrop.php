        <div class="panel panel-default">
          <div class="panel-heading">连续增长股票池</div>
          <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>序号</th>
                  <th>股票代码</th>
                  <th>股票名称</th>
                  <th>连增数</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ( $growthingCrop as $k => $v ) :?>
                <tr>
                  <td><?php echo $k ?></td>
                  <td><?php echo $v['pcode'] ?></a></td>
                  <td><?php echo $v['pname'] ?></a></td>
                  <td><?php echo $v['growthseasons'] ?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            </div>
          </div><!-- end of .panel-body -->
        </div><!-- end of .panel -->
