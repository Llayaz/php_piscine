let todoItems = [];
let cookiename = "todoList";
let separator = "ʥ";

if (getCookie(cookiename) != 0)
{
	var cookieStr = getCookie(cookiename);
	if (cookieStr){
		todoItems = cookieStr.split(separator);
		buildList();
	}
}

function getCookie(name)
{
	var match = document.cookie.match(RegExp('(?:^|;\\s*)' + name + '=([^;]*)')); 
	return match ? match[1] : null;
}

function buildCookie()
{
	var date = new Date();
	date.setTime(date.getTime() + (24 * 3600 * 1000));
	var cookieStr = todoItems.join(separator);
	document.cookie = cookiename + "=" + cookieStr + "; path=/; expires =" + date.toGMTString();
}

function deleteCookie()
{
	document.cookie = cookiename + "=" + cookieStr + "; path=/; expires = Thu, 01 Jan 1970 00:00:00 UTC";
}

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
		temp.addEventListener('click', function ()
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
				if (arrayLen == 0)
					deleteCookie();
				else
					buildCookie();
				buildList();
			}
		});
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
		buildCookie();
		buildList()
	}
});
