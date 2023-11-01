<x-admin-layout>
    <div class="dashboard-main">
        <div class="container">
            <div class="row py-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="dashboard-title-text">
                        <h2>Package Management</h2>
                        <p class="text-grey">ksjkaskhjahjdfjashfjsaj</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id='table_id' class='display mx'>
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Inclusions</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</x-admin-layout>