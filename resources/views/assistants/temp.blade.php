<style>
    .input-field {
        width: 100%;
        height: 30px;
        padding: 5px;
        border: 1px solid #ccc;
    }
</style>


<table id="myTable">

    <tr>
        <td>
            <input class="form-control" type="text">
        </td>
        <td>
            <input class="form-control" type="text">
        </td>
        <td>
            <input class="form-control" type="text">
        </td>
        <td>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Morning
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Afternoon
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Evening
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Night
                </label>
            </div>
        </td>
        <td>
            <a href="#" class="btn bg-danger-light trash"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
</table>

<button id="addRowBtn">Add Row</button>



<script>
    const addRowBtn = document.querySelector("#addRowBtn");
    const myTable = document.querySelector("#myTable");

    addRowBtn.addEventListener("click", function() {
        const newRow = myTable.insertRow();
        for (let i = 0; i < 3; i++) {
            const newCell = newRow.insertCell();
            const newInput = document.createElement("input");
            newInput.type = "text";
            newInput.classList.add("input-field");
            newCell.appendChild(newInput);
        }
    });
</script>
