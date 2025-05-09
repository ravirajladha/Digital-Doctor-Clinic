<style>
    .search_pasents {
        display: flex;
        justify-content: center;
        padding-top: 50px;

    }
</style>
@include('inc_assistant/header')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="search_pasents">

                    <!-- Profile Widget -->
                    <div class="card widget-profile pat-widget-profile"
                        style="border-radius: 5%; background-color: #cef3ba;">
                        <div class="card-body">
                            <div class="pro-widget-content">
                                <div class="profile-info-widget">
                                    <div class="profile-det-info">

                                        <h4 class="d-block">Search Patient</h4>
                                        <form action="/search_lab_report" method="post">
                                            @csrf
                                            <input type="hidden" class="form-control"
                                                value="{{ session('rexkod_digitaldrclinic_assistant_id') }}"
                                                name="assistant_id"><br>

                                            <input type="text" class="form-control"
                                                placeholder="Enter Patient Id To search" name="patient_id"><br>
                                            <strong for="">OR</strong>
                                            <input type="tel" class="form-control"
                                                placeholder="Enter Patient Mobile To search" name="patient_phone"
                                                maxlength="10"><br>

                                            <button type="submit" class="btn btn-primary submit-btn">Search</button>
                                        </form>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Profile Widget -->

                </div>
            </div>
        </div>

        @include('inc_assistant/footer')
