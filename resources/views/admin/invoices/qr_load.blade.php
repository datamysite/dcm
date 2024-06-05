<div class="card">
    <!-- /.card-header -->
    <div class="card-body">

        <table id="categoryTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">QR Scanned Counter</th>
                </tr>
            </thead>
            <tbody>
                <td class="text-center">
                    <h3>{{ $data['qr_counter'] }}</h3>
                </td>
            </tbody>
        </table>
        <hr>
        <table id="categoryTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">City</th>
                    <th width="10%">Region</th>
                    <th width="10%">Country</th>
                    <th width="10%">IP</th>
                    <th width="10%">Total Scan</th>
                    <th width="15%">Date</th>
                    <!-- <th width="5%">Action</th> -->
                </tr>
            </thead>
            <tbody id="categoryTableBody">
                @foreach($data['qr_data'] as $key => $val)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$val->city}}</td>
                    <td>{{$val->region}}</td>
                    <td>{{$val->country}}</td>
                    <td>{{$val->ip}}</td>
                    <td>{{$val->total_scan}}</td>
                    <td>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</td>
                    <!-- <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteQR" title="Delete QR" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
                    </td> -->
                </tr>
                @endforeach

                @if(count($data) == 0)
                <tr>
                    <td colspan="8">No QR Code found.</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>City</th>
                    <th>Region</th>
                    <th>Country</th>
                    <th>IP</th>
                    <th>Total Scan</th>
                    <th>Date</th>
                    <!-- <th>Action</th> -->
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>