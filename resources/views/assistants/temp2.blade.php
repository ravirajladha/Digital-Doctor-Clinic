<style>
    .input-field {
  width: 100%;
  height: 30px;
  padding: 5px;
  border: 1px solid #ccc;
}

.checkbox-field {
  margin: 0 5px;
}

</style>


<table id="myTable">
  <tr>
    <td><input type="text" class="input-field"></td>
    <td><input type="checkbox" name="checkboxGroup" class="checkbox-field">Option 1</td>
    <td><input type="checkbox" name="checkboxGroup" class="checkbox-field">Option 2</td>
  </tr>
</table>

<button id="addRowBtn">Add Row</button>



<script>
  const addRowBtn = document.querySelector("#addRowBtn");
const myTable = document.querySelector("#myTable");

addRowBtn.addEventListener("click", function() {
  const newRow = myTable.insertRow();
  const inputCell = newRow.insertCell();
  const inputField = document.createElement("input");
  inputField.type = "text";
  inputField.classList.add("input-field");
  inputCell.appendChild(inputField);

  for (let i = 0; i < 2; i++) {
    const checkboxCell = newRow.insertCell();
    const checkboxField = document.createElement("input");
    checkboxField.type = "checkbox";
    checkboxField.name = "checkboxGroup";
    checkboxField.classList.add("checkbox-field");
    checkboxCell.appendChild(checkboxField);
    const label = document.createElement("label");
    if(i==0){
    label.innerHTML = "Morning " ;
}
else if(i==1){
    label.innerHTML = "Evening " ;

}
    checkboxCell.appendChild(label);
  }
});
</script>
