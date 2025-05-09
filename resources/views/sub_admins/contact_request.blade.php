@include('inc_subadmins/header')


<!-- Page Wrapper -->
<div class="page-wrapper" style="margin-left: 240px">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Contact Request</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contact Request</li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Create Date</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($get_contact_us as $index=> $contact){ ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d/m/Y') }}</td>
                                        <td><?php echo $contact->name; ?></td>
                                        <td><?php echo $contact->email; ?></td>
                                        <td><?php echo $contact->phone_number; ?></td>
                                        <td><x-button type="view"
                                                url="{{ url('sub_admins/view_contact_request/' . $contact->id) }}" />
                                        </td>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->
@include('inc_admins/footer')
