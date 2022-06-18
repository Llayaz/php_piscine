let todoItems = [];
let cookiename = "todoList";
let separator = "ʥ";

if (getCookie(cookiename) != 0)
{
	var cookieStr = getCookie();
	if (cookieStr){
		todoItems = cookieStr.split(separator);
		buildList();
	}
}

$(document).ready(function()
{
	$('#new').bind("click", addNew);
});

function getCookie()
{
	var match = document.cookie.match(RegExp('(?:^|;\\s*)' + cookiename + '=([^;]*)')); 
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

	$('#ft_list').html('');

	for (i = 0; i < arrayLen; i++)
	{
		temp = $('<div class=todoItem id=' + i + '>' + todoItems[i] + '</div>');
		temp.bind('click', function ()
		{
			if(confirm("Remove this item?"))
			{
				for (i = 0; i < arrayLen; i++)
				{
					if(i == $(this).attr("id"))
						todoItems.splice(i, 1);
				}

				$(this).remove();
				arrayLen = todoItems.length;
				if (arrayLen == 0)
					deleteCookie();
				else
					buildCookie();
				buildList();
			}
		});
		$('#ft_list').append(temp);
	}
}


function addNew()
{
	let text = prompt("Please enter your new to-do item:", "");

	if (text != "")
	{
		text = $.trim(text);
		todoItems.unshift(text);
		var arrayLen = todoItems.length;
		buildCookie();
		buildList();
	}
};
