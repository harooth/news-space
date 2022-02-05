let category = document.getElementsByClassName('category-div');
let select = document.getElementsByClassName('category');
select[0].addEventListener("click", function(event){
	let selects = document.querySelectorAll("select");
	let spans = document.querySelectorAll("span")
	if(selects.length>1)
	{
		category[0].removeChild(selects[1]);
		category[0].removeChild(spans[1]);
	}
	if(event.target.value == 'Sport')
	{
		var subCategory = `
		<span>Subcategory:</span>
		<select name="subcategory" class="subCategory">
			<option value='uncategorized'>Select</option>
		    <option value="Football">Football</option>
		    <option value="Tennis">Tennis</option>
		</select>
		`;
		category[0].insertAdjacentHTML( 'beforeend', subCategory );
	} else if(event.target.value == 'Culture')
	{
		var subCategory = `
		<span>Subcategory:</span>
		<select name="subcategory" class="subCategory">
			<option value='uncategorized'>Select</option>
		    <option value="Art">Art</option>
		    <option value="Paintings">Paintings</option>
		</select>
		`;
		category[0].insertAdjacentHTML( 'beforeend', subCategory );
	}
});