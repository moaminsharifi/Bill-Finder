<div class="container mx-auto px-4 py-5">
   

<table   id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#id</th>
                <th>Name</th>
                <th>price</th>
                <th>building</th>
                <th>category</th>
                <th>date</th>
               
            </tr>
            @foreach ($bills as $bill)
                <tr>
                    <td>{{$bill->id}}</td>
                     <td>{{$bill->name}}</td>
                    <td>{{$bill->price}}</td>
                    <td>{{$bill->building->name}}</td>
                    <td>{{$bill->category->name}}</td>
                    <td>{{$bill->created_at->format('Y.m.d')}}</td>
                </tr>

            @endforeach
        </thead>
        <tbody>
        </tbody>
    </table>

        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
  
        </script>

</div>
