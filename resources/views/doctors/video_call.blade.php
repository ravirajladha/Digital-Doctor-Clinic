<?php

use App\Models\Auth;
use App\Models\Consultation;
use App\Models\Notification;

$notifications = Notification::where('id', $notifications->id)->get();

?>
<header>
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <link href="/assets/css/app.css" rel="stylesheet" type="text/css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</header>
<style>
    body {
        margin: 0;
        font-family: 'Arial', sans-serif;
    }

    .container {
        display: flex;
    }

    .side-menu {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        right: 0;
        background-color: #fff;
        overflow-x: hidden;
        transition: 0.5s;
    }

    .side-menu ul {
        list-style: none;
        padding: 20px;
        margin: 0;
    }

    .side-menu a {
        text-decoration: none;
        color: white;
        font-size: 18px;
        display: block;
        padding: 10px;
        margin-bottom: 10px;
    }

    .content {
        flex-grow: 1;
        padding: 20px !important;
        width: 100%;
    }



    /* Style the close button */
    .side-menu .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 30px;
        color: white;
        cursor: pointer;
    }

    .options-container {
        display: none;
        position: absolute;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        background: #fff;
    }

    .option {
        padding: 8px;
        cursor: pointer;
    }

    .edit {
        border: none;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        background: linear-gradient(145deg, #f5fb00, #c7d129);
        color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .edit:hover:hover {
        color: black;
        box-shadow: 0 8px 50px #23232333;
        transform: scale(1.2);
    }

    .sidebar {
        padding: 0;
        margin: 0;
        background-color: whitesmoke;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    #toast-container>.toast {
        color: #000;
        /* Adjust text color as needed */
    }

    #toast-container {
        top: 50px;
        /* Position at the bottom of the screen */
    }

    #end {
        display: none;
    }

</style>
@include('/inc_doctor/header')
<!-- Page Content -->


<div class="container">
    <div class="side-menu sidebar" id="sideMenu">
        <div class="modal-header">
            <h5 class="modal-title">Prescription Form </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="row">
            <div class="col add-more-item text-end">
                <a href="#" class="add-experience" onclick="showTestForm(event)"><i class="fa fa-plus-circle"></i>
                    Add Test</a>
            </div>
        </div>
        <div class="">
            <form id="prescriptionForm" action="/savePrescription" method="post">
                @csrf
                <div class="card card-table ">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-hover table-center">
                                <thead>
                                    <tr>
                                        <th style="min-width: 200px">Prescription </th>
                                        <th style="min-width: 80px;">Quantity</th>
                                        <th style="min-width: 80px">Days</th>
                                        <th style="min-width: 80px;">Food Manner</th>
                                        <th style="min-width: 100px;">Timings Respectively</th>
                                        <th style="min-width: 80px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="medicineTableBody">
                                    @foreach ($notifications as $not)
                                        <input type="hidden" name="created_by"
                                            value="{{ $not->from_auth_id_assistant }}">
                                        <input type="hidden" name="to_doctor"
                                            value="{{ session('rexkod_digitaldrclinic_doctor_id') }}">
                                        <input type="hidden" name="userid" value="{{ $not->from_auth_id_patient }}">
                                    @endforeach

                                    <tr>
                                        <td>
                                            <input type="search" class="form-control" name="medicines[]"
                                                list="modelslist">
                                            <datalist id="modelslist">
                                                @foreach ($medicines as $med)
                                                    <option value="{{ $med->id . '.' . $med->name }}">
                                                        {{ $med->id }}.{{ $med->name }}</option>
                                                    <input type="hidden" name="medicines_id[]"
                                                        value="{{ $med->id }}">
                                                @endforeach
                                            </datalist>


                                        </td>

                                        <td>
                                            <input class="form-control" type="number" name="quantity[]">
                                        </td>
                                        <td>
                                            <input type="number" name="days[]" class="form-control">
                                        </td>
                                        <td>
                                            <select type="search" class="form-control" name="food[]">
                                                <option value="Morning">After Food</option>
                                                <option value="Afternoon">Before Food</option>
                                                <option value="evening">Not Spcified</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select type="search" class="form-control" name="time[]" list="modeltime">

                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                                <option value="Night">Night</option>
                                                <option value="Bed Time">Bed Time</option>
                                                <option value="Morning Afternoon Night">Morning Afternoon Night
                                                </option>
                                                <option value="Morning Night">Morning Night</option>
                                                <option value="Morning Afternoon">Morning Afternoon</option>
                                                <option value="Afternoon Night">Afternoon Night</option>
                                                <option value="4 times a Day">4 times a Day</option>
                                                <option value="5 times a Day">5 times a Day</option>
                                                <option value="After Food">After Food</option>
                                                <option value="Before Food">Before Food</option>
                                                <option value="Not Specified">Not Specified</option>
                                            </select>
                                        </td>

                                        <td>
                                            <a href="#" onclick="addRow(this)" class="btn bg-info-light plus"><i
                                                    class='fas fa-plus'></i></a>
                                        </td>
                                        <td>
                                            <a href="#" onclick="removeRow(this)"
                                                class="btn bg-danger-light trash"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-hover table-center myclass" style="display: none;">



                                <thead>
                                    <tr>
                                        <th>Tests</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <td>
                                    <input type="search" class="form-control" name="test_name[]" list="modelstest">
                                    <datalist name="test" id="modelstest">
                                        @foreach ($test as $tst)
                                            <option value="{{ $tst->name }}">{{ $tst->name }}</option>
                                        @endforeach
                                    </datalist>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="test_description[]"
                                        class="form-input-group">
                                </td>
                                <td>
                                    <a href="#" onclick="addTd(this)" class="btn bg-info-light plus"><i
                                            class='fas fa-plus'></i></a>
                                </td>
                                <td>
                                    <a href="#" onclick="removeTd(this)" class="btn bg-danger-light trash"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </table>

                        </div>
                    </div>
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center">
                                    <thead>
                                        <tr>
                                            <th>Instructions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <textarea name="remark" class="form-control" cols="20" rows="5"></textarea>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="submit-section">
                                <button type="submit" id="submitFormBtn"
                                    class="btn btn-primary submit-btn">Save</button>
                                <button type="reset" class="btn btn-secondary submit-btn">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="">
            <div id="otEmbedContainer">
                <iframe
                    src="https://tokbox.com/embed/embed/ot-embed.js?embedId=6a569d3f-ab94-4702-ad56-ef537417b1e5&room={{ $consultation_id }}&iframe=true"
                    width="100%" height="540px" scrolling="auto" allow="microphone; camera"></iframe>
            </div>
            <!-- Call Footer -->
            <div class="call-footer" style="padding: 0px;">
                <div class="call-icons">

                    <ul class="call-items">

                        <li class="end-call-new">
                            <a href="/doctors/dashboard" title="End Call" data-placement="top"
                                data-bs-toggle="tooltip">
                                <i class="material-icons">call_end</i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
    <div class="col-6">
        <div class="fixed-bottom mb-2">
            <div class="d-flex justify-content-end">
                <button class="btn btn-warning" id="menuButton"><i class="fa fa-edit"></i> Prescription</button>
                @foreach ($notifications as $not)
                    <a target="_blank"
                        href="/doctors/referrals/{{ $not->from_auth_id_patient }}/{{ session('rexkod_digitaldrclinic_doctor_id') }}/{{ $not->from_auth_id_assistant }}/{{ $consultation_id }}"
                        id="startButton" class="btn btn-success mx-2">
                        <i class="fas fa-plus"></i> Refer Patient
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


