@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col s12">
        <div class="card">
            <div class="card-content ">
                <span class="card-title"><h2>{{$company->name}} Employees</h2></span>
                <button class="btn blue darken-1" onclick="addNew()" type="button">Create new employee for {{$company->name}}</button>
            </div>
            <!-- Dropdown Create New Company -->
            <div class="card-content " id="add-new"  style="display: none;">
                <form action="{{route('employees.store', $company)}}" method="POST">
                    @csrf
                    <div class="input-field col s12">
                        <input type="text" name="first_name" id="first_name" class="" value="{{old('first_name')}}">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="last_name" id="last_name" class="" value="{{old('last_name')}}">
                        <label for="last_name">Last Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="phone" id="phone" class="" value="{{old('phone')}}">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="email" id="email" class="" value="{{old('email')}}">
                        <label for="email">Email</label>
                    </div>
                    <input type="hidden" name="company_id" id="company_id" value="{{$company->id}}">
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div> <!-- End Add New Company -->

            <!-- Show & Edit Companies -->
            <div class="card-content">
                <table class = "striped bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Show Companies -->
                        @foreach($company->employees as $employee)
                            <tr class="show-company" id="{{$employee->id}}">
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>
                                    <button onclick="openEdit({{$employee->id}})" class="btn grey">
                                        <i class="material-icons left">edit</i>
                                        <span>Edit</span>
                                    </button>
                                    <form method="POST" action="{{route('employees.destroy', $employee)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn red" type="submit">
                                            <i class="material-icons left">delete</i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr><!-- End Show Company -->

                            <!-- Edit Companies -->
                            <tr class="edit-company" id="edit{{$employee->id}}" style="display: none;" >
                                <form method="POST" action="{{route('employees.update', $employee)}}">
                                    @csrf
                                    @method('patch')
                                    <td><input type="text" name="editFirstName" value="{{$employee->first_name}}"></td>
                                    <td><input type="text" name="editLastName" value="{{$employee->last_name}}"></td>
                                    <td><input type="text" name="editEmail" value="{{$employee->email}}"></td>
                                    <td><input type="text" name="editPhone" value="{{$employee->phone}}"></td>
                                    <td>
                                        <button class="btn ">
                                            <i class="material-icons left">send</i>
                                            <span>Submit</span>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{route('employees.destroy', $employee)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn red" type="submit">
                                                <i class="material-icons left">delete</i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </td>
                            </tr><!-- End Edit -->
                        @endforeach<!-- End Show & Edit -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>


    function addNew(){
        let addNew = document.getElementById('add-new')
        if(addNew.style.display == "none"){
            addNew.style.display = "block"
        }else{
            addNew.style.display = "none"
        }
    }

    function openEdit(employee){
        let openEdit = document.getElementById(employee)
        let edit = document.getElementById(`edit${employee}`)

        openEdit.style.display = "none"
        edit.style.display = "table-row"
    }

</script>
@endsection
