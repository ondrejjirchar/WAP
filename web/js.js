let data = [];
let form = document.getElementById("form");
form.onsubmit = (e) => {
    e.preventDefault();
    let age = document.getElementById("age").value;
    let books = document.getElementById("book").value;
    data.push({a:age, b:books});
    console.log(data);
    
    let table = document.createElement("table");
    table.style.borderCollapse = "collapse";
    for (let row of data) {
        console.log(row.a, row.b);
        
    }
}


/*let main = document.getElementById("main");
const size = 2 ;
let table = document.createElement("table");
table.style.borderCollapse = "collapse";
for (let y = 0; y < size; y++) {
  let tr = document.createElement("tr");
  for (let x = 0; x < size; x++) {
    let td = document.createElement("td");
   
    td.innerText(age);
    tr.appendChild(td);
  }
  table.appendChild(tr);
}
main.appendChild(table);*/