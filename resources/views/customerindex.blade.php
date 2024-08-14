<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      .btn-create {
        background-color: #007bff; /* Primary blue */
        color: white;
        border: none;
      }
      .btn-create:hover {
        background-color: #0056b3; /* Darker blue on hover */
      }
      .btn-update {
        background-color: #1e90ff; /* Dodger blue */
        color: white;
        border: none;
      }
      .btn-update:hover {
        background-color: #1c86ee; /* Darker dodger blue on hover */
      }
      .btn-delete {
        background-color: #6c757d; /* Grayish color */
        color: white;
        border: none;
      }
      .btn-delete:hover {
        background-color: #5a6268; /* Darker gray on hover */
      }
      .btn-group {
        display: flex;
        gap: 10px;
      }
      .table thead th {
        background-color: #007bff; /* Blue for header */
        color: white; /* White text */
      }
      .table tbody tr:nth-child(even) {
        background-color: #e3f2fd; /* Light blue for even rows */
      }
      .table tbody tr:hover {
        background-color: #c5e1f7; /* Slightly darker light blue on hover */
      }
      .table-container {
        background-color: #f5f5f5; /* Light gray background for the container */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Subtle shadow for a modern look */
      }
    </style>

  </head>
  <body>
      <div class="text-center">
        <h1>Table Management</h1>
        <br>
        <a href="{{ route('customercreate') }}">
          <button class="btn btn-md btn-create">Create Customer</button>
        </a>
      </div>

      <div class="container mt-4 table-container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone No</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($customers as $customer )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone_no }} </td>
                <td>{{ $customer->address }} </td>
                <td>
                    <div class="btn-group">
                      <a href="{{ route('edit', $customer->id) }}">
                        <button class="btn btn-md btn-update p-1">Update</button>
                      </a>
                      <form action="{{ route('destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-md btn-delete p-1" type="submit">Delete</button>
                      </form>
                    </div>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
