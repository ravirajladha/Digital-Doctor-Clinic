@include('inc_ngo/header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Representative</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Representative</h2>
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-end">
                <a href="/ngo/ngo_panel_add_representative" class="btn btn-warning" style="white-space:nowrap">Add
                    Representative</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        @include('inc_ngo/navbar')

        <div class="col-sm-5 col-md-6 col-lg-8 col-xl-9">
            <div class="card w-100">
                <div class="card-title mt-5">
                    <h2 class="text-center">ग्राम प्रधान को वरीयता दीजाएगी</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable2" class="datatable table table-hover table-center mb-0 text-nowrap">
                            <thead>
                                <th>नाम</th>
                                <th>मोबाइल</th>
                                <th>ईमेल</th>
                                <th>आय प्रमाण पत्र यदि है तो <span>*</span></th>
                                <th>आधार कार्ड फोटो </th>
                                <th>क्लीनिक लगवाने की स्थान का फोटो</th>
                                <th>क्लीनिक लगवाने की स्थान छितफल (sf )</th>
                                <th>क्या आप प्रधान है यदि है तो प्रमाण दें। </th>
                                <th>व्यवसाय</th>
                                <th>वार्षिक आय ? </th>
                                <th>ग्राम</th>
                                <th>थाना </th>
                                <th>ब्लॉक</th>
                                <th>डाकघर</th>
                                <th>जिला </th>
                                <th>पिनकोड </th>
                            </thead>
                            @if($representative_data)
                            @foreach ($representative_data as $data)
                                <tbody>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->mobile_number }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        @if ($data->income)
                                            <a href="{{ asset('/' . $data->income) }}" target="_blank" rel="noopener noreferrer" class="btn btn-warning">View Certificate Photo</a>
                                        @else
                                            No Certificate Available
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('/' . $data->adhar_card) }}" target="_blank" rel="noopener noreferrer" class="btn btn-warning">View Aadhar Card</a></a>
                                    </td>
                                    <td>
                                        <a href="{{ asset('/' . $data->place_img) }}" target="_blank" rel="noopener noreferrer" class="btn btn-warning">View Clinic Photo</a>
                                    </td>
                                    <td>{{ $data->place_map }}</td>
                                    <td>
                                        <a href="{{ asset('/' . $data->pradhan_verification) }}" target="_blank" rel="noopener noreferrer" class="btn btn-warning"> View Pradhan Proof</a>
                                    </td>
                                    <td>{{ $data->occupation}}</td>
                                    <td>
                                        <a href="{{ asset('/' . $data->year_amount) }}" target="_blank" rel="noopener noreferrer" class="btn btn-warning">View Annual Income</a>
                                    </td>
                                    <td>{{ $data->village }}</td>
                                    <td>{{ $data->police_station }}</td>
                                    <td>{{ $data->block }}</td>
                                    <td>{{ $data->post }}</td>
                                    <td>{{ $data->district }}</td>
                                    <td>{{ $data->pincode }}</td>
                                </tbody>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('inc_ngo/footer')

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable2');
    });
</script>

