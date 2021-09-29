<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<p style="float: right">{{$today}}</p>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Dark table -->
      <div class="row">
        <div class="col">
            <div class="table-responsive">
              <table id="dataTable" class="row-border align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Code</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @php( $num = 1)
                  @foreach($codes as $code)
                    <tr>
                      <td>{{$num}}</td>
                      <td>{{$code->code}}</td>
                    </tr>
                  @php($num++)
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
</body>
</html>