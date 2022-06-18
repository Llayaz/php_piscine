var todoItems = [];

var separator = "ʥ";


function getData()
{
	$.ajax(
		{url: "select.php", success: function(result){
		let itemBlocks = result.split(separator)
		if (itemBlocks.length > 0)
		{
			for (var i = 0; i < itemBlocks.length; i++)
			{
				let itemArray = itemBlocks[i].split(';');
				todoItems[itemArray[0]] = itemArray[1];
			}
		}
		buildList();
	}});
}

function addData()
{
	$.post(
		"insert.php",
		{
			items: todoItems,
			separator: separator
		},
		function(result){
			console.log('csv updated! item added')
		}
	)
}

function deleteData()
{
	$.post(
		"delete.php",
		{
			items: todoItems,
			separator: separator
		},
		function(result){
			console.log('csv updated! item deleted');
		}
	)
}

$(document).ready(function()
{
	getData();

	$('#new').bind("click", function(){
		addNew();
	});
});



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
				deleteData();
				buildList();
			}
		});
		$('#ft_list').append(temp);
	}
}


function addNew()
{
	let text = prompt("Please enter your new to-do item:", "");
	
	text = $.trim(text);
	text = text.replace(/;/g, '');
	text = text.replace(/ʥ/g, '');
	
	if (text != "")
	{
		var arrayLen = todoItems.length;
		todoItems.unshift(text);
		arrayLen = todoItems.length;
		addData();
		buildList();
	}
};
