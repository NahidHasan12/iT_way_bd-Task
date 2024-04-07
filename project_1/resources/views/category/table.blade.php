<html>
    <head>
        <title>Category Table</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto mt-5">

                    @if(session()->has('success'))
                        <div style="font-size:15px" class="badge d-block bg-success">{{ session()->get('success') }}</div>
                    @elseif (session()->has('error'))
                        <div style="font-size:15px" class="badge d-block bg-dange">{{ session()->get('error') }}</div>
                    @endif

                    <div class="card border border-danger mt-1">
                        <div class="card-header border border-danger d-flex justify-content-between">
                            <h4 class="card-title">Category List</h4>
                            <a href="{{ route('show_form') }}" class="btn btn-sm btn-outline-primary">Add Category</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Category Name</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $key=>$item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->time }}</td>
                                            <td class="flex">
                                                <a href="{{ route('edit_category',$item->id) }}" class="btn btn-sm btn-info m-1">Edit</a>
                                                <a href="{{ route('delete_category', $item->id) }}" class="btn btn-sm btn-danger m-1">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
