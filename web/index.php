<?php
//开启session
session_start();
//引用mysql文件
include('mysql.php');
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<title>Home</title>
</head>
<body>
	<?php include("header.php"); ?>

		
	<div id="app">
			<h1 class="app-title">All Products</h1>



			<?php
			
			$page = empty($_GET['page'])?1:$_GET['page'];
			$recordcount = mysqli_num_rows(query("select * from goods"));
			$pages = ceil($recordcount/12.0);
			if($page<=0) $page = 1;
			if($page>$pages) $page = $pages;
			//查询最新的商品
			if($_GET['catid']){
				$sql = 'select goods.*,cate.title as cname,user.username as uname from goods left join cate on cate.id = goods.catid  left join user on user.id = goods.uid  where goods.catid = '.$_GET['catid'].' order by goods.id desc limit '.(($page-1)*6).',6';
			}else{
				$sql = 'select goods.*,cate.title as cname,user.username as uname from goods left join cate on cate.id = goods.catid  left join user on user.id = goods.uid order by id desc limit '.(($page-1)*6).',6';
			}
			$res = query($sql);
			while($r = mysqli_fetch_array($res)){
			?>
				
			<div class="animal">
			
				<img class="pet-photo" src="img/<?php echo $r['image'] ; ?>" >
				<h2 class="pet-name"><a  href="goodsdetail.php?id=<?php echo $r['id'] ; ?>"><?php echo $r['goodsName'] ; ?><span class="species"></span></a></h2>
				<p><strong>Price:</strong>$<?php echo $r['price'] ; ?></p>
				<p><strong>Category:</strong><?php echo $r['cname']; ?></p>
				<p><strong>User:</strong><?php echo $r['uname']; ?></p>
		
			</div>
			<?php } ?>

				
		
	</div>

	<div class="pager">
		<a href="?page=<?php echo $page-1; ?>">Prev</a>&nbsp;
		<a href="?page=<?php echo $page+1; ?>">Next</a>
	</div>

	
	<script src="js/jquery.min.js"></script>
	


</body>
</html>