</div>

@include('/inc_doctor/footer')




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('menuButton');
        const sideMenu = document.getElementById('sideMenu');
        const container = document.querySelector('.container');
        const closeBtn = document.querySelector('.close');

        menuButton.addEventListener('click', function() {
            sideMenu.style.width = '50vw';
            container.style.marginLeft = '0';
        });

        closeBtn.addEventListener('click', function() {
            sideMenu.style.width = '0';
            container.style.marginLeft = '50vw';
        });

        document.addEventListener('click', function(event) {
            if (event.target !== menuButton && !event.target.closest('.side-menu') && event.target !==
                closeBtn) {
                return;
            }
        });
    });
</script>
<script>
    let count = 0;

    function addRow(button) {
        const currentRow = button.closest('tr');
        const newRow = currentRow.cloneNode(true);
        newRow.querySelectorAll('input').forEach(input => input.value = '');
        currentRow.parentNode.insertBefore(newRow, currentRow.nextSibling);
        count++;
        updateCountDisplay();
        updateCountOnServer();
    }

    function removeRow(button) {
        const currentRow = button.closest('tr');
        currentRow.parentNode.removeChild(currentRow);
        count--;
        updateCountDisplay();
        // updateCountOnServer();
    }

    function updateCountDisplay() {
        $('#countDisplay').text('Count: ' + count);
    }

    function updateCountOnServer() {
        // Send an Ajax request to update the count on the server
        $.ajax({
            method: 'POST',
            url: '/update-count', // Replace with your actual endpoint
            data: {
                count: count
            },
            success: function(response) {
                console.log('Count updated on the server');
            },
            error: function(error) {
                console.error('Error updating count on the server:', error);
            }
        });
    }
</script>

<script>
    function addTd(button) {
        const currentTd = button.closest('td');
        const newRow = currentTd.parentNode.cloneNode(true);
        newRow.querySelectorAll('input').forEach(input => input.value = '');
        currentTd.parentNode.parentNode.insertBefore(newRow, currentTd.parentNode.nextSibling);

    }

    function removeTd(button) {
        const currentTd = button.closest('td');
        currentTd.parentNode.parentNode.removeChild(currentTd.parentNode);

    }
</script>
<script>
    function updateMedicineId(select) {
        var selectedOption = select.options[select.selectedIndex];
        var medicineId = selectedOption.getAttribute('data-id');
        document.getElementById('selectedMedicineId').value = medicineId;
    }
</script>

<script>
    function showTestForm(event) {
        event.preventDefault();
        var testForm = document.querySelector('.myclass');
        testForm.style.display = 'block';
    }

    // Add your functions addTd and removeTd here
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#submitFormBtn').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission
            var formData = $('#prescriptionForm').serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: $('#prescriptionForm').attr('action'),
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                success: function(response) {
                    // Handle success response here
                    // console.log(response);
                    // Clear the form
                    $('#prescriptionForm')[0].reset();
                    toastr.success('Prescription added successfully!');
                    const sideMenu = document.getElementById('sideMenu');
                    const container = document.querySelector('.container');
                    sideMenu.style.width = '0';
                    container.style.marginLeft = '600px';
                },
                error: function(xhr, status, error) {
                    // Handle error response here
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
