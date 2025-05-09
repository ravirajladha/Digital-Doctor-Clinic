@include('inc_assistant/header')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Test</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Add Test</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            @include('inc_assistant/navbar')
            <div class="col-md-7 col-lg-8 col-xl-9">
                <!-- page header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3 class="page-title">List of Tests</h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Test</li>
                            </ul>
                        </div>

                        <div class="col-sm-5 col">
                            <a href="/assistants/add_test" class="btn btn-primary float-end mt-2"
                                style="border-radius: 0px;">Add test</a>
                        </div>
                    </div>
                </div>
                <!-- end -->

                <!-- page header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="datatable table table-hover table-center mb-0">

                                        <thead>
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($get_tests as $tests) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <?php echo $tests->name; ?>
                                                    </h2>
                                                </td>
                                                <td><?php echo $tests->description; ?></td>
                                            </tr>


                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page header -->

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@include('inc_assistant/footer')

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
