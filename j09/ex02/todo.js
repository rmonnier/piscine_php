
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setCookie(name, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function delTodo(event) {
	if (confirm("Etes-vous sur de vouloir supprimer la tache " + event.currentTarget.innerHTML + " ?")) {
	var toremove = event.currentTarget;
	toremove.parentNode.removeChild(toremove);
	}
}

function addTodo() {
	var user_prompt = window.prompt("What do I have to do ?");
	var list = document.getElementById('ft_list');
	var todo = document.createElement('div');
	todo.innerHTML = user_prompt;
	if (todo.innerHTML.length == 0)
		return ;
		todo.addEventListener('click', delTodo);
	if (list.hasChildNodes())
		list.insertBefore(todo, list.firstChild)
	else {
		list.appendChild(todo);
	}
}

document.getElementById('newTodo').addEventListener('click', addTodo);
