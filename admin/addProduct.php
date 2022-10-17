<form enctype="multipart/form-data" method="post" action="addFormProccessor.php">
	<h3>Добавить товар:</h3>
	<div class="form-row">
		<label>Наименование товара:</label>
		<input type="text" name="name" required>
	</div>
	<div class="form-row">
		<label>Цена:</label>
		<input type="text" name="price" required>
	</div>
	<div class="form-row">
		<label>Категория:</label>
		<div class="img-list" id="js-file-list"></div>
		<select name="rarity" id="rarity_selector">
			<option value="0">Выберите редкость</option>
			<option value="1">Common</option>
  			<option value="2">Uncommon</option>
			<option value="3">Rare</option>
			<option value="4">Mythical</option>
			<option value="5">Immortal</option>
			<option value="6">Arcana</option>
		</select>
	</div>
    <div class="form-row">
		<label>Герой:</label>
		<div class="img-list" id="js-file-list"></div>
		<select name="heroes" id="heroes_selector">
			<option value="0">Выберите героя</option>
			<option value="1">Invoker</option>
  			<option value="2">Juggernaut</option>
			<option value="3">Pudge</option>
			<option value="4">Shadow Fiend</option>
			<option value="5">Terrorblade</option>
		</select>
	</div>
	<div class="form-row">
		<label>Изображения:</label>
		<div class="img-list" id="js-file-list"></div>
		<input type="file" name="product_photo">
	</div>
	<div class="form-submit">
		<input type="submit" name="send" value="Добавить">
	</div>
</form>
<style>
    .form-row {
	margin-bottom: 15px;
}
.form-row label {
	display: block;
	color: #777;
	margin-bottom: 5px;
}
.form-row input[type="text"] {
	width: 100%;
	padding: 5px;
	box-sizing: border-box;
}
 
/* Стили для вывода превью */
.img-item {
	display: inline-block;
	margin: 0 20px 20px 0;
	position: relative;
	user-select: none;
}
.img-item img {
	border: 1px solid #767676;
}
.img-item a {
	display: inline-block;
	background: url(/remove.png) 0 0 no-repeat;
	position: absolute;
	top: -5px;
	right: -9px;
	width: 20px;
	height: 20px;
	cursor: pointer;
}
</style>