
let todoItems = [];

function addTodo(text) {
		const newToDo = {
			text,
			id: Date.now(),
		};
		todoItems.unshift(text);
		console.log(todoItems);
	}

document.querySelector('#new').addEventListener('click', function(evt)
{

	let text = prompt("Please enter your new to-do item:", "");
	text = text.trim();
	console.log(text);
	if (text != "")
	{
		var newDiv = document.createElement('div');
		newDiv.style.cssText = 'position:absolute;width:100%;height:100%;opacity:0.3;z-index:100;background:#000;';
		var arrayLen = todoItems.length;
		console.log(arrayLen);
		addTodo(text);
		
	}
});