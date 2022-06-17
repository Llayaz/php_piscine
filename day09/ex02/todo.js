let todoItems = [];
allCookies = document.cookie;
console.log(allCookies);


function buildList()
{
	var str = todoItems.toString();
	var arrayLen = todoItems.length;
	var temp;
	var parent = document.getElementById('ft_list');
	document.getElementById('ft_list').innerHTML = '';
	for (i = 0; i < arrayLen; i++)
	{
		temp = document.createElement('div');
		temp.className = 'todoItem';
		temp.id = i;
		temp.onclick = function ()
		{
			if(confirm("Remove this item?"))
			{
				for (i = 0; i < arrayLen; i++)
				{
					if(i == this.id)
						todoItems.splice(i, 1);
				}

				this.remove();
				arrayLen = todoItems.length;
				buildList();
			}	
		};
		temp.innerHTML = todoItems[i];
		document.getElementById('ft_list').appendChild(temp);
	}
}

document.querySelector('#new').addEventListener('click', function(evt)
{

	let text = prompt("Please enter your new to-do item:", "");
	if (text != "")
	{
		text = text.trim();
		todoItems.unshift(text);
		var arrayLen = todoItems.length;
		buildList()
	}
});
