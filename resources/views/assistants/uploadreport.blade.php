<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .search_pasents {
            display: flex;
            justify-content: center;
            padding-top: 50px;

        }
    </style>
</head>

<body>
    @include('inc_assistant/header')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="search_pasents">

                    <!-- Profile Widget -->
                    <div class="card widget-profile pat-widget-profile"
                        style="border-radius: 5%; background-color: #cef3ba;">
                        <div class="card-body">
                            <div class="pro-widget-content">
                                <div class="profile-info-widget">
                                    <div class="profile-det-info">
                                        <h4 class="d-block">Upload Patient Reprot</h4>
                                        @foreach ($patients as $pt)
                                            <form action="/assistants/upload_report" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" class="form-control"
                                                    value="{{ session('rexkod_digitaldrclinic_assistant_id') }}"
                                                    name="assistant_id"><br>
                                                <input type="hidden" value="{{ $pt->id }}" name="patient_id">
                                                <input type="text" class="form-control" placeholder="Id"
                                                    name="patient_name" value="{{ $pt->fname }} {{ $pt->lname }}"
                                                    readonly><br>
                                                <input type="date" class="form-control" placeholder="Id"
                                                    name="report_date"><br>
                                                <textarea type="addresh" class="form-control" placeholder="Description" name="report_discription" maxlength="220"></textarea><br>

                                                <input type="file" class="form-control" placeholder="Id"
                                                    name="report_file"><br>
                                                <button type="submit" class="btn btn-primary submit-btn">Upload
                                                    Report</button>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Profile Widget -->
                </div>
                @include('inc_assistant/footer')
</body>

</html>
