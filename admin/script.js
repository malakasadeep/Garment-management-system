var count = 0;
function clickNext(num) {
    document.getElementsByClassName("form-step-active")[0].classList.remove("form-step-active");
    
    if(num == 0) {
        document.getElementsByClassName("step-one")[0].classList.add("form-step-active"); 
    }
    else if(num == 1) {
        document.getElementsByClassName("step-two")[0].classList.add("form-step-active");
    }
    else if(num == 2) {
        document.getElementsByClassName("step-tree")[0].classList.add("form-step-active");
        document.getElementsByClassName("sub")[0].classList.remove("hide");
    } 
}

function clickBack(num) {
    document.getElementsByClassName("form-step-active")[0].classList.remove("form-step-active");
    
    if(num == 1) {
        document.getElementsByClassName("step-zero")[0].classList.add("form-step-active");
    }
    else if(num == 2) {
        document.getElementsByClassName("step-one")[0].classList.add("form-step-active");
    } 
    else if(num == 3) {
        document.getElementsByClassName("step-two")[0].classList.add("form-step-active");
        document.getElementsByClassName("sub")[0].classList.add("hide");
    } 
}

function addItembox() {
    var box = document.createElement("INPUT");
    box.setAttribute("type", "text");
    box.setAttribute("name", "item[]");
    box.setAttribute("class", "input-box");

    var minus = document.createElement("button");
    minus.value += count
    minus.setAttribute("id", "btn");
    minus.setAttribute("class", "box-control");
    minus.setAttribute("onclick", "removeItembox(this.value)");
    var t = document.createTextNode("-");
    minus.appendChild(t);

    var div = document.createElement("div");
    div.appendChild(box);
    div.appendChild(minus);
    div.className += "column" + " " + count;
    count++;
    document.getElementsByClassName("itms")[0].append(div);
}

function removeItembox(val) {
    document.getElementsByClassName(val)[0].remove();
}

function addIngrediantbox() {
    var box = document.createElement("INPUT");
    box.setAttribute("type", "text");
    box.setAttribute("name", "ingrediant[]");
    box.setAttribute("class", "input-box");

    var minus = document.createElement("button");
    minus.value += count
    minus.setAttribute("id", "btn");
    minus.setAttribute("class", "box-control");
    minus.setAttribute("onclick", "removeItembox(this.value)");
    var t = document.createTextNode("-");
    minus.appendChild(t);

    var div = document.createElement("div");
    div.appendChild(box);
    div.appendChild(minus);
    div.className += "column" + " " + count;
    count++;
    document.getElementsByClassName("ings")[0].append(div);
}

function addStepbox(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    var box = document.createElement("INPUT");
    box.setAttribute("type", "text");
    box.setAttribute("name", "step[]");
    box.setAttribute("class", "input-box");

    var minus = document.createElement("button");
    minus.value += count
    minus.setAttribute("id", "btn");
    minus.setAttribute("class", "box-control");
    minus.setAttribute("onclick", "removeItembox(this.value)");
    var t = document.createTextNode("-");
    minus.appendChild(t);

    var div = document.createElement("div");
    div.appendChild(box);
    div.appendChild(minus);
    div.className += "column" + " " + count;
    count++;
    document.getElementsByClassName("stps")[0].append(div);
}

function change() {
    document.getElementsByClassName("active")[0].classList.remove("active");
}
