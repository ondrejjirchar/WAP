/*let data = [];
let form = document.getElementById("form");
form.onsubmit = (e) => {
    e.preventDefault();
    let age = document.getElementById("age").value;
    let books = document.getElementById("book").value;
    data.push({a:age, b:books});
    console.log(data);
    
    let table = document.createElement("table");
    table.style.borderCollapse = "collapse";
    for (let row of data)
    {
         console.log(row.a, row.b);
         
    for(let cell of row.cells) 
    {
       console.log(row.innerText)
    }
}
}*/

function updateTable() {
  form.onsubmit = (e) => {
    e.preventDefault();
  var values = {
    age: document.getElementById("age").value,
    book: document.getElementById("book").value,
   
  };

  var table = document.getElementById("table");

  Object.keys(values).forEach(function (key) {
    table.getElementsByClassName(key + "Row")[0]
      .getElementsByClassName("value")[0]
      .textContent = values[key];
  });
}
}
document.getElementById("button").addEventListener("click", updateTable);
/*function addRow()
            {
                
                var age = document.getElementById('age').value;
                var book = document.getElementById('book').value;
                
                  
            
                  var table = document.getElementsByTagName('table')[0];
                  
                  var newRow = table.insertRow(table.rows.length/2+1);
                  
                
                  var cel1 = newRow.insertCell(0);
                  var cel2 = newRow.insertCell(1);
          
                  cel1.innerHTML = age;
                  cel2.innerHTML = book;
                  
            }
document.getElementById("button").addEventListener("click", addRow);*/