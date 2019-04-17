@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col s12">
        <div class="card">
            <div class="card-content ">
                <span class="card-title">Company List</span>
            <button class="btn blue darken-1" onclick="addNew()" type="button">Create new company</button>
            </div>
            <div class="card-content " id="add-new"  style="display: none;">
                <form action="{{route('companies.store')}}" method="POST">
                    @csrf
                    <div class="input-field col s12">
                        <input type="text" name="name" id="name" class="" value="{{old('name')}}">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="address" id="address" class="" value="{{old('address')}}">
                        <label for="name">Address</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="website" id="website" class="">
                        <label for="name">Website</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="email" id="email" class="">
                        <label for="name">Email</label>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
            <div class="card-content">
                <table class = "striped bordered">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Admin</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($companies as $company)
                        <tr class="show-company" id="{{$company->id}}">
                            <td><img src="{{$company->logo}}"  alt="">
                            </td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->address}}</td>
                            <td>{{$company->website}}</td>
                            <td>{{$company->email}}</td>
                            <td>
                                <button onclick="openEdit({{$company->id}})" class="btn grey">
                                    <i class="material-icons left">edit</i>
                                    <span>Edit</span>
                                </button>
                                <form method="POST" action="{{route('companies.destroy', $company)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn red" type="submit">
                                        <i class="material-icons left">delete</i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr class="edit-company" id="edit{{$company->id}}" style="display: none;" >
                            <form method="POST" enctype="multipart/form-data" action="{{route('companies.update', $company)}}">
                                @csrf
                                @method('patch')
                                <td><img src="{{$company->logo}}" style="max-width: 250px; max-height: 250px;" alt="">
                                    <input  type="file" name="editLogo">
                                </td>
                                <td><input type="text" name="editName" value="{{$company->name}}"></td>
                                <td><input type="text" name="editAddress" value="{{$company->address}}"></td>
                                <td><input type="text" name="editWebsite" value="{{$company->website}}"></td>
                                <td><input type="text" name="editEmail" value="{{$company->email}}"></td>
                                <td>
                                    <button class="btn ">
                                        <i class="material-icons left">send</i>
                                        <span>Submit</span>
                                    </button>
                                </form>
                                    <button class="btn red" type="submit">
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

    function openEdit(company){
        let openEdit = document.getElementById(company)
        let edit = document.getElementById(`edit${company}`)

        openEdit.style.display = "none"
        edit.style.display = "table-row"
    }

</script>
@endsection
