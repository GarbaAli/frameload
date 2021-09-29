
  <!-- Sidenav -->
  @include('admin.layouts.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin.layouts.header')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Codes de téléchargement</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Dark table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header border-0">
              
              <div class="d-flex" style="float: right">
                <form action="{{route('code.generer')}}" method="post">
                  @csrf
                  <input type="submit" value="Générer" class="btn btn-primary btn-sm">
                </form>
                <a href="{{ route('code.imprimer')}}" type="button" target="_blank" class="btn btn-success btn-sm ml-3">Imprimer</a>
              </div>
              <h3 class="mb-0">Listes des Codes</h3>
            </div>
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
        @include('admin.layouts.footer')
</body>

</html>