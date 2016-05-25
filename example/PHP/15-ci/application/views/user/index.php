<!-- codeignite 中的视图文件直接采用php原生代码书写，对于不了解模板语言的初学者而言，降低了学习成本 -->

		<h1>user---index方法对应的视图文件</h1>
		<p><?=$message?></p>

		<!-- 用php和html混写的方法，可在循环输出表格中写出较为清晰的代码 -->
		<!-- 如果打开php的短标签支持选项，还可以写得更简洁，但可移植性就差，因为，这个选项默认是关闭的。 -->
		<table>
			<tr>
				<th>序号</th><th>姓名</th><th>邮箱</th>
			</tr>
			<?php foreach($userlist as $k => $v) :?>
			<tr>
				<td><?=$v['id']?></td>
				<td><?=$v['name']?></td>
				<td><?=$v['email']?></td>
			</tr>
			<?php endforeach;?>
		</table>
	</body>
</html>