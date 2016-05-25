        <div class="panel panel-default">
          <div class="panel-heading">股票概况</div>
          <div class="panel-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="30%">项目</th>
                  <th>值</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>股票数量</td>
                  <td><?php echo $stocknum;?></td>
                </tr>
              </tbody>
            </table>
          </div><!-- end of .panel-body -->
        </div><!-- end of .panel -->

        <div class="panel panel-default">
          <div class="panel-heading">站点环境</div>
          <div class="panel-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="30%">项目</th>
                  <th>值</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>主机名称</td>
                  <td><?php echo $this->input->server('SERVER_NAME');
                  ?></td>
                </tr>
                <tr>
                  <td>主机地址</td>
                  <td><?php echo $this->input->server('SERVER_ADDR'); ?></td>
                </tr>
                <tr>
                  <td>主机环境</td>
                  <td><?php echo $this->input->server('SERVER_SOFTWARE'); ?></td>
                </tr>
                <tr>
                  <td>CodeIgnite版本</td>
                  <td><?php echo CI_VERSION; ?></td>
                </tr>

              </tbody>
            </table>
          </div><!-- end of .panel-body -->
        </div><!-- end of .panel -->
