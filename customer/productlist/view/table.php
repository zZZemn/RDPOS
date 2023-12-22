
<div class="table-responsive">
    <input hidden type="text" value="<?=$acc_id?>" id="acc_id">
<table class="table datanew">
<thead>
<tr>
<th>
Status
</th>
<th>Product Name</th>
<th>Product Code</th>
<th>Category </th>
<th>Current price</th>
<th>Unit</th>
<th>Stocks</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php
    

     $current_date = date("Y-m-d"); // Get the current date
 $view_query = mysqli_query($connections, "
 SELECT *,
     SUM(IF(s_expiration = '0000-00-00' OR s_expiration > '$current_date', s.s_amount, 0)) AS prod_stocks
 FROM product AS p
 LEFT JOIN stocks AS s ON p.prod_id = s.s_prod_id
 LEFT JOIN category AS c ON p.prod_category_id = c.category_id
LEFT JOIN unit AS u ON p.prod_unit_id = u.unit_id
 WHERE prod_status = '0' OR prod_status = '1'
 GROUP BY p.prod_id
 ORDER BY `prod_added` DESC
");
		// where account_type='0'
		$i=1;
		while($row = mysqli_fetch_assoc($view_query)){ //<-- ginagamit tuwing kukuha ng database
			
			$prod_id = $row["prod_id"];
            $prod_code = $row["prod_code"];
            $prod_name = $row["prod_name"];
            
            $prod_currprice = $row["prod_currprice"];
            $prod_unit_id = $row["prod_unit_id"];
            $prod_category_id = $row["prod_category_id"];
            $prod_description = $row["prod_description"];
            $prod_image = $row["prod_image"];
            $prod_added = $row["prod_added"];
            $prod_edit = $row["prod_edit"];
            $prod_status = $row["prod_status"];

            $unit_name=$row["unit_name"];
            $category_name=$row["category_name"];
            
            $prod_stocks=$row["prod_stocks"];
            

            
    ?>
<tr>
<td>

<div class="status-toggle d-flex justify-content-between align-items-center">
<input <?php if($prod_status=="0"){ echo "checked";} ?> type="checkbox" id="user<?=$i?>" class="check" value='<?= $prod_id?>' >
<label for="user<?=$i?>" class="checktoggle">checkbox</label>
</div>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../../upload_prodImg/<?= $prod_image?>" alt="product">
</a>
<a href="javascript:void(0);"><?= $prod_name?></a>
</td>
<td><?= $prod_code?></td>
<td><?= $category_name?></td>
<td><?= $prod_currprice?></td>
<td><?= $unit_name?></td>
<td><?= $prod_stocks?></td>
<td>
<a class="me-3 togler_view" href="product-details.php?target_id=<?= $prod_code?>">
<img src="assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="editproduct.php?editTarget=<?= $prod_code ?>">
<img src="assets/img/icons/edit.svg" alt="img">
</a>
<a class="deleteConfirmation" data-prod_id="<?= $prod_id?>" data-prod_code="<?=$prod_code?>" data-acc_id="<?= $acc_id ?>">
<img src="assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<?php $i++;} ?>
</tbody>
</table>
</div>

<script src="productlist/javascript/toglerDeleteConfirmation.js"></script>