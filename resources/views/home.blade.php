@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col s12">
           <div class="card">
               <div class="card-content ">
                   <span class="card-title">Company List</span>
               <button class="btn blue darken-1" type="button"><a style="color: white;" href="{{ route('companies.create') }}"> Create new company</a></button>
               </div>
                <div class="card">
                    <table class = "striped bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Email</th>
                                <th>Admin</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>Mahesh Parashar</td>
                                <td>123 SIlver Road, Bristol, BS42 62Y</td>
                                <td>https://facebook.com</td>
                                <td>testing123@testing.com</td>
                                <td>
                                    <button class="btn grey">
                                        <i class="material-icons left">edit</i>
                                        <span>Edit</span>
                                    </button>
                                    <button class="btn red">
                                        <i class="material-icons left">delete</i>
                                        <span>Delete</span>

                                    </button>
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
@endsection
